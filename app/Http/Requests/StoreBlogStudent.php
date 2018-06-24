<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogStudent extends FormRequest
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
            'avatar' => 'file|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|',
            'full_name' => 'required|max:100|min:10',
            'gender' => 'required',
            'birthday' => 'required|max:100|date',
            'phone' => 'required|numeric|max:99999999999|min:999999999',
            'email' => 'required|max:100|email|min:2',
            'home_town' => 'required|max:100|min:1',
            'nation' => 'required|max:100|min:1',
            'religion' => 'required|max:100|min:1',
            'identity' => 'required|numeric|max:999999999|min:99999999',
            'deparment' => 'required',
            'course_name' => 'required',
            // 
            'address' => 'required|max:100|min:1',
            'street' => 'required|max:100|min:1',
            'city' => 'required|max:100|min:1',
            'postal_code' => 'required|numeric|max:99|min:1',
            'home_phone' => 'required|numeric|max:99999999999|min:999999999',
        ];
    }

    public function messages()
    {
        if (config('app.locale') == 'vi') {
            return [
                // image
                'avatar.required' => 'vui lòng chọn hình ảnh',
                'avatar.image' => 'File được chọn không phải hình',
                'avatar.mimes' => 'File chọn phải là jpeg,png,jpg,gif,svg',
                'avatar.max' => 'Tên file không được quá 2048 ký tự',
                // tên sv
                'full_name.required' => 'Vui lòng nhập tên sinh viên',
                'full_name.min' => 'Tên sinh viên không được dưới 10 ký tự',
                'full_name.max' => 'Tên sinh viên không được quá 100 ký tự',
                // giới tính
                'gender.required' => 'Vui lòng nhập chọn giới tính',
                // ngaysinh
                'birthday.required' => 'Vui lòng chọn ngày sinh',
                'birthday.max' => 'Ngày sinh không đúng',
                'birthday.date' => 'vui lòng nhập lại ngày tháng năm cho chuẩn',
                // dien thoai
                'phone.required' => 'vui lòng nhập số điện thoại',
                'phone.max' => 'Số điện thoại không vượt quá 11 số',
                'phone.numeric' => 'Số điện thoại phải là số',
                'phone.min' => 'Số điện thoại ít nhất 10 số',
                // email
                'email.required' => 'Vui lòng nhập email',
                'email.min' => 'Email không được dưới 2 ký tự',
                'email.max' => 'Email không được vượt quá 100 ký tự',
                'email.email' => 'Phải là email',
                // nơi sinh
                'home_town.required' => 'Vui lòng nhập nơi sinh',
                'home_town.min' => 'Nơi sinh không được dưới 1 ký tự',
                'home_town.max' => 'Nơi sinh không được quá 100 ký tự',
                // dan toc
                'nation.required' => 'Vui lòng nhập thông tin dân tộc',
                'nation.min' => 'Thông tin dân tộc không được dưới 1 ký tự',
                'nation.max' => 'Thông tin dân tộc không được quá 100 ký tự',
                // ton giao
                'religion.required' => 'Vui lòng nhập Thông tin tôn giáo',
                'religion.min' => 'Thông tin tôn giáo không được dưới 1 ký tự',
                'religion.max' => 'Thông tin tôn giáo không được quá 100 ký tự',
                // Khoa
                'deparment.required' => 'Vui lòng chọn khoa',
                // lớp
                'course_name.required' => 'Vui lòng chọn lớp',
                // cmnd
                'identity.required' => 'vui lòng nhập số chứng minh thư',
                'identity.max' => 'số chứng minh thư không vượt quá 9 số',
                'identity.numeric' => 'số chứng minh thư phải là số',
                'identity.min' => 'số chứng minh thư ít nhất 9 số', 
                // địa chỉ
                'address.required' => 'Vui lòng nhập Địa chỉ',
                'address.min' => 'Địa chỉ không được dưới 1 ký tự',
                'address.max' => 'Địa chỉ không được quá 100 ký tự',
                // đường
                'street.required' => 'Vui lòng nhập Tên đường',
                'street.min' => 'Tên đường không được dưới 1 ký tự',
                'street.max' => 'Tên đường không được quá 100 ký tự',
                // thành phố
                'city.required' => 'Vui lòng nhập Tỉnh hoặc Thành phố',
                'city.min' => 'Tỉnh hoặc Thành phố không được dưới 1 ký tự',
                'city.max' => 'Tỉnh hoặc Thành phố không được quá 100 ký tự',
                // ma~ vung
                'postal_code.required' => 'vui lòng nhập Số mã vùng',
                'postal_code.max' => 'Số mã vùng không vượt quá 11 số',
                'postal_code.numeric' => 'Số mã vùng phải là số',
                'postal_code.min' => 'Số mã vùng ít nhất 10 số',
                // ma~ vung
                'home_phone.required' => 'vui lòng nhập Số điện thoại',
                'home_phone.max' => 'Số điện thoại không vượt quá 11 số',
                'home_phone.numeric' => 'Số điện thoại phải là số',
                'home_phone.min' => 'Số điện thoại ít nhất 10 số',
            ];
        }else{
            return [];
        }

    }
}
