<?php

namespace App\Http\Requests\Roles;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Role;

class StoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique(Role::class, 'name')],
            'permissions' => ['required', 'array', 'min:1'],
            'permissions.*' => ['required', 'string'],
        ];
    }
}
