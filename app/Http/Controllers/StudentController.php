<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreBlogStudent;
use App\Http\Requests\UpdateBlogStudent;
use App\Models\Student;
use App\Models\Risident;
use App\Models\Course;
use App\Models\Department;
use Session;

class StudentController extends Controller
{
    public function changeLanguage($language)
    {   
        Session::put('website_language', $language);
        if ($language=='vi') {
            $languaged='Việt Nam';
            Session::flash('ketqua', 'Đã thây đổi ngôn ngữ'. ' '. $languaged);
        }elseif($language=='en') {
            $languaged='English';
            Session::flash('ketqua', 'Changed language'. ' '. $languaged);
        }
        
        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->session()->put('search', $request
            ->has('search') ? $request->get('search') : ($request->session()
                ->has('search') ? $request->session()->get('search') : ''));

        $student_all = Student::where('full_name', 'like', '%' . $request->session()->get('search') . '%')->paginate(4);
        if ($request->ajax()) {
            
            return view('student.ajax', compact('student_all'));
        } else {

            return view('student.index', compact('student_all'));
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_name = Course::pluck('course_name', 'id');
        $deparments = Department::pluck('department_name', 'id')->all();

        return view('student.create', compact('course_name','deparments'));
    }

    public function showCourseInDepartment(Request $request)
    {
        if ($request->ajax()) {
            $courseAjax = Course::whereDepartmentId($request->department_id)->select('id', 'course_name')->get();

            return response()->json($courseAjax);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogStudent $request)
    {
        // nhận tên thời gian image và di chuyển hình vào thư mục hình ảnh
        $image = time(). '.'. $request['avatar']->getClientOriginalName();
        request()->avatar->move(public_path('hinhanh'), $image);
        // 
        $data = $request->all();
        $data['avatar'] = $image;
        // create Student
        $st_id = Student::create($data);
        // get student id
        $data['student_id'] = $st_id->id;
        // create member
        $member_id = Member::create($data);
        // create risident
        $risident_id = Risident::create($data);
        // create course
        $new_student = Student::findOrFail($st_id->id);
        $course_id = $request->input('course_name');
        $new_student->courses()->attach($course_id);
        //
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã tạo thành công thông tin sinh viên'. ' '. $data['full_name']);
        }else{
            Session::flash('ketqua', 'created student' . ' ' .  $data['full_name']);
        }
        
        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $student = Student::with('member', 'risident')->findOrFail($id);

        return view('student.show', compact('student', 'course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::pluck('course_name', 'id');
        $student_edit = Student::with('member', 'risident')->findOrFail($id);

        return view('student.edit', compact('student_edit', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogStudent $request, $id)
    {
        // 
        $data_student = Student::findOrFail($id);
        $data_rq = $request->all();
        if ($request['avatar'] == null) {
            $data_rq['avatar'] = $data_student->avatar;
        }else{
            $image = time(). '.'. $request['avatar']->getClientOriginalName();
            request()->avatar->move(public_path('hinhanh'), $image);
            $data_rq['avatar'] = $image;
        }
        $data_student->update($data_rq);
        // update member
        $data_student->member->update($data_rq);
        // update risident
        $data_student->risident->update($data_rq);
        // lớp lấy id lớp của sv để so sánh
        $compare_course = $data_student->courses()->get()->last();
        // nếu tên nhập vs tên đã có sẵn trùng nhâu thì không cần thêm trồng lên nhâu
        if ($compare_course->id == $request['course_name']) {      
        } else {
            $course_id = $request['course_name'];
            $data_student->courses()->attach($course_id);
        }
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã sửa thành công thông tin hồ sơ sinh viên'. ' '. $request['full_name']);
        }else{
            Session::flash('ketqua', 'Edited Student'. ' '. $request['full_name']);
        }

        return redirect()->route('student.show', [$data_student->id]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Student::findOrFail($id);
        $data->delete();
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã xóa sinh viên tên'.' '.$data->full_name);
        }else{
            Session::flash('ketqua', 'Deleted student'.' '.$data->full_name);
        }
        return redirect()->back();
    }
}
