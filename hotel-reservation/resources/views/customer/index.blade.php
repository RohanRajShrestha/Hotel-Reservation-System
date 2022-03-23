@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Customer List</h1>
    <a href="customer/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus"></i>Add New Customer</a>
</div>
<div class="container mt-5">  
    <table class="table table-hover">
        <thead>
            <th scope="col">Customer Id</th>
            <th scope="col">Customer Name</th>
            <th scope="col">Contact</th>
            <th scope="col">Address</th>
            <th scope="col">email</th>
            <th scope="col">citizenship</th>
            <th scope="col">status</th>
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
        </thead> 
        <tbody>
            @foreach ($data as $customer)
            <tr>
                <td>{{$customer['id']}}</td>
                <td>{{$customer['name']}}</td>
                <td>{{$customer['contact']}}</td>
                <td>{{$customer['address']}}</td>
                <td>{{$customer['email']}}</td>
                <td>{{$customer['citizenship']}}</td>
                <td>{{$customer['status']}}</td>
                <td><a href="/annapurnahotel/admin/customer/{{ $customer['id'] }}/edit" class="btn btn-primary">Edit</a></td>
                <td><button data-id="{{ $customer['id'] }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                    Delete  
                </button></td>
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
        $(this).find('.delete-form').attr('action', '/annapurnahotel/admin/customer/' + id);
        console.log(id);
    });
</script>
@endsection
