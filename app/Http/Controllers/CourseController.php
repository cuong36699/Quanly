<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Http\Requests\StoreBlogCourse;
use App\Http\Requests\UpdateBlogCourse;
use App\Models\Student;
use Session;

class CourseController extends Controller
{
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
        $course_all = Course::where('course_name', 'like', '%' . $request->session()->get('search') . '%')->paginate(4);
        if ($request->ajax()) {
            return view('course/ajax', compact('course_all'));
        } else {
            return view('course/index', compact('course_all'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department_all = Department::paginate(4);

        return view('course\create', compact('department_all'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogCourse $request)
    {
        $department_data = Department::findOrFail($request['department_id']);
        if ($department_data) {
            $course_data = new Course;
            $course_data->course_name = $request['course_name'];
            $course_data->department_id = $request['department_id'];
            $department_data->courses()->save($course_data);
        }
        Session::flash('ketqua', 'Tạo lớp thành công'. ' '. $request['course_name']);

        return redirect()->route('course.show', $course_data->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lop_show = Course::findOrFail($id);
        $count = $lop_show->students()->where('course_id', $id)->count();
        $students = $lop_show->students()->where('course_id', $id)->get();       
        $tenkhoa = Course::with('department')->findOrFail($lop_show);
        $lop_show = Course::findOrFail($id);

        return view('course.show', compact('lop_show', 'tenkhoa', 'students', 'count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lop_edit = Course::findOrFail($id);

        return view('course.edit', compact('lop_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogCourse $request, $id)
    {
        $data = Course::findOrFail($id);
        $request = $request->all();// lấy hết giá trị từ view
        $data->course_name = $request['course_name'];
        $data->save();
        Session::flash('ketqua', 'Cập nhật thành công thông tin lớp!');

        return redirect()->route('course.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Course::findOrFail($id);
        $data->delete();
        Session::flash('ketqua', 'Đã xóa Lớp'.' '.$data->Course_name);

        return redirect()->route('course.index');
    }
}
