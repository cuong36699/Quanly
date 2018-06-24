@extends('../layouts/teamplade')
@section('content')
{{-- {!! Form::open(array('url' => 'student', 'method' => 'post','files'=>true,'enctype'=>'multipart/form-data')) !!} --}}
{!! Form::model($student_edit->id, array('route' => array('student.update', $student_edit->id), 'method' => 'put', 'files'=>true,'enctype' => 'multipart/form-data')) !!}
{{--  load hình ảnh --}}
<script type="text/javascript" src="{{ asset('js/loadimage.js') }}"></script>  
<div class="form-horizontal">
	<div class=" container">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('student/edit.student') }}</a></li>
							<li class="active">[{{ trans('student/edit.s_create') }}] [{{ $student_edit->full_name }}]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div style="margin-top: 6px" class="input-group">
						<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('student/edit.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		{{--  --}}

		<div class="col-md-6" style="background-color:white; border-radius: 8px;border-color :black;border-style: solid;border-width:1px;padding-left: 10px;padding-right: 10px" >	
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('student/edit.st_infostudent') }}</h3>
			<hr>
			{{-- thông tin sv --}}
			<div class="form-group row">
				{!! Form::label('', trans('student/edit.st_avatar'), ['class' => 'col-md-4 control-label fontchu']) !!}
				<div class="col-md-12 {{ $errors->has('avatar') ? 'has-error' : '' }}">
					<div class="col-md-7 row">
						{!! Form::file('avatar', array('class' => 'form-control file_name','onchange'=>'ShowPreview(this)')) !!}
						<span style="color:red" class="text">{{ $errors ->first('avatar') }}</span>
					</div>
					{{-- image load form --}}
					<div style="text-align:center;height:150px ;width: 150px;margin-left: 50px;border-radius: 8px;
					border-color:gray;border-style: solid;border-width:1px" class="col-md-4">
					<img id="impPrev" alt={{ trans('student/edit.st_avatarborder') }} class="img-rounded" width="150" height="148" src="{{ asset('hinhanh/'.$student_edit->avatar) }}">
				</div>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_fName'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-md-12 {{ $errors->has('full_name') ? 'has-error' : '' }}">
				{!! Form::text('full_name', $student_edit->full_name, ['class' => 'form-control']) !!}
				<span style="color: red" class="text">{{ $errors ->first('full_name') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_gender'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div style="font-size:20px;" class="col-sm-12 {{ $errors->has('gender') ? 'has-error' : '' }}">
                   		{!! Form::label('', trans('student/edit.st_male'), ['class' =>'control-label']) !!}
						{!! Form::radio('gender', '1', $student_edit->gender == 1 ? true : false, []) !!}
						{{--  --}}
						{!! Form::label('', trans('student/edit.st_female'), ['class' =>'control-label']) !!}
						{!! Form::radio('gender', '0', $student_edit->gender == 0 ? true : false, []) !!}
				<span style="color: red" class="text">{{ $errors ->first('gender') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_birthday'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('birthday') ? 'has-error' : '' }}">
				{!! Form::date('birthday', $student_edit->birthday, ['class' => 'form-control']) !!}
				<span style="color: red" class="text">{{ $errors ->first('birthday') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_identity'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('identity') ? 'has-error' : '' }}">
				{!! Form::text('identity', $student_edit->identity, ['class' => 'form-control']) !!}
				<span style="color: red" class="text">{{ $errors ->first('identity') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_phone'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('phone') ? 'has-error' : '' }}">
				{!! Form::text('phone', $student_edit->phone, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('phone') }}</span>
			</div>
		</div>

		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_email'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('email') ? 'has-error' : '' }}">
				<div class="input-group">
					{!! Form::text('email', $student_edit->email, ['class' => 'form-control','aria-describedby'=>'basic-addon2'])
					!!}
					<span class="input-group-addon" id="basic-addon2">@gmail.com</span>
				</div>
				<span style="color: red" class="text">{{ $errors ->first('email') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_homeTown'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('home_town') ? 'has-error' : '' }}">
				{!! Form::text('home_town', $student_edit->home_town, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('home_town') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_nation'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('nation') ? 'has-error' : '' }}">
				{!! Form::text('nation', $student_edit->nation, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('nation') }}</span>
			</div>
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_religion'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('religion') ? 'has-error' : '' }}">
				{!! Form::text('religion', $student_edit->religion, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('religion') }}</span>
			</div>
		</div>
		{{-- khoa --}}
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_department'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('deparment') ? 'has-error' : '' }}">

				{!! Form::label('', '', []) !!}
				<span style="color: red" class="text">{{ $errors ->first('deparment') }}</span>
			</div>
		</div>
		{{--  lớp --}}
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_course'), ['class'=>'col-md-5 control-label fontchu']) !!}
			<div class="col-sm-12 {{ $errors->has('course_name') ? 'has-error' : '' }}">
				{!! Form::select('course_name', $courses, $student_edit->courses , ['class'=>'form-control','id'=>'course']) !!}
				<span style="color: red" class="text">{{ $errors ->first('course_name') }}</span>
			</div>
		</div>
	</div>
	{{-- ngoại trú --}}
	<div class="col-md-6" style="background-color:white; border-radius: 8px;border-color :black;border-style: solid;border-width:1px;padding-left: 10px;padding-right: 10px" >
		@include('student.member.edit')
	</div>
	{{-- thường trú --}}
	<div class="col-md-6" style="background-color:white; border-radius: 8px;border-color :black;border-style: solid;border-width:1px;padding-left: 10px;padding-right: 10px" >
		@include('student.risident.edit')
	</div>
	{{-- button --}}
	<div style="float: right;" class="col-md-2">
		<div class="form-group row col-md-12">
			<button style="border-radius: 8px" class="btn btn-primary xacnhan" type="submit">Xác nhận <i class="fa fa-check"></i></button>
		</div>
	</div>
	<div style="float: right;" class="col-md-1-2">
		<div style="float:left;" class="form-group row col-md-12">
			<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">Trở lại <i class="fa fa-arrow-left"></i></a>	
		</div>
	</div> 
</div>
{!! Form::close() !!}
@endsection

