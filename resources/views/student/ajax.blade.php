<div class="container">
	<div class="breadcrumbs">
		<div class="col-sm-6 row">
			<div class="page-header float-right">
				<div class="page-title">
					<ol class="breadcrumb text-right">
						<li class="active">[{{ trans('student/index.student') }}]</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="col-sm-6 row">
			<div class="pull-right">
				<div style="margin-top: 6px;margin-left: 10%" class="input-group" id="adv-search">
					<input type="hidden" id="xoa" name="xoa">
					<input type="text" class="form-control" id="search"
					value="{{ request()->session()->get('search') }}"
					onkeydown="if (event.keyCode == 13) ajaxLoad('{{url('student')}}?search='+this.value)"
					placeholder={{ trans('student/index.search') }} name="search"
					type="text" id="search"/>
					<div class="input-group-btn">
						<div class="btn-group" role="group">
							<div class="dropdown dropdown-lg">
								<button data-toggle="dropdown" type="submit" class="btn btn-warning dropdown-toggle"
								onclick="ajaxLoad('{{url('student')}}?search='+$('#xoa').val())">
								<i class="fa fa-arrow-left " aria-hidden="true"></i>
							</button>
							<button type="submit" class="btn btn-primary"
							onclick="ajaxLoad('{{url('student')}}?search='+$('#search').val())">
							<i class="fa fa-search" aria-hidden="true"></i>
						</button>
					</div>
				</div>
			</div>
		</div> 
	</div>
</div>
</div>
<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('student/index.data_student') }}</h3>
<hr>	
<table class="table table-striped table-bordered">
	<thead class="thead-dark">			
		<tr style="text-align: center;">
			<th>
				{{ trans('student/index.st_id') }} 
			</th>
			<th>
				{{ trans('student/index.st_img') }} 
			</th>
			<th>
				{{ trans('student/index.st_fname') }} 
			</th>
			<th>
				{{ trans('student/index.st_birthday') }} 
			</th>
			<th>
				{{ trans('student/index.st_gender') }} 
			</th>
			<th>
				{{ trans('student/index.st_homet') }} 
			</th>
			{{-- <th>content</th> --}}
			<th>
				{{ trans('student/index.st_action') }} 
			</th>
			<th>
				{{ trans('student/index.st_delete') }} 
			</th>
		</tr>
	</thead>
	<tbody style="text-align: center;">
		{{-- đổ dữ liệu vào view --}}
		@foreach ($student_all as $svs)		
		<tr>
			<td>{!! $svs->id !!}</td>
			<td>
				<a style="border-radius: 8px" value="{{ $svs->id }}" data-id="{{$svs->id}}" data-toggle="modal" href='#show-{{$svs->id}}'>	
					<img src="{{ asset('hinhanh/'.$svs->avatar) }}" class="img-rounded" width="100" height="100">
				</a> 
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="show-{{$svs->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div  class="modal-header">
								<h4  class="modal-title">[{{$svs->full_name}}]</h4>
							</div>
							<div class="modal-body">
								<img src="{{ asset('hinhanh/'.$svs->avatar) }}" class="img-rounded">
							</div>
							<div class="modal-footer">
								<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">trở lại <i class="fa fa-arrow-left"></i></button>
							</div>
						</div>
					</div>
				</div>
			</td>
			<td>{!! $svs->full_name !!}</td>
			<td>{!! $svs->birthday !!}</td>
			<td>
				@if ($svs['gender'] == 1)
				{{ trans('student/index.st_male') }} 
				@else
				{{ trans('student/index.st_female') }} 
				@endif 
			</td>
			<td>{!! $svs->home_town !!}</td>		
			{{-- xem  --}}
			<td>
				<div class="dropdown">
					<button style="border-radius: 8px;" class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{{ trans('student/index.st_action') }} 
					</button>
					<div style="text-align: center;" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="form-control" href="{{ route('student.show',$svs->id) }}">
							{{ trans('student/index.st_show') }}  
							<i class="fa fa-list"></i>
						</a>
						<a class="form-control" href="{{ route('student.edit',$svs->id) }}">
							{{ trans('student/index.st_edit') }}  
							<i class="fa fa-edit"></i>
						</a>
					</div>
				</div>

			</td>
			{{--  delete modal --}}
			<td>
				<a style="border-radius: 8px" value="{{ $svs->id }}" data-id="{{$svs->id}}" class="btn btn-danger" data-toggle="modal" href='#modal-{{$svs->id}}'>{{ trans('student/index.st_delete') }} <i class="fa fa-trash-o"></i></a> 

				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$svs->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">
									{{ trans('student/index.st_confirm') }}
								</h4>
							</div>
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="fontchu">
									{{ trans('student/index.st_contentConfirm') }} 
									<a style="color: red" href="{{ route('student.show',$svs->id) }}">
										[{{$svs->id}}]
									</a>
								</h4>
							</div>
							<div class="modal-footer">
								{!! Form::open(['method'=>'Delete','route'=>['student.destroy',$svs->id]]) !!}
								<button style="border-radius: 8px" class="btn btn-primary" type="submit">
									{{ trans('student/index.st_yes') }} 
									<i class="fa fa-check"></i>
								</button>
								{!! Form::close() !!}
								<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">
									{{ trans('student/index.st_cancel') }}
									<i class="fa fa-arrow-left"></i>
								</button>
							</div>
						</div>
					</div>
				</div>
				{{-- end button --}}
			</td>
		</tr>
		@endforeach{{-- endfor --}}

	</tbody>
</table>
<div style="text-align: center;" class="form-group">
	{{-- {!! $sinhvien_all->links() !!} --}}
	{{ $student_all->links() }}
</div>
</div>
