@extends('master')
@section('content')
    <div class="container-sm">
        <div class="row">
            <div class="col-4">
                <img src="{{ asset('admin/img/profile.jpg') }}" alt="" style="width: 100%">
            </div>
            <div class="col-8" style="float: left">
                <div class="profile-header">Name : <p>{{ $data['name'] }}</p>
                </div>
                <div class="profile-header">Contact : <p>{{ $data['contact'] }}</p>
                </div>
                <div style="clear: both;"></div>
                <div class="profile-header">Address : <p>{{ $data['address'] }}</p>
                </div>
                <div class="profile-header">Citizenship : <p>{{ $data['citizenship'] }}</p>
                </div>
                <div style="clear: both;"></div>
                <div class="profile-header">Email : <p>{{ $data['email'] }}</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    
                </div>
                <div class="col-8">
                    <a href="/profile/{{ $data['id'] }}/edit" class="btn btn-primary profile-button"><i
                    class="fa fa-solid fa-highlighter"></i></a>
                    <a href="/profile/{{ $data['id'] }}/changepassword" class="btn btn-primary profile-button">Change
                        Password</a>
                    <a href="/logout" class="btn btn-primary profile-button"><i class="fas fa-sign-out-alt fa-sm"> Logout
                        </i></a>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">

            <div class="col">
                <h5>My Bookings</h5>
                <hr>
                <div class="card-container">
                    <div class="row row-cols-1 row-cols-md-4 g-2 ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Room Number</th>
                                    <th scope="col">Checkin Date</th>
                                    <th scope="col">Checkout Date</th>
                                    <th scope="col">Booked On</th>
                                    <th scope="col">Payment</th>
                                    <th scope="col">Check In/Check Out</th>
                                    <th scope="col">Cancel</th>
                                </tr>
                            </thead>

                            <tbody>
                                <div class="check"></div>
                                @foreach ($mybookings as $booking)
                                    <tr>
                                        <td>{{$booking->getRoom->room_number}}</td>
                                        <td>{{ $booking->checkin }}</td>
                                        <td>{{ $booking->checkout }}</td>
                                        <td>{{ $booking->created_at }}</td>
                                        @if ($booking->getPayments->status == 'paid')
                                            <td>Paid</td>
                                        @else
                                            <td><a href="/pay/{{$booking->id}}" class="btn btn-primary">Pay</a></td>
                                        @endif
                                        @if ($booking->room_status == 'checkedin')
                                            <td><button value="{{$booking->id}}" class="btn btn-primary checkout">Check Out</button></td>
                                        @else
                                            <td><button value="{{$booking->id}}" class="btn btn-success checkin">Check In</button></td>
                                        @endif
                                        @if ($booking->room_status == 'checkedin')
                                            <td>Enjoy you Stay</td>
                                        
                                        @else
                                            <td><button value="{{$booking->id}}" class="btn btn-danger cancel">Cancel</button></td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-10">
                                @if (collect($mybookings)->isEmpty())
                                    <span>No bookings made..</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col">
                <h5>History of Bookings</h5>
                <hr>
                <div class="card-container">
                    <div class="row row-cols-1 row-cols-md-4 g-2 ">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Room Number</th>
                                    <th scope="col">Checkin Date</th>
                                    <th scope="col">Checkout Date</th>
                                    <th scope="col">Booked On</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($previousbookings as $booking)
                                    <tr>

                                        <td>{{$booking->getRoom->room_number}}</td>
                                        <td>{{ $booking->checkin }}</td>
                                        <td>{{ $booking->checkout }}</td>
                                        <td>{{ $booking->created_at }}</td>
                                        <td>{{$booking->room_status}}</td>
                                        
                                    </tr>
                                @endforeach
                                <tr>

                                </tr>
                            </tbody>
                            <tbody>

                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-10">
                                @if (collect($previousbookings)->isEmpty())
                                    <span>No previous bookings made..</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col">
                @if(!empty($roomtypes))
                <h5>Some Suggestions</h5>
                <hr>
                    <div class="card-container">
                        <div class="row row-cols-1 row-cols-md-4 g-2 ">
                            @foreach ($roomtypes as $roomtype)
                                @foreach ($roomtype as $room)
                                    <div class="col">
                                        <div class="card h-100">
                                            <img src="{{ asset('roomimg/' . $room->room_image) }}" class="card-img-top"
                                                alt="..." style="height: 40%;">
                                            <div class="card-body">
                                                <h5 class="card-title"><strong>{{ $room->room_name }}</strong></h5>
                                                <p class="card-text">{{ $room->description }}</p>
                                                <p class="card-text"><strong>Price : </strong>{{ $room->price }}</p>
                                                <p class="card-text"><strong>Location : </strong>{{ $room->location }}
                                                </p>
                                            </div>
                                            <div class="card-footer">
                                                <a class="btn btn-primary" href="/book/{{$room->id}}">Book</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkin").click(function () {
                var _checkin = $(this).val();
                $.ajax({
                    url:"{{url('checkin')}}/"+_checkin,
                    dataType: 'json',
                    success:function(res){
                        _html='';
                        if (res == "1") {
                            $(".check").html(_html);
                            location.reload();
                        }
                        else if(res == 2){
                            _html+='<span class="alert">You are a bit too late.</span>';
                            $(".check").html(_html);
                        }
                        else{
                            _html+='<span class="alert">You are a bit early to checkin.</span>';
                            $(".check").html(_html);
                        }
                        
                }
            });
            });
        });
        $(document).ready(function(){
            $(".checkout").click(function () {
                var _checkout = $(this).val();
                console.log(_checkout);
                $.ajax({
                    url:"{{url('checkout')}}/"+_checkout,
                    dataType: 'json',
                    success:function(res){
                        _html='';
                        if (res == 1) {
                            _html+='<span class="alert">Checked Out</span>';
                            $(".check").html(_html);
                            location.reload()
                        } else if(res == 2)  {
                            _html+='<span class="alert">You should checkin first.</span>';
                            $(".check").html(_html);
                        }
                        else if(res == 4) {
                            _html+='<span class="alert">You have not paid.</span>';
                            $(".check").html(_html);
                        }

                        else{
                            _html+='<span class="alert">Try contacting hotel. Something is wrong.</span>';
                            $(".check").html(_html);
                        }
                }
            });
            });
        });
        $(document).ready(function(){
            $(".cancel").click(function () {
                var _cancel = $(this).val();
                $.ajax({
                    url:"{{url('cancel')}}/"+_cancel,
                    dataType: 'json',
                    success:function(res){
                        _html='';
                        if (res == "1") {
                            _html+='<span class="alert">Cancelled Successfully.</span>';
                            $(".check").html(_html);
                            location.reload()
                        }
                        else{
                            _html+='<span class="alert">Contact Hotel For last minute Cancellations.</span>';
                            $(".check").html(_html);
                        }
                }
            });
            });
        });
    </script>
@endsection
