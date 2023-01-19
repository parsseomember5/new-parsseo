<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:100|unique:users',
            'phone' => 'required|digits:11',
            'password' => 'nullable|string|max:255|confirm',
            'avatar' => 'nullable|mimes:jpeg,jpg,png,gif'
        ];
    }
}
