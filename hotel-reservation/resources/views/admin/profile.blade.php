@extends('admin.master')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Admin Profile</h1>
        <a href="/annapurnahotel/admin/dashboard" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-arrow-left"></i></a>
    </div>
    <div class="grid">
        <div>
            <div class="grid-second">
                <div>
                    <p>Name:</p>
                </div>
                <div>
                    <p>{{ $data['name'] }}</p>
                </div>

                <div>
                    <p>Email</p>
                </div>
                <div>
                    <p>{{ $data['email'] }}</p>
                </div>
                <div>
                    <p>Status</p>
                </div>
                <div>
                    @if ($data['status'] == 1)
                        <p class="btn btn-outline-success">Activated</p>
                    @else
                    <p class="btn btn-outline-success">Deactivated</p>
                    @endif  
                </div>
            </div>
                <a class = "btn btn-primary"href='/annapurnahotel/admin/profile/changepassword/{{Auth::guard('admin')->user()->id}}/change'>ChangePassword</a>
            
        </div>
    </div>
@endsection
