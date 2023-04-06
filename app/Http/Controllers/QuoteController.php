<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
use App\Http\Requests\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;

class QuoteController extends Controller
{
	public function create()
	{
		return view('quote.create', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreQuoteRequest $request)
	{
		$attributes = $request->validated();
		Quote::create($attributes + ['movie_id' => $request->movie_id, 'thumbnail' => $request->file('thumbnail')->store('image', 'public')]);
		return redirect('admin');
	}

	public function destroy(Quote $quote)
	{
		$quote->delete();

		return back();
	}

	public function update(Quote $quote, UpdateQuoteRequest $request)
	{
		$quote->update($request->validated());

		return back();
	}
}
