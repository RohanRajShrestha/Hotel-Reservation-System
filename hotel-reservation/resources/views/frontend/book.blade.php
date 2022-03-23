@extends('master')
@section('content')
    <img src="{{asset('admin/img/book.jpg')}}" alt="" class="center" style="width:45%;height:20rem;">
    <div class="container-sm">
        <div class="card-container">
            <br>
            <h5 style="margin-left: 10rem">Make Your Booking</h5>
            <br>
            <form action="{{route('book.store')}}" method="POST" enctype="multipart/form-data" style="margin-left: 15rem;">
                @csrf
                <div class="mb-3 row">
                    <label for="roomtype_id" class="col-md-2 col-form-label">Room Type Id</label>
                    <div class="col-md-4">
                        <input type="text" name="roomtype_id" id = 'roomtype_id' class="form-control roomtypeid" value="{{$roomtype->id}}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="room_id" class="col-md-2 col-form-label">Room id</label>
                    <div class="col-md-4 room_id">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="room_name" class="col-md-2 col-form-label">Room Name</label>
                    <div class="col-md-4">
                        <input type="text" name="room_name" id = 'room_name' class="form-control" value="{{$roomtype->room_name}}" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="checkin" class="col-md-2 col-form-label">CheckIn Date</label>
                    <div class="col-md-4">
                        <input type="date" name="checkin" id = 'checkin' class="form-control checkindate" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="checkout" class="col-md-2 col-form-label">CheckOut Date</label>
                    <div class="col-md-4">
                        {{ Form::date('checkout', null, ['class' => 'form-control', 'id' => 'checkout', 'required']) }}
                    </div>
                </div> 
                <div class="mb-3 row">
                    <label for="room_number" class="col-md-2 col-form-label">Room Number</label>
                    <div class="col-md-4 room_number">
                        
                        {{-- <select name="room_number" id="room_number" class="form-control room_number" required readonly>
                        </select> --}}
                    </div>
                </div>
                <div class="mb-3 row notavailable">
                    
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-md-2 col-form-label">Customer Name</label>
                    <div class="col-md-4">
                            <input type="text" name="name" id = 'name' class="form-control" value="{{Auth::guard('customer')->user()->name}}" readonly>
            
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="user_id" class="col-md-2 col-form-label">Customer Id</label>
                    <div class="col-md-4">
        
                            <input type="text" name="user_id" id = 'user_id' class="form-control" value="{{Auth::guard('customer')->user()->id}}" readonly>
            
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="number_adults" class="col-md-2 col-form-label">Number of adults</label>
                    <div class="col-md-4">
                        <select class="form-control" name="number_adults" id="number_adults">
                            {{$data=$roomtype->number_adults}}
                            @while ($data>0)
                                <option value="{{$data}}">{{$data}}</option>
                                {{$data = $data-1}}
                            @endwhile
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-md-2 col-form-label">Price</label>
                    <div class="col-md-4">
                        <input type="text" name="price" id = 'price' class="form-control" value="{{$roomtype->price}}" readonly>
                    </div>
                </div>
                <br>
                <div class="mb-3 row">
                    <div class="col-md-2"></div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                
            </form> 
            <br>
        </div>
        <br>
        <hr>
        <h6 style="display:block;font-family: 'Roboto', sans-serif;margin:0 40%">Explore the beauty of Nepal</h6>
        <hr>
        <br>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".checkindate").on('blur',function () {
                var _checkindate = $(this).val();
                var _roomid = $(".roomtypeid").val();
                $.ajax({
                    url:"{{url('book')}}/availablerooms/"+_checkindate+'/'+_roomid ,
                    dataType: 'json',
                    success:function(res){
                        var resultData = res.data;
                        _html='';
                        _html1='';
                        console.log(resultData.length === 0);
                        if(resultData.length === 0){
                            _html='<span>**No room available for that day try other day.**</span>'
                            $(".notavailable").html(_html);
                            _html=''
                            $(".room_number").html(_html);
                        }
                        else{
                            $.each(res.data,function(index,row){
                             _html = '<input type="text"  name="room_number" id="room_number" class="form-control" value="'+row.room_number+'" readonly>'   
                            // _html+='<option class="form-control" value="'+row.room_number+'" readonly>'+row.room_number+'</option>'
                            _html1 = '<input type="text"  name="room_id" id="room_id" class="form-control" value="'+row.id+'" readonly>'
                            // _html1+='<option class="form-control" value="'+row.id+'" readonly>'+row.id+'</option>'
                        });
                            $(".room_number").html(_html);
                            $(".room_id").html(_html1);
                            _html=''
                            $(".notavailable").html(_html);
                        }
                        
                }
            });
        });
        });
    </script>
@endsection