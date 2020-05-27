<?php

namespace App\Http\Requests\Contact;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'first_name' => 'required|alpha|max:255',
            'middle_name' => 'required|alpha|max:255',
            'last_name' => 'nullable|alpha|max:255',
            'email' => ['required','email', 'max:255'],
            'number' => 'nullable|string|max:10',
            'site' => 'nullable|string|max:255',
            'birthday' => 'nullable|date',
            'city' => 'nullable|string|max:255',
            'work' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'work_email' => 'nullable|email|max:255',
            'comment' => 'nullable|string|max:255',
            'avatar' => 'nullable|mimes:jpeg,bmp,png|max:2056',
            'user_id' => 'integer',
            'group_id' => 'nullable|integer',
            'favorites' => ['required', Rule::in([1,0])
            ]
        ];

        return $rules;
    }
}
