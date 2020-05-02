<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterClientRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone'=>'unique:clients,phone|digits:10',
            'email'=>'unique:clients,email'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường email, password bắt buộc nhập.',
            'email' => 'Trường email phải có định dạng email',
            'min' => 'Mật khẩu phải có ít nhất 6 kí tự',
            'phone.unique'=>'Số điện thoại đã được sử dụng!',
            'email.unique'=>'Địa chỉ email đã được sử dụng!',
            'digits'=>'Số điện thoại chỉ được 10 số',

        ];
    }
}
