<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' =>[ 'required', Rule::unique('admins', 'name')->ignore($this->id)],
            'email' => ['required', Rule::unique('admins', 'email')->ignore($this->id)],
        ];

        if (request()->isMethod('post')) {
            $rules['password'] = ['required', 'confirmed', 'min:8'];
        }
        elseif (request()->isMethod('PUT') || request()->isMethod('PATCH')) {
            $rules['password'] = ['sometimes', 'confirmed'];
        }

        return $rules;
    }
}
