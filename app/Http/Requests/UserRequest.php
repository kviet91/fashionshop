<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'username' => 'required|unique:users,username',
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            're-password' => 'required|min:8|same:password',
            'phone' => 'required|min:10',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Bạn chưa nhập tên người dùng!',
            'username.unique' => 'Tên người dùng đã tồn tại!',
            'name.required' => 'Bạn chưa nhập họ tên!',
            'email.required' => 'Bạn chưa nhập email!',
            'email.email' => 'Email không đúng định dạng!',
            'password.required' => 'Bạn chưa nhập mật khẩu!',
            'password.min' => 'Mật khẩu phải chứa tối thiểu 8 kí tự!',
            're-password.required' => 'Bạn chưa nhập lại mật khẩu!',
            're-password.same' => 'Mật khẩu nhập lại không khớp!',
            'phone.required' => 'Bạn chưa nhập số điện thoại!',
            'phone.min' => 'Số điện thoại không đúng định dạng',
            'address.required' => 'Bạn chưa nhập địa chỉ!',
        ];
    }
}

