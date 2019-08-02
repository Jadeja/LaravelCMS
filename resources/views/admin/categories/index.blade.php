@extends('layouts.admin')

@section('content')

<h1>Categort List</h1>

	<div class="col-sm-6">

		{!! Form::open(['method' => 'POST','action' => 'AdminCategoriesController@store'])!!}
			
			<div class="form-group">
				{!! Form::label('title','Name') !!}
				{!! Form::text('name',null,['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
			</div>

		{!! Form::close() !!}

	</div>

	<div class="col-sm-6">
	@if(count($categories))	
		<table class="table">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Name</th>
		        <th>Created</th>
		        <th>Upadated</th>                        
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($categories as $c)
		          <tr>

		            <td>{{ $c->id}}</td>		           
		            <td><a href="{{ route('admin.categories.edit',$c->id) }}">{{ $c->name}}</a></td>
		            <td>{{ $c->created_at ? $c->created_at->diffForHumans() : 'nodate' }}</td>
		            <td>{{ $c->updated_at ? $c->updated_at->diffForHumans() : 'nodate' }}</td>            
		          </tr>  
		    @endforeach    
		    </tbody>
		</table>
	@endif	

	</div>

@stop