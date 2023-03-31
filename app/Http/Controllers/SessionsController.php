<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Quote;
use App\Models\User;

class SessionsController extends Controller
{
	public function create()
	{
		return view('sessions.create');
	}

	public function store()
	{
		$attributes = request()->validate([
			'email'    => 'required|exists:users,email',
			'password' => 'required',
		]);
		// if authentication is successful, attempt will check it
		// throw ValidationException::withMessages([
		// 	'email' => 'Your provided credentials could not be verified.',
		// ]);

		$user = User::all()->where('email', request()->email)->first();

		auth()->login($user);

		return redirect()->route('admin');
	}

	public function show()
	{
		return view('admin.panel', [
			'movies' => Movie::all(),
			'quotes' => Quote::all(),
		]);
	}

	public function destroy()
	{
		auth()->logout();

		return redirect('/');
	}
}
