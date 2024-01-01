<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
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
            'title' => ['required'],
            'title_ar' => ['required'],
            // ignore required if edit
            'image' => ['nullable'],
            'sub_category_id' => ['nullable'],
            'blog_category_id' => ['required'],
            'description' => ['nullable'],
            'blog_category_id' => 'required',
            'description' => 'nullable',
            'description_ar' => 'nullable',
        ];
    }
}
