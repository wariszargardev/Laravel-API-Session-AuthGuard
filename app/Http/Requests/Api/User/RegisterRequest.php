<?php

namespace App\Http\Requests\Api\User;

use App\Http\Traits\Api\ApiFailedValidation;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    use ApiFailedValidation;

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'phone_number' => 'required|string|min:8',
            'cnic' => 'required|string',
            'password' => 'required|string|min:8',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
