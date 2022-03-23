@extends('admin.master')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <a href="{{route('admins.index')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-minus"></i>  Return Back</a>
</div>
<form action="{{route('admins.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('admin.form')
</form> 
@endsection
    