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

Route::middleware(['guest'])->group(function () {
	Route::controller(AuthController::class)->group(function () {
		Route::get('login', 'create')->name('login.create');
		Route::post('login', 'store')->name('login.store');
	});
	Route::controller(MovieController::class)->group(function () {
		Route::get('/', 'index')->name('movies')->withoutMiddleware('guest');
		Route::get('movies/{movie}', 'show')->name('movie')->withoutMiddleware('guest');
	});
});

Route::middleware(['auth'])->group(function () {
	Route::controller(MovieController::class)->group(function () {
		Route::view('movie/create', ['admin.create'])->name('movie.create');
		Route::get('movie/{movie}/edit', 'edit')->name('movie.edit');
		Route::put('movie/{movie}', 'update')->name('movie.update');
		Route::post('movie/store', 'store')->name('movie.store');
		Route::delete('movie/{movie}/delete', 'destroy')->name('movie.destroy');
	});
	Route::controller(QuoteController::class)->group(function () {
		Route::get('quote/create', 'create')->name('quote.create');
		Route::post('quote/store', 'store')->name('quote.store');
		Route::put('quote/{quote}/update', 'update')->name('quote.update');
		Route::delete('quote/{quote}/delete', 'destroy')->name('quote.destroy');
	});

	Route::controller(AuthController::class)->group(function () {
		Route::get('admin', 'show')->name('admin');
		Route::post('logout', 'destroy')->name('logout');
	});
});
