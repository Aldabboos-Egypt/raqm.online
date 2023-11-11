<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterApi extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => 'required|string',
            'phone' => [
                'required',
                'string',
                Rule::unique('users', 'phone'),
            ],
            // 'required|string',
            'email' => [
                'required',
                // 'email:rfc',
                'string',
                'max:191',
                // Rule::unique('users', 'email'),
            ],
            'password' => 'min:8|required|string',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
