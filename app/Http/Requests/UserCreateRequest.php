<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserCreateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'string', 'max:255', Rule::unique('users')],
            'password' => ['required', 'string', 'confirmed', 'min:8'],
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
