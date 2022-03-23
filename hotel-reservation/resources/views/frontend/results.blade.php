@extends('master')
@section('content')
<img src="{{asset('admin/img/result.webp')}}" alt="" class="center" style="width:45%;height:20rem;">
<div class="container-sm">
    <div class="card-container">
        <br>
        <h1 class="h1">Available Bookings</h1>
        <hr>
        <div class="row row-cols-1 row-cols-md-4 g-2 ">
            @foreach ($roomtypes as $roomtype)
                @foreach ($roomtype as $room)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('roomimg/' . $room->room_image) }}" class="card-img-top" alt="..." style="height: 40%;">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{$room->room_name}}</strong></h5>
                                <p class="card-text">{{$room->description}}</p>
                                <p class="card-text"><strong>Price : </strong>{{$room->price}}</p>
                                <p class="card-text"><strong>Location : </strong>{{$room->location}}</p>
                            </div>
                            <div class="card-footer">
                                <td><a href="/home/results/{{ $room->id }}/book" class="btn btn-primary">Book</a></td>
                            </div>
                        </div>
                    </div>
                @endforeach 
            @endforeach
        </div>
    </div>
</div>
@endsection