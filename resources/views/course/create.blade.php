@extends('../layouts/teamplade')
@section('content')
{{-- expr --}}

<div class="container">
	<div class="breadcrumbs">
		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li><a href="{{ route('course.index') }}">{{ trans('course/create.st_url') }}</a></li>
						<li class="active">[{{ trans('course/create.st_cCreate') }}]</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="col-sm-6">
			<div class="pull-right">
				<div style="margin-top: 6px" class="input-group">
					<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ URL::previous() }}">{{ trans('course/create.bt_back') }} <i class="fa fa-arrow-left"></i></a>	
				</div>
			</div>
		</div>
	</div>
	{{-- so sánh khoa có tồn tại chưa --}}
	<div style="visibility:hidden">
		<?php $pos=1 ?>
		@foreach ($department_all as $vi)
		<?php print $pos++ ?>
		@endforeach
	</div>
	<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('course/create.st_infoCreate') }}</h3>
	<hr>
	<table style="text-align: center;" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>{{ trans('course/create.st_dpName') }}</th>
				<th>{{ trans('course/create.st_degree') }}</th>
				<th>{{ trans('course/create.st_year') }}</th>
				<th>{{ trans('course/create.st_cCreate') }}</th>
			</tr>
		</thead>
		<tbody>
			{{-- đổ dữ liệu vào view --}}
			@foreach ($department_all as $departments)		
			<tr>

				<td>{!! $departments->department_name !!}</td>
				<td>{!! $departments->degree !!}</td>
				<td>{!! $departments->graduation_year !!}</td>
				{{-- xem  --}}
				<td><a  style="border-radius: 8px" href="{{ route('department.show',$departments->id) }}" class="btn btn-info">{{ trans('course/create.bt_create') }}</a>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{-- phân trang --}}
		<div style="text-align: center;" class="form-group">
			{!! $department_all->links() !!}
		</div>

		{{-- footer --}}

	</div>
	@endsection