<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuickUpdateRequest extends FormRequest
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
            'title' => ['nullable'],
            'description' => ['nullable'],
            'phone' => ['nullable'],
            'price' => ['nullable'],
            'latitude' => ['nullable'],
            'longitude' => ['nullable'],
            'subcategory_id' => ['nullable'],
        ];
    }
}
