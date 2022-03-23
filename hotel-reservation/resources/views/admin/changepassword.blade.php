@extends('admin.master')
@section('content')
{{ Form::model($data, ['url' => "/annapurnahotel/admin/profile/changepassword/$data->id", 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}            
    <div class="mb-3 row">
        <label for="name" class="col-md-2 col-form-label">Admin Name</label>
        <div class="col-md-4">
            {{ Form::text('name', null, ['class' => 'form-control', 'disabled', 'id' => 'name']) }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="email" class="col-md-2 col-form-label">email</label>
        <div class="col-md-4">
            {{ Form::text('email', null, ['class' => 'form-control', 'disabled', 'id' => 'email']) }}
        </div>
    </div>
    <div class="mb-3 row{{ $errors->has('current-password') ? ' has-error' : '' }}">
        <label for="new-password" class="col-md-2 col-form-label">Current Password</label>

        <div class="col-md-4">
            <input id="current-password" type="password" class="form-control" name="current-password" required>

            @if ($errors->has('current-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('current-password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="mb-3 row{{ $errors->has('new-password') ? ' has-error' : '' }}">
        <label for="new-password" class="col-md-2 col-form-label">New Password</label>

        <div class="col-md-4">
            <input id="new-password" type="password" class="form-control" name="new-password" required>

            @if ($errors->has('new-password'))
                <span class="help-block">
                    <strong>{{ $errors->first('new-password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="mb-3 row">
        <label for="new-password-confirm" class="col-md-2 col-form-label">Confirm New Password</label>

        <div class="col-md-4">
            <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
            @if ($errors->has('new-password-confirm'))
                <span class="help-block">
                    <strong>{{ $errors->first('new-password-confirm') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="mb-3 row">
        <label for="is_superadmin" class="col-md-2 col-form-label">is_superadmin</label>
        <div class="col-md-4">
            {{ Form::select('is_superadmin', ['1' => 'Super Admin', '0' => 'Not Superadmin'], null, ['class' => 'form-control', 'disabled', 'id' => 'is_superadmin']) }}
        </div>
    </div>
    <div class="mb-3 row">
        <label for="status" class="col-md-2 col-form-label">Status</label>
        <div class="col-md-4">
            {{ Form::select('status', ['1' => 'Activated', '0' => 'Deactivated'], null, ['class' => 'form-control', 'disabled', 'id' => 'status']) }}
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

    {{ Form::close() }}
    
@endsection