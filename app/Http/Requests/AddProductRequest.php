<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
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
            //
            'img'=>'image',
            'name'=>'unique:vp_products,prod_name',
            'description'=>'required'
        ];
    }
    public function messages()
    {
        return [
            //
            'name.unique'=>'Tên sản phẩm đã bị trùng!',
            'description.required' => 'Hãy chắc chắn đã nhập mô tả chi tiết sản phẩm'
        ];
    }
}
