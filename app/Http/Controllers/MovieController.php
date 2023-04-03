<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\StoreQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;

class MovieController extends Controller
{
	public function index()
	{
		$randomMovie = Movie::all()->random();

		return view('landing', [
			'movie'     => $randomMovie,
			'quote'     => $randomMovie->quotes->random(),
		]);
	}

	public function show(Movie $movie)
	{
		return view('movie', [
			'movie' => $movie,
			'quotes'=> $movie->quotes,
		]);
	}

	public function create()
	{
		return view('admin.create');
	}

	public function store(StoreMovieRequest $movieRequest, StoreQuoteRequest $quoteRequest)
	{
		$movie_attr = $movieRequest->validated();
		$movie_attr['thumbnail'] = $this->storeImage($movieRequest);
		$movie_attr['user_id'] = auth()->id();
		Movie::create($movie_attr);

		$quote_attr = $quoteRequest->validated();
		$quote_attr['movie_id'] = Movie::all()->last()->id;
		Quote::create($quote_attr);

		return redirect('/admin');
	}

	public function destroy(Movie $movie)
	{
		$movie->delete();
		return back();
	}

	private function storeImage($request)
	{
		$storedImage = uniqid() . '-' . $request->title . '.' . $request->thumbnail->extension();
		$request->thumbnail->move('storage/images', $storedImage);
		return $storedImage;
	}
}
