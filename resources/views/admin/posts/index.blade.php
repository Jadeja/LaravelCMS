@extends("layouts.admin")


@section("content")

<h1>Posts</h1>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>        
        <th>Name</th>
        <th>Body</th>
        <th>Owner</th>
        <th>Category</th>
        <th>Created</th>
        <th>Upadated</th>                        
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $u)
          <tr>
            <td>{{ $u->id}}</td>
           <td><img height="50" src="{{ $u->photo? $u->photo->file:'http://placehold.it/400x400'}}"></td>            
            <td><a href="{{route('admin.users.edit',$u->id)}}">{{ $u->title}}</a></td>
            <td>{{ $u->body}}</td>
            <td>{{ $u->user->name}}</td>
            <td>{{ $u->category ? $u->category->name : 'Not Available'}}</td>
            <td>{{ $u->created_at->diffForHumans() }}</td>
            <td>{{ $u->updated_at->diffForHumans() }}</td>            
          </tr>  
    @endforeach    
    </tbody>
</table>

@stop