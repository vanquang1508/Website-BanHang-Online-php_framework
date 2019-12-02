<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerValidate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'physical_address' => 'required|max:255|min:10',
            'postal_address' => 'required|max:255|min:10',
            'first_name' =>'required|max:50|min:2',
            'last_name' =>'required|max:50|min:2',
            'email' =>'required|unique:customers,email,'.$this->segment(3).',id',
            'password'=>'required|min:6|max:100',
        ];
    }
    public function messages()
    {
        return [
            'physical_address.required' => 'Bạn chưa nhập nội dung',
            'physical_address.max' => 'Độ dài nội dung không vượt quá 255 kí tự',
            'physical_address.min' => 'Độ dài nội dung không nhỏ hơn 10 kí tự',
            'postal_address.required' => 'Bạn chưa nhập nội dung',
            'postal_address.max' => 'Độ dài nội dung không vượt quá 255 kí tự',
            'postal_address.min' => 'Độ dài nội dung không nhỏ hơn 10 kí tự',
            'first_name.required' => 'Bạn chưa nhập họ lót',
            'first_name.max' => 'Họ lót không vượt quá 50 kí tự',
            'first_name.min' => 'Họ lót không nhỏ hơn 2 kí tự',
            'last_name.required' => 'Bạn chưa nhập tên',
            'last_name.max' => 'Tên không vượt quá 50 kí tự',
            'last_name.min' => 'Tên không nhỏ hơn 2 kí tự',
            'email.required' => 'Bạn chưa nhập email',
            'email.unique'=> 'Email đã tồn tại',
            'password.required' => 'Bạn chưa mật khẩu',
            'password.max' => 'Mật khẩu không vượt quá 100 kí tự',
            'password.min' => 'Mật khẩu không nhỏ hơn 6 kí tự',
        ];
    }
}
