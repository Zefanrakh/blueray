<?php

namespace App\Http\Requests\User;

use App\Enums\UserRole;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends BaseUserRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->authorizeUserAction();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $userId = $this->route('userId');
        return [
            'name' => 'string|max:255',
            'email' =>  [
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId), // Abaikan validasi unik untuk user dengan ID ini.
            ],
            'password' => 'string|min:8|confirmed',
            'role' => ['in:' . implode(',', array_column(UserRole::cases(), 'value'))],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->failedValidationUserAction($validator);
    }
}
