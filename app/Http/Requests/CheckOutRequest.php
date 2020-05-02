<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
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
            'email'=>'unique:vp_customers,con_email',
            'phone'=>'unique:vp_customers,phone_number',
        ];
    }
    public function messages()
    {
        return [
            'email.unique'=>'Địa chỉ Email đã bị trùng!',
            'phone.unique'=>'Số điện thoại đã bị trùng!'
        ];
    }
}
