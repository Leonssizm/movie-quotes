<?php

namespace App\Http\Controllers;

use App\Http\Requests\Quote\StoreQuoteRequest;
use App\Http\Requests\Quote\UpdateQuoteRequest;
use App\Models\Movie;
use App\Models\Quote;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;

class QuoteController extends Controller
{
	public function create(): View
	{
		return view('quote.create', [
			'movies' => Movie::all(),
		]);
	}

	public function store(StoreQuoteRequest $request): RedirectResponse
	{
		Quote::create($request->validated() + ['thumbnail' => $request->file('thumbnail')->store('image', 'public')]);
		return redirect()->route('admin');
	}

	public function destroy(Quote $quote): RedirectResponse
	{
		File::delete('storage/' . $quote->thumbnail);
		$quote->delete();

		return back();
	}

	public function update(UpdateQuoteRequest $request, Quote $quote): RedirectResponse
	{
		if ($request->hasFile('thumbnail'))
		{
			File::delete('storage/' . $quote->thumbnail);
			$quote->thumbnail = $request->file('thumbnail')->store('image', 'public');
		}
		$quote->update($request->validated());

		return back();
	}
}
