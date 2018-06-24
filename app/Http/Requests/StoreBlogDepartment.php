<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogDepartment extends FormRequest
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
            'department_name' => 'required|max:150|min:1',
            'degree' => 'required|max:150|min:1',
            'graduation_year' => 'required|numeric|max:10000|min:1',
        ];
    }
    public function messages()
    {
        if (config('app.locale') == 'vi') {
            return [
                // tên Khoa
                'department_name.required' => 'Vui lòng chọn Tên khoa',
                'department_name.min' => 'Tên khoa không được dưới 1 ký tự',
                'department_name.max' => 'Tên khoa không được quá 150 ký tự',
                // Bậc học
                'degree.required' => 'Vui lòng chọn Bậc học',
                'degree.min' => 'Bậc học không được dưới 1 ký tự',
                'degree.max' => 'Bậc học không được quá 150 ký tự',
                // Bậc học
                'graduation_year.required' => 'Vui lòng chọn Năm học',
                'graduation_year.min' => 'Năm học không được dưới 1 ký tự',
                'graduation_year.max' => 'Năm học không được quá 100 ký tự',
                'graduation_year.numeric' => 'Năm học phải là số',
            ];
        }else{
            return [];
        }

    }
}
