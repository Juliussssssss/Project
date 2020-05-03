<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $user_id = request()->route('user')->id;

        $rules = [
            'first_name' => 'required|alpha|max:255',
            'middle_name' => 'required|alpha|max:255',
            'last_name' => 'nullable|alpha|max:255',
            'email' => ['required','email', 'max:255', 'unique:users,email,'.$user_id],
            'password' => 'required|min:8|max:255',
        ];

        return $rules;
    }
}
