<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePortfolioRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:350',
            'website' => 'nullable|string|max:255',
            'features' => 'nullable',
            'box1_title' => 'nullable|string|max:255',
            'box1_value' => 'nullable|string|max:255',
            'box2_title' => 'nullable|string|max:255',
            'box2_value' => 'nullable|string|max:255',
            'box3_title' => 'nullable|string|max:255',
            'box3_value' => 'nullable|string|max:255',
            'short_description' => 'nullable|string|max:512',
            'meta_description' => 'nullable|string|max:255',
            'body' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'scroll_image' => 'nullable|mimes:jpeg,jpg,png,gif',
            'categories' => 'required'
        ];
    }
}
