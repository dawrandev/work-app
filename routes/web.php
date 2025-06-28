<?php

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

Route::group(['prefix' => '{locale}', 'middleware' => 'setLocale'], function () {
    Route::post('/livewire/update', \Livewire\Mechanisms\HandleRequests\HandleRequests::class . '@handleUpdate')
        ->name('livewire.update');

    Route::get('/livewire/livewire.js', \Livewire\Mechanisms\FrontendAssets\FrontendAssets::class . '@returnJavaScriptAsFile')
        ->name('livewire.js');

    Route::get('/', function () {
        return view('pages.user.home');
    })->name('home');

    // Authcontroller 
    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout')->middleware('auth');
        Route::get('/edit', 'edit')->name('auth.edit')->middleware('auth');
        Route::post('/update', 'update')->name('auth.update')->middleware('auth');
    });

    // JobController 
    Route::middleware('auth')->group(function () {
        Route::prefix('jobs')->as('jobs.')->group(function () {
            Route::get('/create', [JobController::class, 'create'])->name('create');
            Route::post('/store', [JobController::class, 'store'])->name('store');
            Route::get('/edit/{job}', [JobController::class, 'edit'])->name('edit');
            Route::put('/update/{job}', [JobController::class, 'update'])->name('update');
            Route::delete('/destroy/{job}', [JobController::class, 'destroy'])->name('destroy');
        });
    });
    Route::prefix('jobs')->as('jobs.')->group(function () {
        Route::get('/show/{job}', [JobController::class, 'show'])->name('show');
        Route::get('/index', [JobController::class, 'index'])->name('index');
    });

    // Offer Controller
    Route::middleware('auth')->group(function () {
        Route::prefix('offers')->as('offers.')->group(function () {
            Route::get('/create', [OfferController::class, 'create'])->name('create');
            Route::post('/store', [OfferController::class, 'store'])->name('store');
            Route::get('/index', [OfferController::class, 'index'])->name('index');
            Route::get('/show/{offer}', [OfferController::class, 'show'])->name('show');
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
            Route::get('/bookmarked', [ProfileController::class, 'bookmarked'])->name('bookmarked');
            Route::get('/manage-jobs', [ProfileController::class, 'manageJobs'])->name('manage-jobs');
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
            Route::delete('/destroy/{id}', [JobSaveController::class, 'destroy'])->name('destroy');
        });
    });

    // OfferSaveController
    Route::middleware('auth')->group(function () {
        Route::prefix('save-offers')->as('save-offers.')->group(function () {
            Route::post('/store', [OfferSaveController::class, 'store'])->name('store');
        });
    });

    // JobApplyController
    Route::middleware('auth')->group(function () {
        Route::prefix('job-applies')->as('job-applies.')->group(function () {
            Route::get('/index', [JobApplyController::class, 'index'])->name('index');
            Route::post('/store', [JobApplyController::class, 'store'])->name('store');
        });
    });

    // OfferApplyController
    Route::middleware(['auth'])->group(function () {
        Route::prefix('offer-applies')->as('offer-applies.')->group(function () {
            Route::get('/index', [OfferApplyController::class, 'index'])->name('index');
            Route::post('/store', [OfferApplyController::class, 'store'])->name('store');
            Route::get('show/{id}', [OfferApplyController::class, 'show'])->name('show');
            Route::delete('destroy/{id}', [OfferApplyController::class, 'destroy'])->name('destroy');
        });
    });
});


Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'kr']);
});
