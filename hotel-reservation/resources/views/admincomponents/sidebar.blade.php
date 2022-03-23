<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/annapurnahotel/admin/dashboard">
        <div class="sidebar-brand-icon">
            <i class="fas fa-hotel"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Annapurna Hotel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin.dashboard')}} ">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Controls
    </div>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('customer.index')}}" 
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Customers</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('room.index')}}">
            <i class="fa fa-solid fa-bed"></i>
            <span>Rooms</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('roomtype.index')}}">
            <i class="fa fa-solid fa-bed"></i>
            <span>Room Types</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('booking.index')}}"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-solid fa-book"></i>
            <span>Reservations</span>
        </a>   
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="/annapurnahotel/admin/admins"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fa fa-solid fa-user-shield"></i>
            <span>Admins</span>
        </a>
    
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('payment.index')}}"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-dollar-sign"></i>
            <span>Payments</span>
        </a>   
    </li>

    <!-- Divider -->

    <!-- Heading -->
    {{-- <div class="sidebar-heading">
        Addons
    </div> --}}


    <!-- Nav Item - Tables -->
    {{-- <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li> --}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>