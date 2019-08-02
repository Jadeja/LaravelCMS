@extends("layouts.admin")



@section('content')

@if(Session::has('photo_deleted'))	
	<p class="bg-danger"> {{ session('photo_deleted') }}</p>
@endif

@if(count($photos))	
		<table class="table">
		    <thead>
		      <tr>
		        <th>Id</th>
		        <th>Name</th>
		        <th>Created</th>
		        <th>Upadated</th> 
		        <th></th>                       
		      </tr>
		    </thead>
		    <tbody>
		    @foreach($photos as $c)
		          <tr>

		            <td>{{ $c->id}}</td>		           
		            <td><img height = "50" src="{{ $c->file }}" alt=""></td>
		            <td>{{ $c->created_at ? $c->created_at->diffForHumans() : 'nodate' }}</td>
		            <td>{{ $c->updated_at ? $c->updated_at->diffForHumans() : 'nodate' }}</td>
		            <td> 
	{!! Form::open(['method' => 'DELETE','action' => ['AdminMediasController@destroy', $c->id]])!!}
		

		<div class="form-group">
			{!! Form::submit('Delete',['class' => 'btn btn-danger col-sm-6']) !!}
		</div>

	{!! Form::close() !!}
</td>            
		          </tr>  
		    @endforeach    
		    </tbody>
		</table>
	@endif	


@stop