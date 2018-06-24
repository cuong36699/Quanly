<br>
		<h3 style="text-align: center;font-family:sans-serif;color: red">Thông Tin thường trú</h3>
		<hr>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_address'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-md-12 {{ $errors->has('address') ? 'has-error' : '' }}">
				{!! Form::text('address', $student_edit->risident->address, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('address') }}</span>
			</div>	
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_street'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-md-12 {{ $errors->has('street') ? 'has-error' : '' }}">
				{!! Form::text('street', $student_edit->risident->street, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('street') }}</span>
			</div>	
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_city'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-md-12 {{ $errors->has('city') ? 'has-error' : '' }}">
				{!! Form::text('city', $student_edit->risident->city, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('city') }}</span>
			</div>	
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_pcode'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-md-12 {{ $errors->has('postal_code') ? 'has-error' : '' }}">
				{!! Form::text('postal_code', $student_edit->risident->postal_code, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('postal_code') }}</span>
			</div>	
		</div>
		<div class="form-group row">
			{!! Form::label('', trans('student/edit.st_hphone'), ['class' => 'col-md-5 control-label fontchu']) !!}
			<div class="col-md-12 {{ $errors->has('home_phone') ? 'has-error' : '' }}">
				{!! Form::text('home_phone', $student_edit->risident->home_phone, ['class' => 'form-control'])
				!!}
				<span style="color: red" class="text">{{ $errors ->first('home_phone') }}</span>
			</div>	
		</div>
	</div>