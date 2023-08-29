<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $method = $this->method();
        $userId = $this->route('user');

        if ($method == 'PUT') {
            return [
                'name' => ['required'],
                'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($userId)],
                'password' => ['required'],
            ];
        } else if ($method == 'PATCH') {
            return [
                'name' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email', Rule::unique('users', 'email')->ignore($userId)],
                'password' => ['sometimes', 'required'],
            ];
        }
    }
}
