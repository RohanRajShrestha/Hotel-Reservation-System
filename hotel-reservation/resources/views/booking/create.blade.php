@extends('admin.master')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('booking.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-minus"></i>  Return Back</a>
</div>
<br>
<h5>Forgot the customer id? Get the id from below search</h5>
<br>
<div class="container">
    <div class="row">
        <div class="col-8">
            <form action="{{route('booking.create')}}" method="GET" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="contact" class="col-md-2 col-form-label">Contact</label>
                    <div class="col-md-4">
                        {{ Form::text('contact', null, ['class' => 'form-control', 'id' => 'contact']) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-md-2 col-form-label">email</label>
                    <div class="col-md-4">
                        
                        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">search</button>
            </form> 
            <br>
            <form action="{{route('booking.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @include('booking.form')
            </form>   
        </div>
        <div class="col-4">
            <label class="col-form-label">Avilable rooms on the checkin date</label>
            <select name="arooms" class="form-control" id="arooms">
                
            </select>
        </div>
    </div>    
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(".checkindate").on('blur',function () {
            var _checkindate = $(this).val();
            $.ajax({
                url:"{{url('/annapurnahotel/admin/book')}}/arooms/"+_checkindate,
                dataType: 'json',
                success:function(res){
                    console.log(res);
                    var resultData = res.data;
                    _html='';
                    _html1='';
                    if(res.data == 0){
                        _html='<span>No room available for that day try other day.</span>'
                        $("#arooms").html(_html);
                        _html=''
                        $("#arooms").html(_html);
                    }
                    else{
                        $.each(res.data,function(index,row){
                        _html+='<option class="form-control" value="'+row.room_number+'">'+row.room_number+'</option>'
                    });
                        $("#arooms").html(_html);
    
                        
                    }
                    
            }
        });
    });
    });
</script>
@endsection
    