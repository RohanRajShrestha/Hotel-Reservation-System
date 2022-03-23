@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Room List</h1>
    <a href="room/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus"></i>Add New Room</a>
</div>
<div class="container mt-5">  
    <table class="table table-hover">
        <thead>
            <th scope="col">Room Id</th>
            <th scope="col">Room Type Id</th>
            <th scope="col">Room Image</th>
            <th scope="col">Room Number</th>
            <th scope="col">Description</th>
            <th scope="col">status</th> 
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
        </thead> 
        <tbody>
            @foreach ($data as $room)   
            <tr>
                <td>{{$room['id']}}</td>
                <td>{{$room['room_type_id']}}</td>
                <td><img src="{{ asset('roomimg/' . $room->Roomtype->room_image) }}" alt="" style="width: 10rem;height: 7rem;"></td>
                <td>{{$room['room_number']}}</td>
                <td>{{$room['description']}}</td>
                <td>{{$room['status']}}</td>
                <td><a href="/annapurnahotel/admin/room/{{ $room['id'] }}/edit" class="btn btn-primary">Edit</a></td>
                <td><button data-id="{{ $room['id'] }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
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
<script>
    $('#deleteModal').on('show.bs.modal', function(e) {
        let selectedButton = $(e.relatedTarget);
        let id = selectedButton.data('id');
        $(this).find('.delete-form').attr('action', '/annapurnahotel/admin/room/' + id);
        console.log(id);
    });
</script>

@endsection
    