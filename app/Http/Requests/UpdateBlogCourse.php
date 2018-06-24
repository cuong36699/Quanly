<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogCourse extends FormRequest
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
            'course_name' => 'required|max:150|min:1',
        ];
    }
    public function messages()
    {
        if (config('app.locale') == 'vi') {
            return [
                // tên Khoa
                'course_name.required' => 'Vui lòng nhập Tên lớp',
                'course_name.min' => 'Tên lớp không được dưới 1 ký tự',
                'course_name.max' => 'Tên lớp không được quá 150 ký tự',
            ];
        }else{
            return [];
        }

    }
}
