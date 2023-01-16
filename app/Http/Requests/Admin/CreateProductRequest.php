<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'h1' => 'required|string|max:191',
            'kind' => 'required|string|max:191',
            'type' => 'required|string|max:191',
            'level' => 'required',
            'state' => 'required|string|max:191',
            'time' => 'required|string|max:191',
            'h2' => 'nullable|string|max:350',
            'h3' => 'nullable|string|max:350',
            'video' => 'nullable|string|max:1000',
            'slug' => 'nullable|string|max:350',
            'spotplayer_course_id' => 'nullable|string|max:30',
            'status' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'keywords' => 'nullable',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'cover' => 'nullable|mimes:jpeg,jpg,png,gif',
            'headlines_pdf' => 'nullable|mimes:jpeg,jpg,png,gif,pdf,docx',
            'author_id' => 'required',
            'admin_id' => 'nullable',
            'price' => 'required|numeric',
            'sitemap_priority' => 'required',
            'offPrice' => 'nullable|numeric',
            'support' => 'nullable|numeric',
            'child.*' => 'nullable|numeric',
            'recommendeds.*' => 'nullable|numeric',
            'tags.*' => 'nullable|numeric',
        ];
    }
}
