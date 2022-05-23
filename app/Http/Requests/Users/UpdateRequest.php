<?php

namespace App\Http\Requests\Users;

use App\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique(User::class, 'email')->ignore($this->route('user'))],
            'password' => ['nullable', 'confirmed', 'string', 'min:8', 'max:30'],
            'role' => ['required', 'integer', Rule::exists(Role::class, 'id')],
        ];
    }
}
