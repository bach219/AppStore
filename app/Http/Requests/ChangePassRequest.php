<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
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
            'oldpass' => 'required',
            'newpass' => 'required|min:6',
            'repass' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'oldpass.required' => 'Mật khẩu cũ bắt buộc nhập.',
            'newpass.required' => 'Mật khẩu mới bắt buộc nhập.',
            'repass.required' => 'Xác nhận mật khẩu bắt buộc nhập.',
            'newpass.min' => 'Mật khẩu mới phải có ít nhất 6 kí tự.',
        ];
    }
}
