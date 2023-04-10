<?php

namespace App\Http\Controllers;

use App\Http\Requests\Movie\StoreMovieRequest;
use App\Http\Requests\Movie\UpdateMovieRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{
	public function index(): View
	{
		$quote = Quote::with('movie')->get();

		if ($quote->count() == 0)
		{
			return view('components.no-quotes');
		}
		else
		{
			return view('landing', [
				'quote'     => $quote->random(),
			]);
		}
	}

	public function show(Movie $movie): View
	{
		return view('movie', [
			'movie' => $movie,
			'quotes'=> $movie->quotes,
		]);
	}

	public function edit(Movie $movie): View
	{
		return view('admin.edit', [
			'movie' => $movie,
		]);
	}

	public function update(UpdateMovieRequest $request, Movie $movie): RedirectResponse
	{
		$movie->update($request->validated());
		return back();
	}

	public function store(StoreMovieRequest $request): RedirectResponse
	{
		Movie::create($request->validated() + ['user_id' => auth()->id()]);
		return redirect()->route('admin');
	}

	public function destroy(Movie $movie): RedirectResponse
	{
		$movie->delete();
		return back();
	}
}
