@extends("layouts.admin")


@section("content")

<h1>Edit Posts</h1>

<div class="row">

	<div class="col-sm-3">
		<img height="100" src="{{ $post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt="">
	</div>
	
	<div class="col-sm-6">

	{!! Form::model($post,['method' => 'PATCH','action' => ['AdminPostsController@update',$post->id],'files' => true])!!}
		
		<div class="form-group">
			{!! Form::label('title','Title') !!}
			{!! Form::text('title',null,['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('category_id','Category') !!}
	{!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
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
			{!! Form::submit('Update',['class' => 'btn btn-primary col-sm-6']) !!}
		</div>

	{!! Form::close() !!}


	{!! Form::model($post,['method' => 'DELETE','action' => ['AdminPostsController@destroy',$post->id],'files' => true])!!}

		<div class="form-group">
			{!! Form::submit('Delete',['class' => 'btn btn-danger col-sm-6']) !!}
		</div>

	{!! Form::close() !!}

	</div>

</div>

<div class="row">

	@include('include.form_error')

</div>

@stop