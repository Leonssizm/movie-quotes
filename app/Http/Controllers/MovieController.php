<?php

namespace App\Http\Controllers;

use App\Models\Movie;

class MovieController extends Controller
{
	public function index()
	{
		return view('landing', [
			'movie'     => $this->generateRandomMovie(),
		]);
	}

	public function show()
	{
		return view('movie');
		// Will display single movie
	}

	private function generateRandomMovie()
	{
		$movie = Movie::all()->filter(function ($movie) {
			return $movie->id === rand(1, Movie::all()->count());
		});
		return $movie;
	}
}
