<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditCatalogRequest extends FormRequest
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
            'parent_id'=>'required'

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên của danh mục!',
            'parent_id.required' => 'Vui lòng lựa chọn danh mục cha!'
        ];
    }
}
