@extends('../layouts/teamplade')
@section('content')	
{{-- expr --}}
<div class="form-horizontal">
	<div class="container col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('course.index') }}">{{ trans('course/show.st_url') }}</a></li>
							<li class="active">[{{ trans('course/show.st_c') }}]</li>
						</ol>
					</div>	
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div style="margin-top: 6px" class="input-group">
						<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('course/show.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div style="border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('course/show.st_infoCourse') }} <p>[{{$lop_show->course_name}}]</p> </h3>
			<hr>
			<div class="form-group row">
				<div class="col-md-12">	
					{!! Form::label('', trans('course/show.st_id'), ['class'=>'col-md-5 control-label fontchu']) !!}
					<label class="fontchitiet">[{{$lop_show->id}}]</label>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">	
					{!! Form::label('', trans('course/show.st_dpName'), ['class'=>'col-md-5 control-label fontchu']) !!}
					<a style="color: blue" class="fontchitiet" href="{{ route('department.show',$lop_show->department->id) }}">[{{$lop_show->department->department_name}}]</a>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-12">				
					{!! Form::label('', trans('course/show.st_cName'), ['class'=>'col-md-5 control-label fontchu']) !!}
					{!! Form::label('', $lop_show->course_name, ['class'=>'control-label fontchitiet']) !!}	
				</div>	
			</div>
			<div class="form-group row">
				<div class="col-md-12">	
					{!! Form::label('', trans('course/show.st_count'), ['class'=>'col-md-5 control-label fontchu']) !!}
					<a class="fontchitiet">{{ trans('course/show.st_scount') }} {{ $count }}</a>
				</div>
			</div>
			<hr>
			<div style="text-align: center;">
				{!! Form::label('', trans('course/show.st_list'), ['class'=>'col-md-6 control-label fontchu','style'=>'color:red']) !!}
			</div>
			<div style="border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
				<div class="form-group row">
					@foreach ($students as $sv)
					<div class="col-md-10">
						<?php $slsv=2 ?>
						<br>
						<p class="fontchu">
							<a style="color: blue" href="{{ route('student.show',$sv->id) }}">{{ trans('course/show.st_name') }} {{$sv->full_name}}
								<c>
									[{{ trans('course/show.st_ids') }}{{$sv->id}}]
								</c>
							</a>
							<p>
								{{ trans('course/show.st_birthday') }} {{$sv->birthday}}
							</p>
							<p>
								{{ trans('course/show.st_gender') }} 
								@if ($sv['gender'] == 1)
								{{ trans('course/show.st_boy') }} 
								@else
								{{ trans('course/show.st_girl') }} 
								@endif  
							</p>
							<p>
								{{ trans('course/show.st_phone') }} {{$sv->phone}}
							</p>
							<p>
								{{ trans('course/show.st_hometown') }} {{$sv->home_town}}
							</p>
							
						</p>
						<hr>						
					</div>
					<div class="col-md-2">
						<div style="text-align:center;height:150px;width:150px;margin-top: 30px;border-radius: 8px;
						border-color:gray;border-style:solid;border-width:1px;">
						<a href="{{ route('student.show',$sv->id) }}">
							<img src="{{ asset('hinhanh/'.$sv->avatar) }}" id="impPrev" alt="--Ảnh đại diện--" class="img-rounded" alt="" width="149" height="148">
						</a>
					</div>	
				</div>
				@endforeach							
			</div>	
		</div>
		<br>
	</div>	
</div>
@endsection