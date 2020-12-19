<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|email',
            'review' => 'required|max:255',
            'rating' => 'required'
        ];
    }
    public function messages()
    {
        return [
          'name.required' => 'Vui lòng nhập tên!',
          'email.required' => 'Vui lòng nhập email!',
          'email.email' => 'Địa chỉ email sai định dạng!',
          'review.required' => 'Vui lòng nhập bình luận!',
          'review.max' => 'Bình luận quá dài!',
          'rating.required' => 'Vui lòng nhập bình chọn!'
        ];
    }
}
