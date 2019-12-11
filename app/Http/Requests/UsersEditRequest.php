<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersEditRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required',
            'role_id' => 'required',
            'is_active' => 'required|in:1,0',
        ];
    }
}
