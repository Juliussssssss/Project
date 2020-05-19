<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
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
            'contacts' => ['required', 'array', 'min:1'],
            'contacts.*' => ['required', 'integer', 'distinct', 'min:1'],
            'form.subject' => ['nullable', 'string', 'max:255'],
            'form.message' => ['required', 'string', 'min:1', 'max:1000'],
        ];
    }
}
