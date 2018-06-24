@extends('../layouts/teamplade')
@section('content')	
{{-- expr --}}
<div class="form-horizontal">
	<div class="container">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('student.index') }}">{{ trans('student/show.student') }}</a></li>
							<li class="active">[{{ trans('student/show.look') }}][{{$student->full_name}}]</li>
						</ol>
					</div>	
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div style="margin-top: 6px" class="input-group">
						<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">
							{{ trans('student/show.back_button') }}<i class="fa fa-arrow-left"></i></a>	
						</div>
					</div>
				</div>
			</div>
		</div>
		{{-- right --}}
		<div class="containe col-md-6">
			<div style="background-color: white;border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
				<br>
				<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('student/show.st_info') }}
					<p>[{{$student->full_name}}]</p>
				</h3>
				<hr>
				<div style="text-align: center;">
					<a style="background-color: white" class="btn btn-primary" data-toggle="modal" href='#modal-id'>
						<img src="{{ asset('hinhanh/'.$student->avatar) }}" class="img-rounded" width="200" height="200">
					</a>
					<div class="modal fade" id="modal-id">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">[{{ $student->full_name }}]</h4>
								</div>
								<div class="modal-body">
									<img src="{{ asset('hinhanh/'.$student->avatar) }}" class="img-rounded">
								</div>
								<div class="modal-footer">
									<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">
										{{ trans('student/show.back_button') }}
										<i class="fa fa-arrow-left"></i>
									</button>
								</div>
							</div>
						</div>
					</div>	
				</div>
				<hr>
				<div class="form-group row">
					<div class="col-md-12 fontchu">				
						{!! Form::label('', trans('student/show.idst'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->id, ['class'=>'control-label']) !!}
					</div>	
				</div>
				<div class="form-group row ">
					<div  class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_name'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->full_name, ['class'=>'control-label']) !!}
					</div>	
				</div>
				<div class="form-group row ">
					<div class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_gender'), ['class'=>'col-md-5 control-label']) !!}
						@if ($student['gender'] == 1)
						{{ trans('student/show.st_boy') }}
						@else
						{{ trans('student/show.st_girl') }}
						@endif 	
					</div>	
				</div>
				<div class="form-group row ">
					<div  class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_idc'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->identity, ['class'=>'control-label']) !!}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_birthday'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->birthday, ['class'=>'control-label']) !!}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_home_town'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->home_town, ['class'=>'control-label']) !!}
					</div>	
				</div>
				<div class="form-group row">
					<div class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_nation'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->nation, ['class'=>'control-label']) !!}
					</div>	
				</div>
				<div class="form-group row">
					<div class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_religion'), ['class'=>'col-md-5 control-label']) !!}
						{!! Form::label('', $student->religion, ['class'=>'control-label']) !!}
					</div>	
				</div>
				{{-- lớp --}}
				<div class="form-group row">
					<div class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_class'), ['class'=>'col-md-5 control-label']) !!}
						@foreach ($student->courses as $class)
						@if ($loop->last)
						<a style="color: blue" href="{{ route('course.show',$class->id) }}">
							[{{$class->course_name}}]
						</a>
						@else
						@endif
						@endforeach
					</div>	
				</div>
				{{-- khoa --}}
				<div class="form-group row">
					<div  class="col-md-12 fontchu">
						{!! Form::label('', trans('student/show.st_department'), ['class'=>'col-md-5 control-label']) !!}
						<a style="color: blue" href="{{ route('department.show',$class->department->id) }}">
							[{{$class->department->department_name}}]
						</a>
					</div>	
				</div>
				<hr>
				{{-- button cập nhật --}}
				<div class="form-group row">
					<div style="text-align: center;" class="col-md-12">
						<a href="{{ route('student.edit',$student->id) }}" style="border-radius:8px;" class="btn btn-warning">{{ trans('student/show.edit_st') }} <i class="fa fa-edit"></i></a>
						<a href="{{ url('violation/create',$student->id) }}" style="border-radius:8px;" class="btn btn-warning">{{ trans('student/show.create_vi') }} <i class="fa fa-check-square-o"></i></a>
						<a href="{{ route('violation.show',$student->id) }}" style="border-radius:8px;" class="btn btn-info">{{ trans('student/show.show_vi') }} <i class="fa fa-list"></i></a>
					</div>
				</div>
			</div>
		</div>
		{{-- left --}}
		<div style="" class="containe col-md-6">
			<div style="background-color: white;border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
				<br>
				<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('student/show.st_detail') }}
					<p>[{{$student->full_name}}]</p>
				</h3>
				<hr>
				<div class="form-group row">
					<h5 style="float: left;font-family:sans-serif;color: red">{{ trans('student/show.st_member') }}
					</h5>
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_union'), ['class'=>'col-md-5 control-label']) !!}
						@if ($student->member['union_member'] == 1)
						{{ trans('student/show.st_in') }}
						@else
						{{ trans('student/show.st_out') }}
						@endif 
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_date_union'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->member->date_union_member}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_adherer'), ['class'=>'col-md-5 control-label']) !!}
						@if ($student->member['adherer_member'] == 1)
						{{ trans('student/show.st_in') }}
						@else
						{{ trans('student/show.st_out') }}
						@endif
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_date_adherer'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->member->date_adherer_member}}
					</div>	
				</div>
				{{-- thường trú --}}
				<hr>
				<div class="form-group row">
					<h5 style="float: left;font-family:sans-serif;color: red">{{ trans('student/show.info_risident') }}
					</h5>
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_address'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->risident->address}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_street'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->risident->street}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_city'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->risident->city}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_pcode'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->risident->postal_code}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_hphone'), ['class'=>'col-md-5 control-label']) !!}
						{{$student->risident->home_phone}}
					</div>	
				</div>
				{{-- Thông tin lớp khoa--}}
				<hr>
				<div class="form-group row">
					<h5 style="float: left;font-family:sans-serif;color: red">{{ trans('student/show.info_course') }}
					</h5>
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_class'), ['class'=>'col-md-5 control-label']) !!}
						{{$class->course_name}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_department'), ['class'=>'col-md-5 control-label']) !!}
						{{$class->department->department_name}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_degree'), ['class'=>'col-md-5 control-label']) !!}
						{{$class->department->degree}}
					</div>	
				</div>
				<div class="form-group row">
					<div  class="col-md-12">
						{!! Form::label('', trans('student/show.st_graduationyear'), ['class'=>'col-md-5 control-label']) !!}
						{{$class->department->graduation_year}}
					</div>	
				</div>
			</div>
		</div>
	</div>
	@endsection