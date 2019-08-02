@extends("layouts.admin")


@section("content")



<h1>Posts</h1>

@if(Session::has('post_deleted'))

    <p calss="bg-danger">{{ session('post_deleted')}}</p>

@endif

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>        
        <th>Name</th>
        <th>Body</th>
        <th>Owner</th>
        <th>Category</th>
        <th>View Post</th>
        <th>View Comments</th>
        <th>Created</th>
        <th>Upadated</th>                        
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $u)
          <tr>
            <td>{{ $u->id}}</td>
           <td><img height="50" src="{{ $u->photo? $u->photo->file:'http://placehold.it/400x400'}}"></td>            
            <td><a href="{{route('admin.posts.edit',$u->id)}}">{{ $u->title}}</a></td>
            <td>{{ str_limit($u->body,10)}}</td>
            <td>{{ $u->user->name}}</td>
            <td>{{ $u->category ? $u->category->name : 'Not Available'}}</td>
            <td><a href="{{ route('home.post',$u->slug)}}" >View Post</a></td>
            <td><a href="{{ route('admin.comments.show',$u->id)}}" >View Comments</a></td>
            <td>{{ $u->created_at->diffForHumans() }}</td>
            <td>{{ $u->updated_at->diffForHumans() }}</td>            
          </tr>  
    @endforeach    
    </tbody>
</table>

<div class="row">
    <div class="col-sm-6 col-offset-5">
        {{ $posts->render()}}
    </div>
</div>
@stop