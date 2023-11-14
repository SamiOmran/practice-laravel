<?php

namespace App\Http\Requests\API\User;

use App\DTOs\UserDTO;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'email' => ['sometimes', 'required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['sometimes', 'required', Rules\Password::defaults()],
        ];
    }

    public function toDTO(): UserDTO
    {
        $data = $this->validated();

        return UserDTO::from($data);
    }
}
