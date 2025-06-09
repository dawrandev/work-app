<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobSaveController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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
            Route::get('/index', [JobController::class, 'index'])->name('index');
            Route::get('/show/{job}', [JobController::class, 'show'])->name('show');
        });
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

    // JobSaveController
    Route::middleware('auth')->group(function () {
        Route::prefix('save-jobs')->as('save-jobs.')->group(function () {
            Route::post('/store', [JobSaveController::class, 'store'])->name('store');
        });
    });
});


Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'kr']);
});
