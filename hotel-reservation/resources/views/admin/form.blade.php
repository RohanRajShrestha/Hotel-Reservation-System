
<div class="mb-3 row">
    <label for="name" class="col-md-2 col-form-label">Admin Name</label>
    <div class="col-md-4">
        {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
    </div>
</div>
<div class="mb-3 row">
    <label for="email" class="col-md-2 col-form-label">email</label>
    <div class="col-md-4">
        {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
    </div>
</div>
<div class="mb-3 row align-items-center">
    <div class="col-md-2">
      <label for="password" class="col-form-label">Password</label>
    </div>
    <div class="col-md-4">
        {{ Form::password('password', ['class' => 'form-control', 'aria-describedby'=>"passwordHelpInline", 'id' => 'password']) }}
    </div>
    <div class="col-auto">
      <span id="passwordHelpInline" class="form-text">
        Must be 8-20 characters long.
      </span>
    </div>
</div>
{{-- <div class="mb-3 row">
    <label for="password" class="col-md-2 col-form-label">Password</label>
    <div class="col-md-4">
        
    </div>
</div> --}}
@if (Auth::guard('admin')->user()->is_superadmin == 1)
<div class="mb-3 row">
    <label for="is_superadmin" class="col-md-2 col-form-label">is_superadmin</label>
    <div class="col-md-4">
        {{ Form::select('is_superadmin', [true => 'Super Admin', false => 'Not Superadmin'], null, ['class' => 'form-control', 'id' => 'is_superadmin']) }}
    </div>
</div>
@endif
<div class="mb-3 row">
    <label for="status" class="col-md-2 col-form-label">Status</label>
    <div class="col-md-4">
        {{ Form::select('status', ['1' => 'Activated', '0' => 'Deactivated'], null, ['class' => 'form-control', 'id' => 'status']) }}
    </div>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
