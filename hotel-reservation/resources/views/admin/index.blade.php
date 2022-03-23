@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin List</h1>
    <a href="/annapurnahotel/admin/admins/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus"></i>Add New Admin</a>
</div>
<div class="container mt-5">  
    <table class="table table-hover">
        <thead>
            <th scope="col">Admin Id</th>
            <th scope="col">Admin Name</th>
            <th scope="col">email</th>
            <th scope="col">status</th>
             
            @if (Auth::guard('admin')->user()->is_superadmin == 1)
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>  
            @endif
            
        </thead> 
        <tbody>
            @foreach ($data as $admin)
            <tr>
                <td>{{$admin['id']}}</td>
                <td>{{$admin['name']}}</td>
                <td>{{$admin['email']}}</td>
                <td>
                    @if ($admin['status']==0)
                    Deactivated
                @else
                    Activated
                @endif</td>
                @if (Auth::guard('admin')->user()->is_superadmin == 1)
                    <td><a href="/annapurnahotel/admin/admins/{{ $admin['id'] }}/edit" class="btn btn-primary">Edit</a></td>
                    <td><button data-id="{{ $admin['id'] }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                        Delete  
                    </button></td>
                 @endif
                
            </tr>
        @endforeach
        </tbody>
        <div class="d-flex justify-content-center">
            {{ $data->onEachSide(5)->links() }}
        </div>
    </table>
    <div class="d-flex justify-content-center">
        {{ $data->onEachSide(5)->links() }}
    </div>
</div>
@include('include.delete')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
    $('#deleteModal').on('show.bs.modal', function(e) {
        let selectedButton = $(e.relatedTarget);
        let id = selectedButton.data('id');
        $(this).find('.delete-form').attr('action', '/annapurnahotel/admin/admins/' + id);
        console.log(id);
    });
</script>
@endsection
