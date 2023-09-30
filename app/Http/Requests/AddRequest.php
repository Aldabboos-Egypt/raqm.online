<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'ar.title' => ['required'],
            'ar.description' => ['nullable'],
            'en.title' => ['required'],
            'en.description' => ['nullable'],
            'image' => ['nullable'],
            'link' => ['nullable'],
            'page' => ['nullable'],
            'date_from' => ['nullable'],
            'date_to' => ['nullable'],
        ];
    }
}



