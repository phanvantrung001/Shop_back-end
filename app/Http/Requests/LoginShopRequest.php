<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginShopRequest extends FormRequest
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
    public function rules(): array
    {
        $rules =[
            'email'=>'required|email',
            'password'=>'required'
        ];
        return $rules ;
    }
    public function messages()
    {
        $messages = [
            'email.required'=>'vui lòng nhập email',
            'email.email'=>'email không đúng',
            'password.required'=>'nhập mật khẩu'
        ];
        return $messages ;
    }
}
