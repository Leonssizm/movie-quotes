<?php

namespace App\Http\Controllers;

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

	public function store()
	{
		$attributes = request()->validate([
			'body'     => ['required'],
			'movie_id' => ['required'],
		]);

		Quote::create($attributes);

		return redirect()->route('admin');
	}
}
