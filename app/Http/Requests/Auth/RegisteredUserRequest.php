<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisteredUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            "last_name" =>"required|string|max:255",
            'age'=>'requerid|integer',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:3',
        ];
    }
}
