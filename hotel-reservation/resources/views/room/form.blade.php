<div class="mb-3 row">
    <label for="room_id" class="col-md-2 col-form-label">Room Type Id</label>
    <div class="col-md-4">
            @if (!empty($roomtypes))
                <select class="form-control" name="room_type_id" id="room_type_id">
                @foreach ($roomtypes as $roomtype)
                    <option value="{{$roomtype->id}}">{{$roomtype->id . ' '. $roomtype->room_name}}</option>
                
                @endforeach
                </select>
            @else
                {{ Form::text('room_type_id', null, ['class' => 'form-control', 'id' => 'room_type_id']) }}
             @endif
    </div>
</div>
<div class="mb-3 row">
    <label for="room_number" class="col-md-2 col-form-label">Room Number</label>
    <div class="col-md-4">
        {{ Form::text('room_number', null, ['class' => 'form-control ', 'id' => 'room_number']) }}
        @if ($errors->has('room_number'))
            <span class="text-danger">{{ $errors->first('room_number') }}</span>
        @endif
    </div>
</div>
<div class="mb-3 row">
    <label for="description" class="col-md-2 col-form-label">Description</label>
    <div class="col-md-4">
        {{ Form::text('description', null, ['class' => 'form-control', 'id' => 'description']) }}
        @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
    </div>
</div>

<div class="mb-3 row">
    <label for="status" class="col-md-2 col-form-label">Status</label>
    <div class="col-md-4">
        {{ Form::select('status', ['1' => 'Active', '0' => 'Inactive'], null, ['class' => 'form-control', 'id' => 'status']) }}
        @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>