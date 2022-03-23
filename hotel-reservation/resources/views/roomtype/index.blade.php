@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">RoomType List</h1>
    <a href="roomtype/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus"></i>Add New RoomType</a>
</div>
<div class="container mt-5">  
    <table class="table table-hover">
        <thead>
            <th scope="col">Room Id</th>
            <th scope="col">Room Name</th>
            <th scope="col">Room Image</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Location</th>
            <th scope="col">No. Of Adults</th>
            <th scope="col">Is Available</th>
            <th scope="col">status</th> 
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
        </thead> 
        <tbody>
            @foreach ($data as $roomtype)
            <tr>
                <td>{{$roomtype['id']}}</td>
                <td>{{$roomtype['room_name']}}</td>
                <td><img src="{{ asset('roomimg/' . $roomtype->room_image) }}" alt="" style="width: 10rem;height: 7rem;"></td>
                <td>{{$roomtype['description']}}</td>
                <td>{{$roomtype['price']}}</td>
                <td>{{$roomtype['location']}}</td>
                <td>{{$roomtype['number_adults']}}</td>
                <td>{{$roomtype['is_available']}}</td>
                <td>{{$roomtype['status']}}</td>
                <td><a href="/annapurnahotel/admin/roomtype/{{ $roomtype['id'] }}/edit" class="btn btn-primary">Edit</a></td>
                <td><button data-id="{{ $roomtype['id'] }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
                    Delete  
                </button></td>
                
                
                <td></td>
                <td></td>
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
        $(this).find('.delete-form').attr('action', '/annapurnahotel/admin/roomtype/' + id);
        console.log(id);
    });
</script>
@endsection
    