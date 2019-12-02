<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
            'product_name' => 'required|max:255|min:5|unique:products,product_name,'.$this->segment(3).',id',
            'description' => 'required|max:255|min:5',
            'price' => 'required|numeric',
            'brand_id'=>'required',
            'category_id'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'product_name.unique' =>'Tên đã tồn tại ',
            'product_name.required' => 'Bạn chưa nhập tên',
            'product_name.max' => 'Tên không vượt quá 255 kí tự',
            'product_name.min' => 'Tên không nhỏ hơn 10 kí tự',
            'description.required' => 'Bạn chưa nhập nội dung',
            'description.max' => 'Nội dung không vượt quá 255 kí tự',
            'description.min' => 'Nội dung không nhỏ hơn 10 kí tự',
            'price.required' => 'Bạn chưa nhập giá',
            'price.numeric' => 'Bạn nhập sai kiểu dữ liệu',
            'brand_id.required' => 'Bạn chưa chọn nhà sản xuất',
            'category_id.required' => 'Bạn chưa chọn thể loại',
        ];
    }
}
