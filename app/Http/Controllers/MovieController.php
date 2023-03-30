<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
	public function index()
	{
		return view('landing', [
			'movie'     => Movie::all()->random(),
		]);
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie' => $movie,
			'quotes'=> $movie->quotes,
		]);
	}
}
