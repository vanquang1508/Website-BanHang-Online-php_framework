<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandValidate extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:255|min:4|unique:brands,name,'.$this->segment(3).',id',
            'description' => 'required|max:255|min:10',
        ];
    }
    public function messages()
    {
        return [
            'name.unique' =>'Tên đã tồn tại ',
            'name.required' => 'Bạn chưa nhập tên',
            'name.max' => 'Tên không vượt quá 255 kí tự',
            'name.min' => 'Tên không nhỏ hơn 4 kí tự',
            'description.required' => 'Bạn chưa nhập nội dung',
            'description.max' => 'Nội dung không vượt quá 255 kí tự',
            'description.min' => 'Nội dung không nhỏ hơn 10 kí tự'
        ];
    }
}
