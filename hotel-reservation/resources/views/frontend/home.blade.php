@extends('master')
@section('content')
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
            <img src="{{asset('admin/img/hotel.webp')}}" class="d-block w-100 center" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{asset('admin/img/background2.jpg')}}" class="d-block w-100 center " alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000"> 
            <img src="{{asset('admin/img/hotel2.jpg')}}" class="d-block w-100 center" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
        </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
        </button>
    </div>
        <div style="clear: both;"></div>
        <p class="quote">“Hospitality is simply an opportunity to <br>show love and care”</p>
    
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
        @if (!$roomktm->isEmpty())
            <h1>Looking For a place in Kathmandu</h1>
            <hr>
            <div class="card-container">
                <div class="row row-cols-1 row-cols-md-4 g-2 ">
                    @foreach ($roomktm as $room)
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
        @endif
        <br>
        @if (!$roompkh->isEmpty())
            <h1>Looking For a place in Pokhara</h1>
            <hr>
            <div class="card-container">
                <div class="row row-cols-1 row-cols-md-4 g-2 ">
                    @foreach ($roompkh as $room)
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
        @endif
        
        {{-- <div class="container container-fluid">
        
            <div class="row row-cols-2 row-cols-md-2 g-4">
                @foreach ($roompkh as $room)
            
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
                            <button class="btn">Book</button>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
    
        </div> --}}
    </div>
    
        
@endsection