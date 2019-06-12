@extends('layouts.adminPanel')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title text-center">Edit {{$category->name}} Category </h2>
    </div>
    <form id="editCategory" >
	@csrf
    <div class="card-body">
        <div class="row">
 	        <div class="col-md-6">
		        <div class="form-group">
	                <label for="exampleInputEmail1">Name</label>
	                <input type="text" class="form-control"  placeholder="Name" name="name"
	                @if(isset($category))
					value="{{$category->name}}"
					@endif
					>
	            </div>
	        </div>
	        <div class="col-md-6">
		        <div class="form-group">
		        	<label>Description</label>
	            	<input type="text" class="form-control"  placeholder="Description" name="description"
            		@if(isset($category))
					value="{{$category->description}}"
					@endif
					>
		        </div>
		    </div>
    	</div>
		<div class="card-footer">
            <button type="submit" class="btn btn-info">Update</button>
        </div>
    </div>
    </form>	
</div>
@endsection
@section('scripts')

<script type="text/javascript">
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#editCategory').submit(function(e){
    e.preventDefault();
	//var data = new FormData(this);
	var data = $(this).serialize();
	console.log(data);
	var id = "{{$category->id}}";
    var editRoute = '{{route('admin.categories.update','id')}}';
    editRoute = editRoute.replace('id',id);

    $.ajax({
        type: 'put',
        url: editRoute,
        data: data,
        success: function(data,status) {
        	console.log("request sent");
            if ((data.errors)) {
            	if ((data.errors.name))  toastr.error(data.errors.name, 'Validation' , {timeOut: 3000});
            } 
            else 
            {
                toastr.success('Catgeory Updated Successfully!', 'Done', {timeOut: 3000});
            }
        },
    });
});
</script>
@stop
