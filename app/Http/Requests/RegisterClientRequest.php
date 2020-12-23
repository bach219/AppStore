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
            'sex' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'address' => 'required',
            'phone'=>'required|unique:clients,phone|regex:/(0)[0-9]{9}/',
            'email'=>'required|unique:clients,email'
        ];
    }
    public function messages()
    {
        return [
            'sex.required' => 'Giới tính bắt buộc chọn.',
            'name.required' => 'Họ tên bắt buộc nhập.',
            'email.required' => 'Email bắt buộc nhập.',
            'password.required' => 'Mật khẩu bắt buộc nhập.',
            'phone.required'=>'Số điện thoại bắt buộc nhập.',
            'address.required'=>'Địa chỉ giao hàng bắt buộc nhập.',
            'email' => 'Email chưa đúng định dạng.',
            'min' => 'Mật khẩu phải có ít nhất 6 kí tự.',
            'phone.unique'=>'Số điện thoại đã được sử dụng.',
            'email.unique'=>'Địa chỉ Email đã được sử dụng.',
            'phone.regex'=>'Số điện thoại không đúng định dạng.',

        ];
    }
}
