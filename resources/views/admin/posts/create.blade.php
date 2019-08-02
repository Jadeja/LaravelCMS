@extends("layouts.admin")


@section("content")
	@include('include.tinyeditor')
<div class="row">

<h1>Create Posts</h1>

{!! Form::open(['method' => 'POST','action' => 'AdminPostsController@store','files' => true])!!}
	
	<div class="form-group">
		{!! Form::label('title','Title') !!}
		{!! Form::text('title',null,['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('category_id','Category') !!}
{!! Form::select('category_id',[''=>'Choose Category'] + $categories,null,['class'=>'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('photo_id','Photo') !!}
		{!! Form::file('photo_id',['class' => '']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('body','Decription') !!}
		{!! Form::textarea('body',null,['class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		{!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
	</div>

{!! Form::close() !!}

</div>

<div class="row">

	@include('include.form_error')

</div>
@stop