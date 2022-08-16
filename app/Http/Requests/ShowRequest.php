<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ShowRequest extends FormRequest
{
    public function rules()
    {
        return [
            'poster_path' => ['required', 'string', 'max:255'],
            'original_title' => ['required', 'string', 'max:255'],
            'title' => ['required', 'string', 'max:255'],
            'overview' => ['required'],
            'status' => ['required', 'string', Rule::in(['rumored','planned','production','post_production','released','canceled'])],
        ];
    }

    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {

    }
}
