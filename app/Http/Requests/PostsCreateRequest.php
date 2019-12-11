<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostsCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
//            'category_id' => 'required',
            'photo_id' => 'required',
            'title' => 'required|unique:posts,title',
            'body' => 'required',
        ];
    }
}
