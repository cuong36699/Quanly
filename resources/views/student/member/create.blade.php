<br>
<h3 style="text-align: center;font-family:sans-serif;color: red">{{ trans('student/create.st_member') }}</h3>
<hr>
<div style="font-size:20px;" class="form-group row">
	{!! Form::label('', trans('student/create.st_union') , ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-sm-12">
		{!! Form::label('', trans('student/create.st_out'), ['class' =>'control-label']) !!}
		{!! Form::radio('union_member', '0', true, ['class'=>'union']) !!}
		{!! Form::label('', trans('student/create.st_in'), ['class' =>'control-label']) !!}
		{!! Form::radio('union_member', '1', false, ['class'=>'union']) !!}
	</div>
</div>

<div id="union_member">	
</div>

<div style="font-size:20px;" class="form-group row">
	{!! Form::label('', trans('student/create.st_adherer'), ['class' => 'col-md-5 control-label fontchu']) !!}
	<div class="col-sm-12">
		{!! Form::label('', trans('student/create.st_out'), ['class' =>'control-label']) !!}
		{!! Form::radio('adherer_member', '0', true, ['class'=>'adherer']) !!}
		{!! Form::label('', trans('student/create.st_in'), ['class' =>'control-label']) !!}
		{!! Form::radio('adherer_member', '1', false, ['class'=>'adherer']) !!}
	</div>
</div>

<div id="adherer_member">
</div>
