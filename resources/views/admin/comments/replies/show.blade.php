@extends("layouts.admin")


@section('content')


	@if(count($commentReplies))
	<h1> Comment Replies </h1>

	<table class="table">
		<thead>
			<th>Id</th>
			<th>Post</th>
			<th>Author</th>
			<th>Photo</th>
			<th>Status</th>
			<th>Email</th>
			<th>Body</th>
			<th>Created</th>
			<th>Updated</th>
			<th>Delete</th>
		</thead>
	
		<tbody>
			@foreach($commentReplies as $comment)
			<tr>
					<td>{{ $comment->id }}</td>
					<td><a href="{{ route('admin.comments.index') }}"> View Comments </a></td>
					<td>{{ $comment->author }}</td>
					<td><img height="50" src="{{ $comment->photo ? $comment->photo : 'http://placehold.it//200x200'}}" alt=""></td>
					
					<td>@if($comment->isActive == 1) 

				        {!! Form::open(['method' => 'PATCH','action' => ['PostCommentRepliesController@update',$comment->id]])!!}
				            
				            <input type="hidden" value="0" name="isActive">
				            <div class="form-group">
				                {!! Form::submit('Deactivate',['class' => 'btn btn-warnning']) !!}
				            </div>

				        {!! Form::close() !!}
						
						@else 

				        {!! Form::open(['method' => 'PATCH','action' => ['PostCommentRepliesController@update',$comment->id]])!!}
				            
				            <input type="hidden" value="1" name="isActive">
				            <div class="form-group">
				                {!! Form::submit('Activate',['class' => 'btn btn-success']) !!}
				            </div>

				        {!! Form::close() !!}						 

						@endif
					</td>
					
					<td>{{ $comment->email }}</td>
					<td>{{ str_limit($comment->body,30) }}</td>
					<td>{{ $comment->created_at->diffForHumans() }}</td>			
					<td>{{ $comment->updated_at->diffForHumans() }}</td>			
					<td>
				        {!! Form::open(['method' => 'DELETE','action' => ['PostCommentRepliesController@destroy',$comment->id]])!!}
				            
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