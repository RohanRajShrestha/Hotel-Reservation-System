@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('roomtype.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-minus"></i>  Return Back</a>
</div>
    {{ Form::model($data, ['url' => "/annapurnahotel/admin/roomtype/$data->id", 'method' => 'PUT', 'enctype' => 'multipart/form-data']) }}
    @include('roomtype.form')    
    {{ Form::close() }}
@endsection
    
