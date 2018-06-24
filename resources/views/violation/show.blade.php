@extends('../layouts/teamplade')
@section('content')	
<div class="form-horizontal">
	<div class="containe col-md-12">
		<div class="breadcrumbs">
			<div class="col-sm-6 row">
				<div class="page-header float-right">
					<div class="page-title">
						<ol class="breadcrumb text-right">
							<li><a href="{{ route('department.index') }}">Khoa</a></li>
							<li><a href="{{ route('course.index') }}">Lớp</a></li>
							<li><a href="{{ route('student.index') }}">Sinh viên</a></li>
							<li class="active">[Xem vi phạm]</li>
						</ol>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-right">
					<div style="margin-top: 6px" class="input-group">
					<a style="color:black;border-radius:8px" class="btn btn-warning" href="{{ route('student.show',$sinhvien->id)}}"">Trở lại <i class="fa fa-arrow-left"></i></a>	
					</div>
				</div>
			</div>
		</div>
		<div style="border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
			<br>
			<h3 style="text-align: center;font-family:sans-serif;color: red">Hồ Sơ vi phạm của sinh viên <p>[{{$sinhvien->full_name}}]</p></h3>
			<hr>
			<?php $pos=1 ?>
			@foreach ($vipham as $vp)
			<h3 style="text-align: center;font-family:sans-serif;color: red">
				@if($loop->last)
				Vi phạm lần [cuối] 
				<a style="border-radius: 8px;" class="btn btn-warning" href="{{route('violation.edit',$vp->id) }}">sửa</a>
				
				<a style="border-radius: 8px" value="{{ $vp->id }}" data-id="{{$vp->id}}" class="btn btn-danger" data-toggle="modal" href='#modal-{{$vp->id}}'>Xóa</a> 
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$vp->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="fontchu">Bạn có muốn xóa dữ liệu vi phạm có ID 
									[{{$vp->id}}]
								</h4>
							</div>	
							<div class="modal-footer">
								{!! Form::open(['method'=>'Delete','route'=>['violation.destroy',$vp->id]]) !!}
								{!! Form::submit('Xác nhận',['class'=>'btn btn-primary','style'=>'border-radius: 8px']) !!}
								{!! Form::close() !!}
								<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">trở lại</button>
							</div>
						</div>
					</div>
				</div>
				@elseif($loop->first)
				Vi phạm lần [đầu]
				<a style="border-radius: 8px;" class="btn btn-warning" href="{{ route('violation.edit',$vp->id) }}">sửa</a>
				<a style="border-radius: 8px" value="{{ $vp->id }}" data-id="{{$vp->id}}" class="btn btn-danger" data-toggle="modal" href='#modal-{{$vp->id}}'>Xóa</a> 
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$vp->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="fontchu">Bạn có muốn xóa dữ liệu vi phạm có ID 
									[{{$vp->id}}]
								</h4>
							</div>	
							<div class="modal-footer">
								{!! Form::open(['method'=>'Delete','route'=>['violation.destroy',$vp->id]]) !!}
								{!! Form::submit('Xác nhận',['class'=>'btn btn-primary','style'=>'border-radius: 8px']) !!}
								{!! Form::close() !!}
								<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">trở lại</button>
							</div>
						</div>
					</div>
				</div>
				@else
				Vi phạm lần [{{$pos++}}]
				<a style="border-radius: 8px;" class="btn btn-warning" href="{{ route('violation.edit',$vp->id) }}">sửa</a>
				<a style="border-radius: 8px" value="{{ $vp->id }}" data-id="{{$vp->id}}" class="btn btn-danger" data-toggle="modal" href='#modal-{{$vp->id}}'>Xóa</a> 
				<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"  id="modal-{{$vp->id}}" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title">Modal title</h4>
							</div>
							<div class="modal-body">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="fontchu">Bạn có muốn xóa dữ liệu vi phạm có ID 
									[{{$vp->id}}]
								</h4>
							</div>	
							<div class="modal-footer">
								{!! Form::open(['method'=>'Delete','route'=>['violation.destroy',$vp->id]]) !!}
								{!! Form::submit('Xác nhận',['class'=>'btn btn-primary','style'=>'border-radius: 8px']) !!}
								{!! Form::close() !!}
								<button style="border-radius: 8px" type="button" class="btn btn-warning" data-dismiss="modal">trở lại</button>
							</div>
						</div>
					</div>
				</div>
				@endif
			</h3>
			<br>
			<div class="form-group row">
				{!! Form::label('', 'Hình thức vị phạm:', ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					<div style="border-radius: 8px;border-color :gray;border-style: solid;border-width:1px;padding-left:10px;padding-right: 10px" >
						
						{!! $vp->form_of_violation !!}
						
					</div>
				</div>	
			</div>
			<div class="form-group row">
				{!! Form::label('', 'Ngày vi phạm:', ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					{!! Form::label('ngayvipham',$vp->date_violation, ['class' => 'form-control'])
					!!}
				</div>	
			</div>
			<div class="form-group row">
				{!! Form::label('', 'Loại hình kỷ luật:', ['class' => 'col-md-3 control-label fontchu']) !!}
				<div class="col-sm-9">
					{!! Form::label('loaikiluat', $vp->discipline, ['class' => 'form-control'])
					!!}
				</div>	
			</div>
			<hr>
			@endforeach		
		</div>
		<br>
		<div style="float: right;">
			<div class="col-md-3 col-md-offset-10">
				<a style="border-radius: 8px;" class="btn btn-warning" href="{{ route('student.show',$sinhvien->id) }}">Trở lại <i class="fa fa-arrow-left"></i></a>
			</div>
		</div>
	</div>
</div>
@endsection