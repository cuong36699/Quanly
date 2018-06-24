<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogViolation extends FormRequest
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
            'date_violation' => 'required|max:100|date',
            'form_of_violation' => 'required|min:1',
            'discipline' => 'required|min:1',
        ];
    }
    public function messages()
    {
        if (config('app.locale') == 'vi') {
            return [
                // ngay vi phạm
                'date_violation.required' => 'Vui lòng chọn Ngày vi phạm',
                'date_violation.max' => 'Ngày vi phạm không đúng',
                'date_violation.date' => 'vui lòng nhập lại ngày tháng năm cho chuẩn',
                // hình thức vi phạm
                'form_of_violation.required' => 'Vui lòng nhập Hình thức vi phạm',
                'form_of_violation.min' => 'Hình thức vi phạm không được dưới 1 ký tự',
                // phạt
                'discipline.required' => 'Vui lòng chọn Hình thức phạt',
                'discipline.min' => 'Hình thức phạt không được dưới 1 ký tự',
            ];
        }else{
            return [];
        }

    }
}
