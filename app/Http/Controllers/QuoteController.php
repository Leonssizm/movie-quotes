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
		$quote = $request->validated();
		$quote['thumbnail'] = $this->storeImage($request);
		$quote['movie_id'] = $request->movie_id;
		Quote::create($quote);

		return redirect('admin');
	}

	public function destroy(Movie $movie)
	{
		$queryString = explode('/', request()->url());
		$quoteId = array_pop($queryString);
		$movie->quotes->where('id', $quoteId)->first()->delete();

		return back();
	}

	public function update(Movie $movie, UpdateQuoteRequest $request)
	{
		if ($request->has('thumbnail'))
		{
			dd($request);
		}
		$queryString = explode('/', request()->url());
		$quoteId = array_pop($queryString);
		$movie->quotes->where('id', $quoteId)->first()->update($request->validated());

		return back();
	}

	private function storeImage($request)
	{
		$storedImage = uniqid() . '-' . $request->body . '.' . $request->thumbnail->extension();
		$request->thumbnail->move('storage/images', $storedImage);
		return $storedImage;
	}
}
