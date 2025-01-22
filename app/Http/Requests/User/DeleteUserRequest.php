<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\Validator;

class DeleteUserRequest extends BaseUserRequest
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
        return [
            //
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $this->failedValidationUserAction($validator);
    }
}
