<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SaveOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

    // OrderController 
    Route::middleware('auth')->group(function () {
        Route::prefix('orders')->as('orders.')->group(function () {
            Route::get('/create', [OrderController::class, 'create'])->name('create');
            Route::post('/store', [OrderController::class, 'store'])->name('store');
        });
    });
    Route::get('orders/index', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/show/{order}', [OrderController::class, 'show'])->name('orders.show');

    // ProfileController
    Route::middleware('auth')->group(function () {
        Route::prefix('profile')->as('profile.')->group(function () {
            Route::get('/index', [ProfileController::class, 'index'])->name('index');
            Route::get('/my-resume', [ProfileController::class, 'myResume'])->name('my-resume');
            Route::get('/bookmarked', [ProfileController::class, 'bookmarked'])->name('bookmarked');
        });
    });

    // SaveOrderController
    Route::middleware('auth')->group(function () {
        Route::prefix('save-order')->as('save-orders.')->group(function () {
            Route::post('/store', [SaveOrderController::class, 'store'])->name('store');
        });
    });
});


Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'kr']);
});
