@extends('master')
@section('content')
    <div class="container-sm">
        <h1>Payment</h1>
        <div class="container">
            <h3>Pay In advance</h3>
            <hr>
            {{ Form::open(array('route' => array('payment.store'), 'method'=>'POST')) }}

                <div class="row">
                    <div class="col-4">
                        <img src="{{asset('admin/img/credit-cards.jpg')}}" alt="" width="100%">
                    </div>
                    <div class="col-8">
                        <label for="credi-card">Enter a Valid Card Number</label>
                        <input type="text" name="credit-card" class="form-control" required>
                        <br>
                        <button type="submit" name="form1" value="{{$bookid}}" class="btn btn-primary">Pay</button>
                    </div>
                </div>
            </form> 
           {{ Form::close()}}
            <hr>
            <form action="{{route('payment.store')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-4">
                        <img src="{{asset('admin/img/register.jpg')}}" alt="" height="80%">
                    </div>
                    <div class="col-8">
                        <p>You can simply pay before you checkin in one of our hotels.</p>
                        <label for="payment"> Payment option</label>
                        <select name="payment" id="payment" class="form-control" readonly>
                            <option value="notpaid">In person Payment</option>
                        </select>
                        <br>
                        <br>
                        <button type="submit" name="form2" value="{{$bookid}}" class="btn btn-primary" style="margin-top: 1rem">Continue</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection