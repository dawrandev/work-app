<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrderController;
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
        return view('user.pages.home');
    })->name('home');

    Route::controller(AuthController::class)->group(function () {
        Route::post('/register', 'register')->name('register');
        Route::post('/login', 'login')->name('login');
        Route::post('/logout', 'logout')->name('logout')->middleware('auth');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::group(['prefix' => '', 'orders', 'as' => 'orders.'], function () {
            Route::get('/index', [OrderController::class, 'index'])->name('index');
        });
    });
});

Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'kr']);
});
