<nav class="top-bar">
    
    <ul class="bar-ul">
        <span id="logo"><a href="/home" style="text-decoration: none;">Annapurna Hotel</a></span>
        <li><a href="/home">Home</a></li>
        <li><a href="/booking">Booking</a></li>
        <li><a href="/aboutus">About Us</a></li>
        @if (!Auth::guard('customer')->guest())

            <li><a href="/profile/{{Auth::guard('customer')->user()->id}}/">Profile</a></li>
        @else
            <li><a href="{{route('user.login')}}">Log In</a></li>
        @endif

        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        
    
        
        
    </ul>

</nav>