<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'name' => 'required|min:3|max:15',
            'price' => 'required|numeric|',
            'quantity'=>'required|numeric',
            'category_id' => 'required|numeric',
            'mota' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required'=> 'khong duoc de trong',
            'name.min:3' => 'toi thieu 3 ki tu',
            'name.max:15' => 'toi toi da 3 ki tu',
            'price.required'=> 'khong duoc de trong',
            'price.numeric'=> 'khong phai la so',
            'quantity.required'=> 'k duoc de trong',
            'quantity.numeric'=> 'khong phai la so',
            'category_id.required'=> 'k duoc de trong',
            'mota.required'=> 'k duoc de trong',

        ];
    }
}
