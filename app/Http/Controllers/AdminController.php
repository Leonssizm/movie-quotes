<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use App\Models\User;

class AdminController extends Controller
{
	public function index()
	{
		return view('admin.signup');
	}

	public function show()
	{
		return view('admin.panel', [
			'movies'=> Movie::all(),
			'quotes'=> Quote::all(),
		]);
	}

	public function store()
	{
		// TODO: create Request validation class
		$attributes = request()->validate([
			'name'     => ['required', 'min:3'],
			'email'    => ['required', 'email'],
			'password' => ['required'],
		]);

		User::create($attributes);

		return redirect()->route('admin.show');
	}
}
