<?php

namespace App\Http\Requests\Admin;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:191',
            'content' => 'required',
            'description' => 'max:255',
            'cover_image' => 'image',
            'status' => Rule::in([Post::STATUS_PUBLISHED, Post::STATUS_UNPUBLISHED]),
        ];
    }
}
