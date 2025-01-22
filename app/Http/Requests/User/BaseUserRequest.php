<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Log;

class BaseUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorizeUserAction(): bool
    {
        $user = $this->user(); // Current authenticated user
        $targetUserId = $this->route('userId'); // Target user ID from route

        // Admins can manage all users
        if ($user && $user->role->value === 'admin') {
            return true;
        }

        // Regular users can only manage their own profile
        if ($user && $user->id == $targetUserId) {
            return true;
        }

        return false;
    }

    public function failedValidationUserAction(Validator $validator)
    {
        Log::info('Validation failed', $validator->errors()->toArray());
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors(),
        ], 422));
    }
}
