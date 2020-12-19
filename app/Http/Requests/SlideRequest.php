<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SlideRequest extends FormRequest
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
            'name' => 'required|unique:slides,name',
            'image' =>'required|image'
        ];
    }

    public function messages()
    {
        return [
          'name.required' =>'Bạn chưa nhập tên slide!',
          'name.unique' =>'Tên slide đã tồn tại!',
          'image.required' =>'Bạn chưa chọn hình ảnh cho slide!',
          'image.image' =>'Ảnh cho slide không đúng định dạng!',
        ];
    }
}
