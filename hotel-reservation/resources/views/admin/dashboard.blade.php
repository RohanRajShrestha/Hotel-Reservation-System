@extends('admin.master')
@section('content')
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Revenue</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Rs.{{$revenue}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Reservations</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countbook}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-solid fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">No. of Customers
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$countcustomer}}</div>
                                        </div>
                                        {{-- <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar"
                                                    style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                    aria-valuemax="100"></div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        No. of Rooms</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countrooms}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-solid fa-bed fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Admins</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countadmins}}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fa fa-solid fa-user-shield fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <h4>Recent Checkins And Checkouts</h4>
        <hr>
        <br>
        <!-- /.container-fluid -->
        <table class="table table-hover">
            <thead>
                <th scope="col">Room No.</th>
                <th scope="col">User Id</th>
                <th scope="col">checkin</th>
                <th scope="col">checkout</th>
                <th scope="col">No. Of Adults</th>
                <th scope="col">status</th> 
                <th scope="col">Payment</th> 
            </thead> 
            <tbody>
                @foreach ($data as $booking)
                <tr>
                    <td>{{$booking->getRoom->room_number}}</td>
                    <td>{{$booking->user_id}}</td>
                    <td>{{$booking->checkin}}</td>
                    <td>{{$booking->checkout}}</td>
                    <td>{{$booking->number_adults}}</td>
                    <td>{{$booking->room_status}}</td>
                    <td>{{$booking->getPayments->status}}</td>
                </tr>
            @endforeach
            </tbody>
            <div class="d-flex justify-content-center">
                {{ $data->onEachSide(5)->links() }}
            </div>
        </table>
        <br>
        <h4>Missed Checkins</h4>
        <hr>
        <br>
        <!-- /.container-fluid -->
        <table class="table table-hover">
            <thead>
                <th scope="col">Room No.</th>
                <th scope="col">User Id</th>
                <th scope="col">checkin</th>
                <th scope="col">checkout</th>
                <th scope="col">No. Of Adults</th>
                <th scope="col">status</th> 
                <th scope="col">Payment</th> 
            </thead> 
            <tbody>
                @foreach ($missedbookings as $booking)
                <tr>
                    <td>{{$booking->getRoom->room_number}}</td>
                    <td>{{$booking->user_id}}</td>
                    <td>{{$booking->checkin}}</td>
                    <td>{{$booking->checkout}}</td>
                    <td>{{$booking->number_adults}}</td>
                    <td>{{$booking->room_status}}</td>
                    <td>{{$booking->getPayments->status}}</td>
                </tr>
            @endforeach
            </tbody>
            <div class="d-flex justify-content-center">
                {{ $missedbookings->onEachSide(5)->links() }}
            </div>
        </table>
    </div>
    <!-- End of Main Content -->
    
@endsection