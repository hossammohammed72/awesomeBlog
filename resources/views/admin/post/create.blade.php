@extends('layouts.dashboard')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="row">
      <!-- Post Content Column -->
      <div class="col-md-12">
        <h2 class="primary-color h1 font-weight-bold text-center">Add New Post</h2>
        @if(session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        <form class="px-sm-2 py-sm-4 px-md-5 py-md-5" id='postSubmit' enctype='multipart/form-data'>
         @csrf
          <div class="form-group">
            <label class="primary-color">Post Title</label>
            <input type="text" name='title' class="form-control" placeholder="Post Title" required>
          </div>
          <div class="form-group">
              <label for='category' class="primary-color">post categories</label>
            <input type='text' name='categories'  placeholder="Type categories here" class='form-control' id='categories'>
              
          </div>
          <div class="form-group">
            <label class="primary-color">Post Content</label>
            <textarea class="form-control" name='content' rows="7" required></textarea>
          </div>
          <div class="col-md-6">
              <div class="form-group">
                <label for="photosInput">Post Images</label>
                <div class="input-group" id='photos_input'>
                  <div class="custom-file">
                    <input type="file" name='photos[]' class="custom-file-input" id="photosInput">
                    <label class="custom-file-label" for="photos[]">upload the Post images</label>
                  </div>
                </div>
                <button id='add_more' class='btn btn-success'><i class='fa fa-plus'></i></button>

              </div>
            <input type="submit" class="btn btn-success btn-block" value="Add Post">
          
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@append
@section('scripts')
<script>
$.ajax({
    type: 'GET',
    url: "{{route('api.admins.categories.index')}}",
    success: function(categories) {
      categoriesData = {};
      for(var key in categories)
        categoriesData = categories[key];
      
      categoriesInput = $('#categories').magicSuggest({
        allowFreeEntries: false,
        data: categoriesData
      });
    },
  });
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  $('#postSubmit').submit(function(event){
    event.preventDefault()
  var data = $(this).serialize();
  $.ajax({
    type: 'POST',
    url: "{{route('admins.posts.store')}}",
    data: new FormData(this),
    processData: false,
    contentType: false,
    success: function(data) {
      if ((data.errors)) {
              if ((data.errors.title))  toastr.error(data.errors.title, 'Validation' , {timeOut: 3000});
              if ((data.errors.content))  toastr.error(data.errors.content, 'Validation' , {timeOut: 3000});
            	if ((data.errors.image))  toastr.error(data.errors.image, 'Validation' , {timeOut: 3000});
            	if ((data.errors.categories))  toastr.error(data.errors.categories, 'Validation' , {timeOut: 3000});

            } 
            else 
            {
                toastr.success('Post added Successfully!', 'Done', {timeOut: 3000});
            }
            console.log(data);
    },
  });
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  });
  $('#add_more').click(function(e){
        e.preventDefault();
        $('#photos_input').append(`
        <div class='input-group'\>
        <div class='custom-file'\>
                    <input type='file' name='photos[]' class='custom-file-input' \>
                  <label class="custom-file-label" for="photos[]">upload the attractions images</label>

                  </div\>
                  </div\>
                  `);
    });
</script>

@append