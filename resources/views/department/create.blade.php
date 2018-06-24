@extends('../layouts/teamplade')
@section('content')
{!! Form::open(array('url' => 'department', 'method' => 'post')) !!}
<div class="form-horizontal">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('department.index') }}">{{ trans('department/create.st_department') }}</a></li>
							<li class="active">[{{ trans('department/create.dp_create') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div style="margin-top: 6px" class="input-group">
					<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('department/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div style="border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('department/create.st_infoDepartment') }}</h3>
			<hr>
			<div class="form-group row" >
				{!! Form::label('', trans('department/create.st_dpName'), ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9 {{$errors->has('department_name') ? 'has-error' : '' }}" role="alert">
					{!! Form::select('department_name', [
						''=>trans('department/create.st_select'),
						'Công nghệ thông tin'=>'Công nghệ thông tin',
						'Thực phẩm'=>'Thực phẩm',
						'Điều dưỡng'=>'Điều dưỡng',
						'Ngôn ngữ anh'=>'Ngôn ngữ anh',
						'Điện'=>'Điện',
						'Quản trị kinh doanh'=>'Quản trị kinh doanh',
						'Kế toán'=>'Kế toán',
						'Kiến trúc'=>'Kiến trúc',
						'Tài chính – Ngân hàng'=>'Tài chính – Ngân hàng',
						],'',['class' => 'form-control']) !!}
						<span style="color: red" class="" class="text-danger">{{  $errors->first('department_name') }}</span>
					</div>
				</div>
				{{--  --}}
				<div class="form-group row">
					{!! Form::label('', trans('department/create.st_degree'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-sm-9 {{$errors->has('degree') ? 'has-error' : '' }}" role="alert">
						{!! Form::select('degree', [
							''=>trans('department/create.st_select'),
							'Đại học'=>'Đại học',
							'Cao đẳng'=>'Cao đẳng',
							'Trung cấp'=>'Trung cấp',
							'Thời vụ'=>'Thời vụ',
							],'',['class' => 'form-control']) !!}
							<span style="color: red" class="" class="text-danger">{{  $errors->first('degree') }}</span>
						</div>
					</div>
					{{--  --}}
					<hr>
					<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('department/create.st_infoYear')}}</h3>
					<br>
					<div class="form-group row">
						{!! Form::label('', trans('department/create.st_year'), ['class' => 'col-md-2 control-label fontchu']) !!}
						<div class="col-sm-10 {{$errors->has('graduation_year') ? 'has-error' : '' }}">
							{!! Form::selectYear('graduation_year', $year , $year-6 ,'',['class' => 'form-control']) !!}
							<span style="color: red" class="" class="text-danger">{{  $errors->first('graduation_year') }}</span>
						</div>
					</div>

				</div>
				{{-- button --}}
				<br>
				<div style="float: right;" class="col-md-2">
					<div class="form-group row col-md-12">
						<button style="border-radius: 8px" class="btn btn-primary" type="submit">{{ trans('department/create.bt_create')}} <i class="fa fa-check"></i></button>
					</div>
				</div>
				<div style="float: right;" class="col-md-1-2">
					<div style="float:left;" class="form-group row col-md-12">
						<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('department/create.bt_back')}} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>

		</div>

		{!! Form::close() !!}
		{{-- footer --}}
		@endsection