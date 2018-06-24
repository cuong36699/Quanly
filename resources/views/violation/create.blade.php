@extends('../layouts/teamplade')
@section('content')
<div class="form-horizontal">
	{!! Form::open(array('url' => 'violation', 'method' => 'post')) !!}
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('violation/create.st_index') }}</a></li>
							<li><a href="{{ route('student.show',$name_student->id) }}">{{ trans('violation/create.st_url') }}</a></li>
							<li class="active">[{{ trans('violation/create.st_vCreate') }}]</li>
						</ol>
					</div>
				</div>
			</div>
			{!! Form::hidden('idsv',$id_sv) !!}
			<div class="col-sm-6">
				<div class="pull-right">
					<div style="margin-top: 6px" class="input-group">
					<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('violation/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div style="border-color :gray;border-style: solid;border-width:1px;padding-left: 10px;padding-right: 10px" >
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('violation/create.bt_info') }}
				<p>[{{$name_student['full_name']}}]</p></h3>
				<hr>
				{{-- {{$id_sv}} --}}
				
				<div style="text-align: center;" class="form-group row">
					{!! Form::label('', trans('violation/create.bt_date'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-md-9 {{ $errors->has('date_violation') ? 'has-error' : '' }}">
						{!! Form::date('date_violation', '', ['class' => 'form-control']) !!}
						<span style="color:red" class="text">{{ $errors ->first('date_violation') }}</span>
					</div>
				</div>
				<div style="text-align: center;" class="form-group row">
					{!! Form::label('', trans('violation/create.bt_vform'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-md-9 {{ $errors->has('form_of_violation') ? 'has-error' : '' }}">
							{!! Form::textarea('form_of_violation','', ['class' => 'form-control ckeditor', 'placeholder' => 'Please input Content', 'rows' => '4']) !!}
						<span style="color:red" class="text">{{ $errors ->first('form_of_violation') }}</span>
					</div>
				</div>			
				<div style="text-align: center;" class="form-group row">
					{!! Form::label('', trans('violation/create.bt_discipline'), ['class' => 'col-md-3 control-label fontchu']) !!}
					<div class="col-md-9 {{ $errors->has('discipline') ? 'has-error' : '' }}">
						{!! Form::select('discipline', [
							''=>trans('violation/create.st_select'),
							'Khiển trách'=>'Khiển trách',
							'Kỷ luật'=>'Kỷ luật',
							'Đuổi học'=>'Đuổi học',
							'Phạt hành chính'=>'Phạt hành chính',
							],'',['class' => 'form-control']) !!}
							<span style="color:red" class="text">{{ $errors ->first('discipline') }}</span>
						</div>
					</div>
				</div>		
				<br>
					<div style="float: right;">
						<div class="col-md-3 col-md-offset-10">
						 <button class="btn btn-primary" style="border-radius: 8px" type="submit">{{ trans('violation/create.bt_create') }} <i class="fa fa-check"></i></button>
						</div>
					</div>
					<div style="float: right;">
						<div class="col-md-3 col-md-offset-10">
							<a style="border-radius: 8px;" class="btn btn-warning" href="{{ url('student',$id_sv) }}">{{ trans('violation/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>
						</div>
					</div>
			</div>
		</div>
		{!! Form::close() !!}
		@endsection