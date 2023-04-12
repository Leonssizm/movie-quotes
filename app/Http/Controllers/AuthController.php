<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function create(): View
	{
		return view('sessions.create');
	}

	public function store(LoginRequest $request): RedirectResponse
	{
		if (Auth::attempt($request->validated()))
		{
			return redirect()->intended(route('admin'));
		}

		return redirect()->back()->withErrors([
			'failed' => trans('auth.failed'),
		]);
	}

	public function show(): View
	{
		return view('admin.admin-panel', [
			'movies' => Movie::all(),
			'quotes' => Quote::all(),
		]);
	}

	public function destroy(): RedirectResponse
	{
		auth()->logout();

		return redirect()->route('movies');
	}
}
