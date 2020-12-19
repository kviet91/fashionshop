<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|unique:products,name',
            'image' => 'required|image',
            'price' => 'required',
            'count' => 'required',
            'cat' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'name.unique' => 'Tên sản phẩm đã tồn tại!',
            'image.required' => 'Vui lòng chọn ảnh hiển thị cho sản phẩm!',
            'image.image' => 'Vui lòng tải lên file ảnh!',
            'price.required' => 'Vui lòng nhập giá cho sản phẩm!',
            'count.required' => 'Vui lòng nhập số lượng sản phẩm!',
            'cat.required' => 'Vui lòng chọn danh mục sản phẩm!'
        ];
    }
}
