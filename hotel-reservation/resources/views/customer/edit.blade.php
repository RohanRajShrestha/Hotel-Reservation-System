@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('customer.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-minus"></i>  Return Back</a>
</div>
    {{ Form::model($data, ['url' => "/annapurnahotel/admin/customer/$data->id", 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
    @include('customer.form')    
    {{ Form::close() }}

@endsection
    