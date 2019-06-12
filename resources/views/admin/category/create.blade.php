@extends('layouts.dashboard')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title text-center">Add Category</h2>
    </div>
    <form id="createCategory" >
	@csrf
    <div class="card-body">
        <div class="row">
 	        <div class="col-md-6">
		        <div class="form-group">
	                <label for="exampleInputEmail1">Name</label>
	                <input type="text" class="form-control"  placeholder="Name" name="name">
	            </div>
	        </div>
	        <div class="col-md-6">
		        <div class="form-group">
		        	<label>Description</label>
	            	<textarea type="text" class="form-control"  placeholder="Description" name="description">
                    </textarea>
		        </div>
		    </div>
    	</div>
		
    </div>
    <div class="card-footer ">
            <button type="submit" class="btn btn-info">Submit</button>
            <div class='alert alert-primary col-md-4 pull-right'>
                    Add categories to your blog 
            </div>
    </div>
   
    </form>	
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(function () {
    $('.select2').select2()
})

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('#createCategory').submit(function(e){
    e.preventDefault();
    var data = $(this).serialize();
	console.log(data);
    $.ajax({
        type: 'POST',
        url: "{{route('admins.categories.store')}}",
        data: data,
        success: function(data,status) {
        	console.log("request sent");
            if ((data.errors)) {
            	if ((data.errors.name))  toastr.error(data.errors.name, 'Validation' , {timeOut: 3000});
            } 
            else 
            {
                toastr.success('Category added Successfully!', 'Done', {timeOut: 3000});
            }
        },
    });
});
</script>
@stop
