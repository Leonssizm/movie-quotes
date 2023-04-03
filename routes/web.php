<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
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
	Route::view('movie/create', ['admin.create'])->name('movie.create')->middleware('auth');
	Route::get('movies/{movie}', 'show')->name('movie');
	Route::get('movie/{movie}/edit', 'edit')->name('movie.edit')->middleware('auth');
	Route::put('movie/{movie}/update', 'update')->name('movie.update')->middleware('auth');
	Route::post('movie/store', 'store')->name('movie.store')->middleware('auth');
	Route::delete('movie/{movie}/delete', 'destroy')->name('movie.destroy')->middleware('auth');
});

Route::controller(QuoteController::class)->group(function () {
	Route::get('quote/create', 'create')->name('quote.create')->middleware('auth');
	Route::post('quote/store', 'store')->name('quote.store')->middleware('auth');
	Route::put('movie/{movie}/quote/{quote}', 'update')->name('quote.update')->middleware('auth');
	Route::delete('movie/{movie}/quote/{quote}', 'destroy')->name('quote.destroy')->middleware('auth');
});

Route::controller(SessionsController::class)->group(function () {
	Route::get('login', 'create')->name('login.create')->middleware('guest');
	Route::post('login', 'store')->name('login.store')->middleware('guest');
	Route::get('admin', 'show')->name('admin')->middleware('auth');
	Route::post('logout', 'destroy')->name('logout')->middleware('auth');
});
