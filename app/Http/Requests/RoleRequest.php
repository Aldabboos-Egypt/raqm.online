<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name'=>'required|string|max:150',
            'display_name'=>'required|string|max:150',
            'description'=>'nullable|string|max:150',
            'permissions' => 'required|array'
        ];
    }

    public function messages()
    {
        return [
            'required' => __('validation.required'),
            'string' => __('validation.string'),
            'max' => __('validation.max.numeric'),
            'array' => __('validation.array'),
        ];
    }
}

