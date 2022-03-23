
<div class="mb-3 row">
    <label for="name" class="col-md-2 col-form-label">Customer Name</label>
    <div class="col-md-4">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name','required']) }}
    </div>
</div>

<div class="mb-3 row">
    <label for="contact" class="col-md-2 col-form-label">Contact</label>
    <div class="col-md-4">
        {{ Form::text('contact', null, ['class' => 'form-control', 'id' => 'contact','required']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="address" class="col-md-2 col-form-label">Address</label>
    <div class="col-md-4">
        {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address','required']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="email" class="col-md-2 col-form-label">email</label>
    <div class="col-md-4">
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email','required']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="citizenship" class="col-md-2 col-form-label">Citizenship No.</label>
    <div class="col-md-4">
        {{ Form::text('citizenship', null, ['class' => 'form-control citizenship', 'id' => 'citizenship','required']) }}
        <span class="citizenship"></span>
    </div>
</div>
<div class="mb-3 row">
    <label for="password" class="col-md-2 col-form-label">password</label>
    <div class="col-md-4">
        {{ Form::text('password', null, ['class' => 'form-control password_field', 'id' => 'password','required']) }}
        <span class="password"></span>
    </div>
</div>
<div class="mb-3 row">
    <label for="status" class="col-md-2 col-form-label">Status</label>
    <div class="col-md-4">
        {{ Form::select('status', ['1' => 'booked', '0' => 'Not booked'], null, ['class' => 'form-control', 'id' => 'status','required']) }}
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<script type="text/javascript">
    $(document).ready(function(){
        $(".password_field").on('blur', function(){     
            var _password = $(".password_field").val();
            if (_password.length >= 8 ) {
                $(".password").text("");
            }
            else{
                $(".password").text("Must be 8 characters long.");
            }  
        });
    });
    $(document).ready(function(){
        $(".citizenship").on('blur', function(){
            var _citizenship = $(".citizenship").val();
            if (_citizenship.length == 10) {
                $(".citizenship").text("");
            }
            else{
                $(".citizenship").text("Must be 10 digit");
            }  
        });
        $(".password_field").on('blur', function(){
           
            var _password = $(".password_field").val();
            if (_password.length >= 8) {
                $(".password").text("");
            }
            else{
                $(".password").text("Paswword must be 8 character");
            }
            
        });
    });

     
</script>