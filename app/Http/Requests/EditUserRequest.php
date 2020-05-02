<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;
class EditUserRequest extends FormRequest
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
            'mail'=>'unique:users,email,'.Auth::user()->id.',id'
        ];
    }
    public function messages()
    {
        return [
            //
            'mail.unique'=>'Địa chỉ email đã bị trùng!'
        ];
    }
}
