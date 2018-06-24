<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Course;
use App\Http\Requests\StoreBlogDepartment;
use App\Http\Requests\UpdateBlogDepartment;
use Session;
use Carbon;

class DepartmentController extends Controller
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
        $department_all = Department::where('department_name', 'like', '%' . $request->session()->get('search') . '%')->paginate(4);
        if ($request->ajax()) {
            return view('department.ajax', compact('department_all'));
        } else {
            return view('department.index', compact('department_all'));
        }         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $timestemp = today();
        $year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->year;

        return view('department/create', compact('year'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogDepartment $request)
    {
        $data = $request->all();
        $department_id= Department::create($data);
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Tạo mới khoa thành công'. ' '. $data['department_name']);
        }else{
            Session::flash('ketqua', 'Created department'. ' '. $data['department_name']);
        }
        

        return redirect()->route('department.show', $department_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $department_show = Department::findOrFail($id);
        $cdp = $department_show->courses()->paginate(4);
        
        return view('department/show', compact('department_show', 'cdp'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $department_edit = Department::findOrFail($id);
        $timestemp = today();
        $year = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $timestemp)->year;

        return view('department/edit', compact('department_edit','year'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogDepartment $request, $id)
    {
        $data_department = department::findOrFail($id);
        $data_rq = $request->all();
        $data_department->update($data_rq);
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Cập nhật thành công thông tin khoa'. ' '. $data_rq['department_name']);
        }else{
            Session::flash('ketqua', 'Edited department'. ' '. $data_rq['department_name']);
        }
    
        return redirect()->route('department.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Department::findOrFail($id);
        $data->delete();
        if (config('app.locale') == 'vi') {
            Session::flash('ketqua', 'Đã xóa Khoa'. ' '. $data->department_name);
        }else{
            Session::flash('ketqua', 'Deleted department'. ' '. $data->department_name);
        }
        

        return redirect()->route('department.index');
    }
}
