<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginClientRequest extends FormRequest
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
            'password' => 'required|min:6'
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Trường email, password bắt buộc nhập.',
            'email' => 'Trường email phải có định dạng email',
            'min' => 'Mật khẩu phải có ít nhất 6 kí tự'
        ];
    }
}
