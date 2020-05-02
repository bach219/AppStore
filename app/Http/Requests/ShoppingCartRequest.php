<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'phone' => 'required|digits:10'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường email, password bắt buộc nhập.',
            'email' => 'Trường email phải có định dạng email',
            'digits:10' => 'Số điện thoại phải có 10 số',
        ];
    }
}
