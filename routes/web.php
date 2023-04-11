<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\QuoteController;
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

Route::get('/change.locale/{locale}', [LanguageController::class, 'changeLocale'])->name('locale.change');

Route::controller(MovieController::class)->group(function () {
	Route::get('/', 'index')->name('movies');
	Route::get('movies/{movie}', 'show')->name('movie');
	Route::view('movie/create', ['admin.create'])->name('movie.create')->middleware('auth');
	Route::get('movie/{movie}/edit', 'edit')->name('movie.edit')->middleware('auth');
	Route::put('movie/{movie}', 'update')->name('movie.update')->middleware('auth');
	Route::post('movie/store', 'store')->name('movie.store')->middleware('auth');
	Route::delete('movie/{movie}/delete', 'destroy')->name('movie.destroy')->middleware('auth');
});

Route::controller(QuoteController::class)->middleware('auth')->group(function () {
	Route::get('quote/create', 'create')->name('quote.create');
	Route::post('quote/store', 'store')->name('quote.store');
	Route::put('quote/{quote}/update', 'update')->name('quote.update');
	Route::delete('quote/{quote}/delete', 'destroy')->name('quote.destroy');
});

Route::controller(AuthController::class)->group(function () {
	Route::get('login', 'create')->name('login.create')->middleware('guest');
	Route::post('login', 'store')->name('login.store')->middleware('guest');
	Route::get('admin', 'show')->name('admin')->middleware('auth');
	Route::post('logout', 'destroy')->name('logout')->middleware('auth');
});
