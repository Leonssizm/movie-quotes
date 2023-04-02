<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieQuotesController extends Controller
{
	public function index(Movie $movie)
	{
		return view('admin.edit', [
			'movie' => $movie,
		]);
	}

	public function destroy(Movie $movie)
	{
		$queryString = explode('/', request()->url());
		$quoteId = array_pop($queryString);
		$movie->quotes->where('id', $quoteId)->first()->delete();

		return back();
	}
}
