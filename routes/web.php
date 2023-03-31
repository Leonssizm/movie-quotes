<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\SessionsController;
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

Route::controller(MovieController::class)->group(function () {
	Route::get('/', 'index')->name('movies');
	Route::get('movies/{movie}', 'show')->name('movie');
});

// Login

Route::controller(SessionsController::class)->group(function () {
	Route::get('login', 'create')->name('login.create')->middleware('guest');
	Route::post('login', 'store')->name('login.store')->middleware('guest');
	Route::get('admin', 'show')->name('admin')->middleware('auth');
	Route::post('logout', 'destroy')->name('logout')->middleware('auth');
});
