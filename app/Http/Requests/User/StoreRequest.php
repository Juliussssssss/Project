<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $rules = [
            'first_name' => 'required|string|alpha|max:255',
            'middle_name' => 'required|string|alpha|max:255',
            'last_name' => 'nullable|string|alpha|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:255',
        ];

        return $rules;
    }
}
