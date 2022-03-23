<label for="booking_id" class="form-label">Booking Id</label>
{{ Form::text('booking_id', null, ['id' => 'roomname', 'class'=>'form-control'] ) }}<br>
<label for="paymenttype" class="form-label">Payment Type</label>
{{ Form::select('paymenttype', ['card' => 'Card', 'cash' => 'Cash','online'=>'Online'], null, ['id' => 'paymenttype', 'class'=>'form-control']) }}<br>
<label for="price" class="form-label">Price</label>
{{ Form::text('price', null, ['id' => 'price', 'class'=>'form-control']) }}<br>
<label for="statuse" class="form-label">status</label>
{{ Form::select('status', ['notpaid' => 'Not Paid', 'paid' => 'Paid'], null, ['id' => 'status', 'class'=>'form-control']) }}<br>
<button class="btn btn-primary"type="submit">Submit</button>