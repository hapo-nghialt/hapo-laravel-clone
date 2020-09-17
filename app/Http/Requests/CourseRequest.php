<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|unique:courses',
            'price' => 'required|numeric',
            'image' => 'image',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên',
            'name.unique' => 'Tên khóa học đã có',
            'price.required' => 'Vui lòng nhập giá',
            'description.required' => 'Vui lòng nhập mô tả',
            'image.image' => 'Ảnh không đúng định dạng',
        ];
    }
}
