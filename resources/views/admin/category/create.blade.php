@extends('layouts.dashboard')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title text-center">Add Category</h2>
    </div>
    <form id="createCategory" enctype="multipart/form-data" >
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
            <div class="col-md-6">
                    <div class="form-group">
                      <label for="photosInput">category Images</label>
                      <div class="input-group" id='photos_input'>
                        <div class="custom-file">
                          <input type="file" name='photo' class="custom-file-input" id="photosInput">
                          <label class="custom-file-label" for="photos">upload the category image</label>
                        </div>
                      </div>
                    </div>
                </div>
    	</div>
		
    </div>
    <div class="card-footer ">
            <button type="submit" class="btn btn-success">Add Category</button>
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
    var data = new FormData(this);
	console.log(data);
    $.ajax({
        type: 'POST',
        url: "{{route('admins.categories.store')}}",
        data: data,
        processData: false,
        contentType: false,
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
