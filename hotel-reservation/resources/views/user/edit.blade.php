@extends('master')
@section('content')
<div class="container-sm">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <a href="/home" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-minus"></i>  Return Back</a>
    </div>
        {{ Form::model($data, ['url' => "/profile/$data->id/store", 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
            
            <div class="mb-3 row">
                <label for="name" class="col-md-2 col-form-label">Customer Name</label>
                <div class="col-md-4">
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) }}
                </div>
            </div>

            <div class="mb-3 row">
                <label for="contact" class="col-md-2 col-form-label">Contact</label>
                <div class="col-md-4">
                    {{ Form::text('contact', null, ['class' => 'form-control', 'id' => 'contact']) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="address" class="col-md-2 col-form-label">Address</label>
                <div class="col-md-4">
                    {{ Form::text('address', null, ['class' => 'form-control', 'id' => 'address']) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-md-2 col-form-label">email</label>
                <div class="col-md-4">
                    {{ Form::text('email', null, ['class' => 'form-control', 'id' => 'email']) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="citizenship" class="col-md-2 col-form-label">Citizenship No.</label>
                <div class="col-md-4">
                    {{ Form::text('citizenship', null, ['class' => 'form-control', 'id' => 'citizenship']) }}
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    
        {{ Form::close() }}
</div>
<br><br><br><br><br><br>


@endsection
    