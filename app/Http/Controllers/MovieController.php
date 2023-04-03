<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;

class MovieController extends Controller
{
	public function index()
	{
		$randomMovie = Movie::all()->random();
		$randomQuote = '';
		if ($randomMovie->quotes->count() == 0)
		{
			$randomQuote = 'This Movie Has No Quotes Yet';
		}
		else
		{
			$randomQuote = $randomMovie->quotes->random();
		}

		return view('landing', [
			'movie'     => $randomMovie,
			'quote'     => $randomQuote,
		]);
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie' => $movie,
			'quotes'=> $movie->quotes,
		]);
	}

	public function edit(Movie $movie)
	{
		return view('admin.edit', [
			'movie' => $movie,
		]);
	}

	public function update(Movie $movie, UpdateMovieRequest $request)
	{
		$movie->update($request->validated());
		return back();
	}

	public function store(StoreMovieRequest $request)
	{
		$attributes = $request->validated();
		$attributes['user_id'] = auth()->id();
		Movie::create($attributes);
		return redirect('/admin');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back();
	}
}
