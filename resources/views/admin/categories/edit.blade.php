 @extends('layouts.admin')

@section('content')

<h1>Categories</h1>

	<div class="col-sm-6">

		{!! Form::model($category,['method' => 'PATCH','action' => ['AdminCategoriesController@update',$category->id]])!!}
			
			<div class="form-group">
				{!! Form::label('title','Name') !!}
				{!! Form::text('name',null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Update',['class' => 'btn btn-primary col-sm-6']) !!}
			</div>

		{!! Form::close() !!}

		{!! Form::model($category,['method' => 'DELETE','action' => ['AdminCategoriesController@destroy',$category->id]])!!}			

			<div class="form-group">
				{!! Form::submit('Delete Catgory',['class' => 'btn btn-danger col-sm-6']) !!}
			</div>

		{!! Form::close() !!}


	</div>

@stop