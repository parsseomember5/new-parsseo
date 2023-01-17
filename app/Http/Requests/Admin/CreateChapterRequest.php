<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateChapterRequest extends FormRequest
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
            'fa_title' => 'required|string|max:255',
            'en_title' => 'required|string|max:255',
            'time' => 'required|string|max:191',
            'product_id' => 'required',
            'type' => 'required',
            'status' => 'required',
            'order' => 'required|numeric',
        ];
    }
}
