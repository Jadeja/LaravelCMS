@extends("layouts.admin")
@section("content")

@if(Session::has('deleted_user'))
    
    <p class="bg-danger">{{ session('deleted_user')}}</p>
    
@endif

<h2>User List</h2>

<table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>        
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Upadated</th>                        
      </tr>
    </thead>
    <tbody>
    @foreach($users as $u)
          <tr>
            <td>{{ $u->id}}</td>
    <td><img height="50" src="{{ $u->photo ? $u->photo->file : 'http://placehold.it/200x200' }}" alt=""></td>
            <td><a href="{{route('admin.users.edit',$u->id)}}">{{ $u->name}}</a></td>
            <td>{{ $u->email}}</td>
            <td>{{ $u->role->name}}</td>
            <td>{{ $u->isActive == 1 ? 'Active' : 'Not Active' }}</td>
            <td>{{ $u->created_at->diffForHumans()}}</td>
            <td>{{ $u->updated_at->diffForHumans() }}</td>            
          </tr>  
    @endforeach    
    </tbody>
</table>
@stop