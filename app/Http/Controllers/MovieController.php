<?php

namespace App\Http\Controllers;

class MovieController extends Controller
{
	public function index()
	{
		return view('landing');
		// Will display all movies
	}

	public function show()
	{
		return view('movie');
		// Will display single movie
	}
}
