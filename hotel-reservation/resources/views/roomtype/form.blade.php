    <label for="room_name" class="form-label">Room Name</label>
    {{ Form::text('room_name', null, ['id' => 'roomname', 'class'=>'form-control','required'] ) }}<br>
    <label for="room_image" class="form-label">Room Image</label>
    {{ Form::file('file', null, ['id' => 'file', 'class'=>'form-control','required']) }}<br>
    <label for="description">description</label>
    {{ Form::text('description', null, ['id' => 'description', 'class'=>'form-control','required']) }}<br>
    <label for="price" class="form-label">Price</label>
    {{ Form::text('price', null, ['id' => 'price', 'class'=>'form-control','required']) }}<br>
    <label for="location" class="form-label">location</label>
    {{ Form::select('location', ['kathmandu' => 'Kathmandu', 'pokhara' => 'Pokhara'], null, ['id' => 'location', 'class'=>'form-control','required']) }}<br>
    <label for="number_adults" class="form-label">Number Of Adults</label>
    {{ Form::text('number_adults', null, ['id' => 'number_adults', 'class'=>'form-control','required']) }}<br>
    <label for="is_available" class="form-label">is_available</label>
    {{ Form::select('is_available', ['1' => 'Active', '0' => 'Inactive'], null, ['id' => 'is_available', 'class'=>'form-control','required']) }}<br>
    <label for="statuse" class="form-label">status</label>
    {{ Form::text('status', null, ['id' => 'status', 'class'=>'form-control','required']) }}<br>
    <button class="btn btn-primary"type="submit">Submit</button>