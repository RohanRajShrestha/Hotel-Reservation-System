
<div class="mb-3 row">
    <label for="customer_id" class="col-md-2 col-form-label">Customer Id</label>
    <div class="col-md-4">
        @if (!empty($customer))
            <input type="text" name="user_id" id = 'user_id' class="form-control" value="{{$customer}}">
        @else
            {{ Form::text('user_id', null, ['class' => 'form-control', 'id' => 'user_id']) }}
        @endif
    </div>
</div>

<div class="mb-3 row">
    <label for="checkin" class="col-md-2 col-form-label">CheckIn Date</label>
    <div class="col-md-4">
        {{ Form::date('checkin', null, ['class' => 'form-control checkindate', 'id' => 'checkin','required']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="checkout" class="col-md-2 col-form-label">CheckOut Date</label>
    <div class="col-md-4">
        {{ Form::date('checkout', null, ['class' => 'form-control', 'id' => 'checkout','required']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="room_id" class="col-md-2 col-form-label">Room Id</label>
    <div class="col-md-4">
            @if (!empty($rooms))
                <select class="form-control" name="room_id" id="room_id">
                @foreach ($rooms as $room)
                    <option value="{{$room->id}}">{{$room['room_number'] . ' '. $room->Roomtype->room_name}}</option>      
                @endforeach
                </select>
            @else
                {{ Form::text('room_id', null, ['class' => 'form-control', 'id' => 'room_id','required']) }}
             @endif
    </div>
</div>
<div class="mb-3 row">
    <label for="number_adults" class="col-md-2 col-form-label">Number of adults</label>
    <div class="col-md-4">
        {{ Form::text('number_adults', null, ['class' => 'form-control', 'id' => 'number_adults','required']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="room_status" class="col-md-2 col-form-label">Room Status</label>
    <div class="col-md-4">
        {{ Form::select('room_status', ['processing' => 'Processing', 'checkedin' => 'CheckedIn','checkedout' => 'CheckedOut','cancelled'=>'cancelled'], null, ['class' => 'form-control', 'id' => 'room_status']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="status" class="col-md-2 col-form-label">Status</label>
    <div class="col-md-4">
        {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control', 'id' => 'status', 'required']) }}
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
