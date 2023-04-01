<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;

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

	public function create()
	{
		return view('admin.create');
	}

	public function store()
	{
		$movie_attr = request()->validate([
			'title'     => ['required'],
		]);
		$movie_attr['thumbnail'] = $this->storeImage(request());
		$movie_attr['user_id'] = auth()->id();
		Movie::create($movie_attr);

		$quote_attr = request()->validate([
			'body'     => ['required'],
		]);
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
