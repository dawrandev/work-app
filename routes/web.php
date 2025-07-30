<?php

use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SubCategoryController as AdminSubCategoryController;
use App\Http\Controllers\Admin\TypeController as AdminTypeController;
use App\Http\Controllers\Admin\EmploymentTypeController as AdminEmploymentTypeController;
use App\Http\Controllers\Admin\DistrictController as AdminDistrictController;
use App\Http\Controllers\Admin\JobController as AdminJobController;
use App\Http\Controllers\Admin\OfferController as AdminOfferController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSaveController;
use App\Http\Controllers\OfferApplyController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\OfferSaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Livewire\Livewire;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::post('/livewire/update', \Livewire\Mechanisms\HandleRequests\HandleRequests::class . '@handleUpdate')
    ->name('livewire.update');
Route::get('/livewire/livewire.js', \Livewire\Mechanisms\FrontendAssets\FrontendAssets::class . '@returnJavaScriptAsFile')
    ->name('livewire.js');

Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {

    Route::get('/', function () {
        return view('pages.user.home');
    })->name('home');

    // Authcontroller 
    Route::middleware('guest')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('/register', 'register')->name('register');
            Route::post('/login', 'login')->name('login');
        });
    });

    Route::middleware('auth')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('/logout', 'logout')->name('logout');
            Route::get('/edit', 'edit')->name('auth.edit');
            Route::post('/update', 'update')->name('auth.update');
        });
    });

    // JobController 
    Route::middleware('auth')->group(function () {
        Route::prefix('jobs')->as('jobs.')->group(function () {
            Route::get('/create', [JobController::class, 'create'])->name('create');
            Route::post('/store', [JobController::class, 'store'])->name('store');
            Route::get('/edit/{job}', [JobController::class, 'edit'])->name('edit')->middleware('owner');
            Route::put('/update/{job}', [JobController::class, 'update'])->name('update')->middleware('owner');
            Route::delete('/destroy/{job}', [JobController::class, 'destroy'])->name('destroy')->middleware('owner');
        });
    });
    Route::prefix('jobs')->as('jobs.')->group(function () {
        Route::get('/show/{job}', [JobController::class, 'show'])->name('show')->middleware('track.views');
        Route::get('/index', [JobController::class, 'index'])->name('index');
    });

    // Offer Controller 
    Route::middleware('auth')->group(function () {
        Route::prefix('offers')->as('offers.')->group(function () {
            Route::get('/create', [OfferController::class, 'create'])->name('create');
            Route::post('/store', [OfferController::class, 'store'])->name('store');
            Route::get('/edit/{offer}', [OfferController::class, 'edit'])->name('edit')->middleware('owner');
            Route::put('/update/{offer}', [OfferController::class, 'update'])->name('update')->middleware('owner');
            Route::delete('/destroy/{offer}', [OfferController::class, 'destroy'])->name('destroy')->middleware('owner');
        });
        Route::prefix('offers')->as('offers.')->group(function () {
            Route::get('/index', [OfferController::class, 'index'])->name('index');
            Route::get('/show/{offer}', [OfferController::class, 'show'])->name('show')->middleware('track.views');
        });
    });

    // SubCategory Controller
    Route::prefix('subcategories')->as('subcategories.')->group(function () {
        Route::get('/show/{subCategory}', [SubCategoryController::class, 'show'])->name('show');
    });

    // ProfileController
    Route::middleware('auth')->group(function () {
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/index', [ProfileController::class, 'index'])->name('index');
            Route::get('/my-resume', [ProfileController::class, 'myResume'])->name('my-resume');
            Route::get('/manage-jobs', [ProfileController::class, 'manageJobs'])->name('manage-jobs');
            Route::get('/manage-offers', [ProfileController::class, 'manageOffers'])->name('manage-offers');
            Route::get('/saved-offers', [ProfileController::class, 'savedOffers'])->name('saved-offers');
            Route::get('/saved-jobs', [ProfileController::class, 'savedJobs'])->name('saved-jobs');
            Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
            Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
            Route::post('/update_image', [ProfileController::class, 'updateImage'])->name('update-image');
            Route::put('/update', [ProfileController::class, 'update'])->name('update');
        });
    });

    // CategoryController
    Route::prefix('categories')->as('categories.')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('index');
        Route::get('/show/{category}', [CategoryController::class, 'show'])->name('show');
    });

    // JobSaveController 
    Route::middleware('auth')->group(function () {
        Route::prefix('save-jobs')->as('save-jobs.')->group(function () {
            Route::post('/store', [JobSaveController::class, 'store'])->name('store');
            Route::delete('/destroy/{id}', [JobSaveController::class, 'destroy'])->name('destroy')->middleware('owner');
        });
    });

    // OfferSaveController 
    Route::middleware('auth')->group(function () {
        Route::prefix('save-offers')->as('save-offers.')->group(function () {
            Route::post('/store', [OfferSaveController::class, 'store'])->name('store');
            Route::delete('/destroy', [OfferSaveController::class, 'destroy'])->name('destroy')->middleware('owner');
        });
    });

    // JobApplyController 
    Route::middleware('auth')->group(function () {
        Route::prefix('job-applies')->as('job-applies.')->group(function () {
            Route::get('/index', [JobApplyController::class, 'index'])->name('index');
            Route::post('/store', [JobApplyController::class, 'store'])->name('store');
            Route::get('/applicants/{jobId}', [JobApplyController::class, 'applicants'])->name('applicants');
            Route::patch('/respond/{id}', [JobApplyController::class, 'respond'])->name('respond')->middleware('owner');
        });
    });

    // OfferApplyController 
    Route::middleware(['auth'])->group(function () {
        Route::prefix('offer-applies')->as('offer-applies.')->group(function () {
            Route::get('/index', [OfferApplyController::class, 'index'])->name('index');
            Route::post('/store', [OfferApplyController::class, 'store'])->name('store');
            Route::get('show/{id}', [OfferApplyController::class, 'show'])->name('show')->middleware('owner');
            Route::delete('destroy/{id}', [OfferApplyController::class, 'destroy'])->name('destroy')->middleware('owner');
            Route::get('/applicants/{offerId}', [OfferApplyController::class, 'applicants'])->name('applicants');
            Route::patch('/respond/{id}', [OfferApplyController::class, 'respond'])->name('respond')->middleware('owner');
        });
    });



    // Admin Routes 
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

        // AuthController
        Route::get('/', [AdminAuthController::class, 'showLogin'])->name('showLogin');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login');
        Route::get('/profile', [AdminAuthController::class, 'profile'])->name('profile')->middleware('admin');
        Route::put('/update', [AdminAuthController::class, 'update'])->name('update')->middleware('owner', 'admin');

        Route::middleware('admin')->group(function () {
            Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

            // DashboardController
            Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
            Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
                Route::get('/chart-data/{data}', [DashboardController::class, 'getChartData'])->name('chart-data');
            });

            // CategoryController
            Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
                Route::get('/index', [AdminCategoryController::class, 'index'])->name('index');
                Route::get('/create', [AdminCategoryController::class, 'create'])->name('create');
                Route::post('/store', [AdminCategoryController::class, 'store'])->name('store');
                Route::get('/edit/{category}', [AdminCategoryController::class, 'edit'])->name('edit');
                Route::get('/show/{category}', [AdminCategoryController::class, 'show'])->name('show');
                Route::delete('/destroy/{category}', [AdminCategoryController::class, 'destroy'])->name('destroy');
                Route::put('/update/{category}', [AdminCategoryController::class, 'update'])->name('update');
            });

            // AdminSubCategoryController
            Route::group(['prefix' => 'subcategories', 'as' => 'subcategories.'], function () {
                Route::get('/index', [AdminSubCategoryController::class, 'index'])->name('index');
                Route::get('/create', [AdminSubCategoryController::class, 'create'])->name('create');
                Route::post('/store', [AdminSubCategoryController::class, 'store'])->name('store');
                Route::get('/edit/{subcategory}', [AdminSubCategoryController::class, 'edit'])->name('edit');
                Route::get('/show/{subcategory}', [AdminSubCategoryController::class, 'show'])->name('show');
                Route::delete('/destroy/{subcategory}', [AdminSubCategoryController::class, 'destroy'])->name('destroy');
                Route::put('/update/{subcategory}', [AdminSubCategoryController::class, 'update'])->name('update');
            });

            // AdminTypeController
            Route::group(['prefix' => 'types', 'as' => 'types.'], function () {
                Route::get('/index', [AdminTypeController::class, 'index'])->name('index');
                Route::get('/create', [AdminTypeController::class, 'create'])->name('create');
                Route::post('/store', [AdminTypeController::class, 'store'])->name('store');
                Route::get('/edit/{type}', [AdminTypeController::class, 'edit'])->name('edit');
                Route::get('/show/{type}', [AdminTypeController::class, 'show'])->name('show');
                Route::delete('/destroy/{type}', [AdminTypeController::class, 'destroy'])->name('destroy');
                Route::put('/update/{type}', [AdminTypeController::class, 'update'])->name('update');
            });

            // AdminEmploymentTypeController
            Route::group(['prefix' => 'employment-types', 'as' => 'employment-types.'], function () {
                Route::get('/index', [AdminEmploymentTypeController::class, 'index'])->name('index');
                Route::get('/create', [AdminEmploymentTypeController::class, 'create'])->name('create');
                Route::post('/store', [AdminEmploymentTypeController::class, 'store'])->name('store');
                Route::get('/edit/{employmentType}', [AdminEmploymentTypeController::class, 'edit'])->name('edit');
                Route::get('/show/{employmentType}', [AdminEmploymentTypeController::class, 'show'])->name('show');
                Route::delete('/destroy/{employmentType}', [AdminEmploymentTypeController::class, 'destroy'])->name('destroy');
                Route::put('/update/{employmentType}', [AdminEmploymentTypeController::class, 'update'])->name('update');
            });

            // AdminEmploymentTypeController
            Route::group(['prefix' => 'districts', 'as' => 'districts.'], function () {
                Route::get('/index', [AdminDistrictController::class, 'index'])->name('index');
                Route::get('/create', [AdminDistrictController::class, 'create'])->name('create');
                Route::post('/store', [AdminDistrictController::class, 'store'])->name('store');
                Route::get('/edit/{district}', [AdminDistrictController::class, 'edit'])->name('edit');
                Route::get('/show/{district}', [AdminDistrictController::class, 'show'])->name('show');
                Route::delete('/destroy/{district}', [AdminDistrictController::class, 'destroy'])->name('destroy');
                Route::put('/update/{district}', [AdminDistrictController::class, 'update'])->name('update');
            });

            // AdminUserController
            Route::group(['prefix' => 'users', 'as' => 'users.'], function () {
                Route::get('/index', [AdminUserController::class, 'index'])->name('index');
                Route::get('/show/{user}', [AdminUserController::class, 'show'])->name('show');
                Route::delete('/destroy/{user}', [AdminUserController::class, 'destroy'])->name('destroy');
            });

            // AdminJobController
            Route::group(['prefix' => 'jobs', 'as' => 'jobs.'], function () {
                Route::get('/index', [AdminJobController::class, 'index'])->name('index');
                Route::get('/show/{job}', [AdminJobController::class, 'show'])->name('show');
                Route::delete('/destroy/{job}', [AdminJobController::class, 'destroy'])->name('destroy');
                Route::patch('/update/{job}', [AdminJobController::class, 'update'])->name('update');
            });

            // AdminOfferController
            Route::group(['prefix' => 'offers', 'as' => 'offers.'], function () {
                Route::get('/index', [AdminOfferController::class, 'index'])->name('index');
                Route::get('/show/{offer}', [AdminOfferController::class, 'show'])->name('show');
                Route::delete('/destroy/{offer}', [AdminOfferController::class, 'destroy'])->name('destroy');
                Route::patch('/update/{offer}', [AdminOfferController::class, 'update'])->name('update');
            });
        });
    });
});



Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'kr']);
});
