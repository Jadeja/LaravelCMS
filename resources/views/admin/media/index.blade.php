@extends("layouts.admin")



@section('content')

@if(Session::has('photo_deleted'))	
	<p class="bg-danger"> {{ session('photo_deleted') }}</p>
@endif
<form action="/admin/delete/media" method="post">
	
	{{csrf_field()}}
	{{method_field('delete')}}

		<div class="form-group">
		</div>
		<div class="form-group">
			<input type="submit" name="delete_all" class="btn-primary">
		</div>
@if(count($photos))	
		<table class="table">
		    <thead>
		      <tr>
		      	<th><input type="checkbox" id="chkall" class=""></th>
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
		          	<td><input type="checkbox" class="checkboxes" name="checkboxArray[]" value="{{ $c->id }}"></td>
		            <td>{{ $c->id}}</td>		           
		            <td><img height = "50" src="{{ $c->file }}" alt=""></td>
		            <td>{{ $c->created_at ? $c->created_at->diffForHumans() : 'nodate' }}</td>
		            <td>{{ $c->updated_at ? $c->updated_at->diffForHumans() : 'nodate' }}</td>
		            <td> 	

		<div class="form-group">
    	<input type="submit" name="{{ 'delete_single['.$c->id.']'  }}" value="Delete" class="btn btn-danger">
		</div>

					</td>            
		          </tr>  
		    @endforeach    
		    </tbody>
		</table>
	@endif	
</form>

@stop

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$("#chkall").click(function(){
			if(this.checked)
			{
				$(".checkboxes").each(function(){
					this.checked = true;
				});
			}
			else
			{
				$(".checkboxes").each(function(){
					this.checked = false;
				});
			}
		});
	});
</script>

@stop