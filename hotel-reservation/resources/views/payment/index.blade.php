@extends('admin.master')
@section('content')
<div class="container mt-5">
    <h5>Find Booking Id?</h5>
    <form class="form-inline" action="{{route('payment.index')}}" method="GET" enctype="multipart/form-data">
        @csrf
        <div class="form-group col-4">
            <label for="email">Email : </label>
            <input type="text" name="email" class="form-control" id="email"> 
        </div>
        <div class="form-group col-4">
            <label for="number"> Number : </label>
            <input type="text" name="number" class="form-control" id="number">    
        </div>
        <button type="submit" name="form1" class="btn btn-primary">Find</button>
    </form>
    <br>
    <table class="table table-hover">
        <thead>
            <th scope="col">Payment Id</th>
            <th scope="col">Booking Id</th>
            <th scope="col">Payment type</th>
            <th scope="col">Amount</th>
            <th scope="col">status</th> 
            <th scope="col">Edit</th> 
            <th scope="col">Delete</th>
        </thead> 
        <tbody>
            @foreach ($data as $payment)
            <tr>
                <td>{{$payment['id']}}</td>
                <td>{{$payment['booking_id']}}</td>
                <td>{{$payment['paymenttype']}}</td>
                <td>{{$payment['price']}}</td>
                <td>{{$payment['status']}}</td>
                <td><a href="/annapurnahotel/admin/payment/{{ $payment['id'] }}/edit" class="btn btn-primary">Edit</a></td>
                <td><button data-id="{{ $payment['id'] }}" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
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
        $(this).find('.delete-form').attr('action', '/annapurnahotel/admin/payment/' + id);
        console.log(id);
    });
</script>
@endsection
