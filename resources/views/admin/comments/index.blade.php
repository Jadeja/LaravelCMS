@extends("layouts.admin")


@section('content')

<h1> Admin Comments </h1>

	@if(count($comments))
	<table class="table">
		<thead>
			<th>Id</th>
			<th>Post</th>
			<th>Comment Reply</th>
			<th>Author</th>
			<th>Photo</th>
			<th>Status</th>
			<th>Email</th>
			<th>Body</th>
			<th>Delete</th>
		</thead>
	
		<tbody>
			@foreach($comments as $comment)
			<tr>
					<td>{{ $comment->id }}</td>
					<td><a href="{{ route('home.post',$comment->post->id) }}"> View Post </a></td>
					<td><a href="{{ route('replies.show',$comment->id) }}"> Comment Reply</a></td>
					<td>{{ $comment->author }}</td>
					<td><img height="50" src="{{ $comment->photo ? $comment->photo : 'http://placehold.it//200x200'}}" alt=""></td>
					
					<td>@if($comment->isActive == 1) 

				        {!! Form::open(['method' => 'PATCH','action' => ['PostCommentsController@update',$comment->id]])!!}
				            
				            <input type="hidden" value="0" name="isActive">
				            <div class="form-group">
				                {!! Form::submit('Deactivate',['class' => 'btn btn-warnning']) !!}
				            </div>

				        {!! Form::close() !!}
						
						@else 

				        {!! Form::open(['method' => 'PATCH','action' => ['PostCommentsController@update',$comment->id]])!!}
				            
				            <input type="hidden" value="1" name="isActive">
				            <div class="form-group">
				                {!! Form::submit('Activate',['class' => 'btn btn-success']) !!}
				            </div>

				        {!! Form::close() !!}						 

						@endif
					</td>
					
					<td>{{ $comment->email }}</td>
					<td>{{ str_limit($comment->body,30) }}</td>		
					<td>
				        {!! Form::open(['method' => 'DELETE','action' => ['PostCommentsController@destroy',$comment->id]])!!}
				            
				            <div class="form-group">
				                {!! Form::submit('Delete',['class' => 'btn btn-danger']) !!}
				            </div>

				        {!! Form::close() !!}

					</td>		
			</tr>
			@endforeach
		</tbody>
	
	</table>
	@else
	<h1>No Comments</h1>
	@endif
@stop