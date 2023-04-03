<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuoteRequest;
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
		$quote = $request->validated();
		$quote['movie_id'] = $request->movie_id;
		Quote::create($quote);

		return redirect()->route('admin');
	}
}
