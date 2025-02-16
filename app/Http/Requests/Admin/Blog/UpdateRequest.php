<?php

namespace App\Http\Requests\Admin\Blog;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'category_id' => 'required|exists:post_categories,id',
            'author' => 'required|min:3|max:50',
            'abstract' => 'required|min:10',
            'body' => 'required|min:20',
            'post_url' => 'nullable|file|mimes:pdf',
            'thumbnail_url' => 'nullable|image|mimes:jpeg,png,jpg'
        ];
    }
}
