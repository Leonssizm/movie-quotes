<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
	 */
	public function rules(): array
	{
		return [
			'title' => 'required',
		];
	}

	protected function prepareForValidation()
	{
		$this->merge([
			'title'  => [
				'en'=> $this->title_en,
				'ka'=> $this->title_ka,
			],
		]);
	}
}
