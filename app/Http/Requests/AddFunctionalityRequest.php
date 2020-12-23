<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFunctionalityRequest extends FormRequest
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
            'name' => 'required|unique'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Hãy nhập tên danh mục.',
            'unique' => 'Tên danh mục đã có.'
        ];
    }
}
