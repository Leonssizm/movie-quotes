<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\Quote;

class MovieController extends Controller
{
	public function index()
	{
		$quote = Quote::with('movie')->get();
		return view('landing', [
			'quote'     => $quote->random(),
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
		Movie::create($attributes + ['user_id' => auth()->id()]);
		return redirect('/admin');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back();
	}
}
