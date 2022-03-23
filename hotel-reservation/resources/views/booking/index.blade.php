@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">booking List</h1>
    <a href="booking/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-plus"></i>Add New booking</a>
</div>
<div class="container mt-5">
    <form class="form-inline" action="{{route('booking.index')}}" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="form-group mx-sm-3 mb-2">
            <label for="sortby" class="sr-only">Sort</label>
            <select class="form-control" name="sortby" id="sortby">
                    <option value="room_id">Room Id</option>
                    <option value="customer_id">Customer Id</option>
                    <option value="checkin">Checkin Date</option>
                    <option value="checkout">Checkout Date</option>
                    <option value="status">Status</option>
            </select>
        </div>
        <button type="submit" name="form1" class="btn btn-primary">Sort</button>
    </form>
    <br>
    <h5>Search booking id by:</h5>
    <hr>
    <form class="form-inline" action="{{route('booking.index')}}" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-2">
            <label for="findby" class="sr-only">Find</label>
            <select class="form-control" name="findby" id="findby">
                    <option value="room_id">Room Id</option>
                    <option value="customer_id">Customer Id</option>
                    <option value="checkin">Checkin Date</option>
                    <option value="checkout">Checkout Date</option>
                    <option value="status">Status</option>
            </select>
        </div>
        <div class="form-group col-3">
            <label for="findby" class="sr-only">Find</label>
            <input type="text" name="value" class="form-control">
        </div>
        <button type="submit" name="form2" class="btn btn-primary">Find</button>
    </form>
    <table class="table table-hover">
        <thead>
            <th scope="col">Id</th>
            <th scope="col">Room Id</th>
            <th scope="col">Room No.</th>
            <th scope="col">User Id</th>
            <th scope="col">checkin</th>
            <th scope="col">checkout</th>
            <th scope="col">No. Of Adults</th>
            <th scope="col">status</th> 
            <th scope="col">Payment</th> 
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
        </thead> 
        <tbody>
            @foreach ($data as $booking)
            <tr>
                <td>{{$booking['id']}}</td>
                <td>{{$booking['room_id']}}</td>
                <td>{{$booking->getRoom->room_number}}</td>
                <td>{{$booking['user_id']}}</td>
                <td>{{$booking['checkin']}}</td>
                <td>{{$booking['checkout']}}</td>
                <td>{{$booking['number_adults']}}</td>
                <td>{{$booking['room_status']}}</td>
                <td>{{$booking->getPayments->status}}</td>
                <td><a href="/annapurnahotel/admin/booking/{{ $booking['id'] }}/edit" class="btn btn-primary">Edit</a></td>
                <td><button data-id="{{ $booking['id'] }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
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
        $(this).find('.delete-form').attr('action', '/annapurnahotel/admin/booking/' + id);
        console.log(id);
    });
</script>
@endsection
