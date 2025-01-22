<?php

namespace App\Http\Requests\Auth;

use App\Enums\UserRole;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

/**
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $password_confirmation
 */
class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => ['required', 'in:' . implode(',', array_column(UserRole::cases(), 'value'))],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        Log::info('Validation failed', $validator->errors()->toArray());
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
