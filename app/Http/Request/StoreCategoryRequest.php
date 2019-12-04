<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'name_category' => 'required|max: 15|min: 5',
            'description_category' => 'required|max: 50|min: 8'
        ];
    }

    public function messages(){
        return [
            'name_category.required' => 'A name category is required',
            'name_category.max:5' => 'The name can only have a maximum of 5 characters',
            'description_category.required' => 'A description is required',
        ];
    }
}
