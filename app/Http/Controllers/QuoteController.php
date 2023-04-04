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

	private function storeImage($request)
	{
		$storedImage = uniqid() . '-' . $request->body . '.' . $request->thumbnail->extension();
		$request->thumbnail->move('storage/images', $storedImage);
		return $storedImage;
	}
}
