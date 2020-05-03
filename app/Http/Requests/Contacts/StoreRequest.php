<?php

namespace App\Http\Requests\Contacts;


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
        return false;
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
            'email' => 'required|email|unique:contacts',
            'number' => 'max:255',
            'site' => 'max:255',
            'birthday' => 'nullable|date',
            'city' => 'max:255',
            'work' => 'max:255',
            'position' => 'max:255',
            'work_email' => 'max:255',
            'comment' => 'max:255',
            'avatar' => 'max:255',
            'user_id' => 'integer',
            'group_id' => 'nullable|integer',
            'favorites' => [
                'required', Rule::in([
                    '0','1'
                ])
            ]
        ];

        return $rules;
    }
}
