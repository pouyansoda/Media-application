<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email',
            'role_id' => 'required',
            'is_active' => 'required|in:1,0',
            'password' => 'required',
        ];
    }
}
