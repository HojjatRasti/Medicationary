<?php

namespace App\Http\Requests\Admin\Webinar;

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
            'title' => 'required|min:3|max:128',
            'cat' => 'required',
            'instructor' => 'required|min:3|max:50',
            'instructor_thumbnail_url' => 'nullable|image|mimes:jpeg,png,jpg',
            'webinar_status' => 'required|in:alive,terminated',
            'description' => 'required|min:10',
            'meta_description' => 'required|min:3',
            'meta_title' => 'required|min:3',
            'webinar_url' => 'nullable|file|mimes:mp4,mkv',
            'thumbnail_url' => 'nullable|image|mimes:jpeg,png,jpg'];
    }
}
