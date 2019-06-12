@extends('layouts.dashboard')

@section('content')
<div class="card card-default">
    <div class="card-header">
        <h2 class="card-title text-center">Posts</h2>
    </div>

    <div class="card-body">
        <table id="postsTable" class="table table-bordered table-striped" style="width:100%">
        <thead>
            <tr>
                <th class="text-center"> title </th>
                <th class="text-center"> Description </th>
                <th class="text-center"> # of posts </th>
                
                <th class="text-center"> Actions </th>
            </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
        <tr>
            <td class="text-center"> {{$post->title}} </td>
            <td class="text-center"> {{$post->description}} </td>
            <td class="text-center">{{$post->categories->count()}}</td>
            <td class="text-center">
                <a title="Edit" class="btn btn-info" href="{{route('admins.posts.edit',$post->id)}}">
                <i class="fa fa-edit"></i></a>
                <button title="Delete" class="deleteBtn btn btn-danger"  data-id="{{$post->id}}">
                <i class="fa fa-trash"></i></button>
            </td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th class="text-center"> Name </th>
                <th class="text-center"> Description </th>
                <th class="text-center"> # of Posts </th>
                <th class="text-center"> Actions </th>

            </tr>
        </tfoot>
      </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $('#postsTable').DataTable();
});

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$('.deleteBtn').click(function(){
    var id = $(this).data("id");
    console.log(id);
    var deleteRoute = '{{route('admins.posts.destroy','id')}}';
    deleteRoute = deleteRoute.replace('id',id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to restore this!",
        type: 'error',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                type: 'DELETE',
                url: deleteRoute,
                data: id,
                success: function() {
                    console.log("request sent");
                    Swal.fire(
                    'Deleted!',
                    'post has been deleted.',
                    'success'
                )
                },
                error:function(){
                    console.log("request sent");
                    Swal.fire(
                    'something went wrong',
                    'post couldn\'t be deleted.',
                    'danger'
                )
                },
            });
            setTimeout(function () { location.reload(true); }, 1300);
        }
    })  
});
</script>
@endsection