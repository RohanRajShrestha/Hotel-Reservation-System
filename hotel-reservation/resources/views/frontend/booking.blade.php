@extends('master')
@section('content')
<br>
    <img src="{{asset('admin/img/room6.jpg')}}" alt="" class="center" style="width:45%;height:20rem;">
<br>
    <div class="container-sm">
        <h5>Search For Rooms</h5>
        <hr>
        <div class="form-bar">
            {{ Form::open(array('url' => 'home/result', 'method' => 'GET')) }}
                <div class="column">
                    <label for="checkin">Check In</label>
                    {{ Form::date('checkin', null, ['class' => 'form-control', 'placeholder'=>'checkin date','id' => 'date', ]) }}
                    <label for="checkout">Check Out</label>
                    {{ Form::date('checkout', null, ['class' => 'form-control', 'placeholder'=>'checkout date','id' => 'date']) }}
                    <label for="location">Location</label>
                    <select id="location" name="location">
                        <option value="kathmandu">kathmandu</option>
                        <option value="pokhara">pokhara</option>
                    </select>  
                    <button class="button search-button" type="submit" style="vertical-align:middle"><span class="fa fa-search">  Search</span></button>
                </div>
            {{ Form::close() }}
        </div>
        <br>
        <h1 class="h1">Available Bookings</h1>
        
        <hr>
        <div class="card-container">
            <div class="row row-cols-1 row-cols-md-4 g-2 ">
                
                @foreach ($rooms as $room)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('roomimg/' . $room['room_image']) }}" class="card-img-top" alt="..." style="height: 40%;">
                            <div class="card-body">
                                <h5 class="card-title"><strong>{{$room['room_name']}}</strong></h5>
                                <p class="card-text">{{$room['description']}}</p>
                                <p class="card-text"><strong>Price : </strong>{{$room['price']}}</p>
                                <p class="card-text"><strong>Location : </strong>{{$room['location']}}</p>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-primary" href="/book/{{$room['id']}}">Book</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <br>
        <div class="d-flex justify-content-center">
            {{ $rooms->onEachSide(5)->links() }}
        </div>
    </div>
    
@endsection