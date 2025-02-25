<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
//            'user_id' => 'required|exists:users,id',
            'title' => 'required|min:3|max:50',
            'cat' => 'required',
            'author' => 'required|min:3|max:50',
            'abstract' => 'required|min:10',
            'quillBody' => 'required|min:20',
            'meta_description' => 'required|min:3',
            'meta_title' => 'required|min:3',
            'post_url' => 'file|mimes:pdf',
            'thumbnail_url' => 'required|image|mimes:jpeg,png,jpg'

        ];
    }
}
