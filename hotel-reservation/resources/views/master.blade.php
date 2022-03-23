<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Hotel Reservation</title>
    @include('include.style')
    @include('include.script')
    <link rel="shortcut icon" href="{{asset('admin/img/logo.png')}}" type="image/x-icon">
</head>
<body>
    <div id="wrapper">
        <div id="content-wrapper" >
            <div id="content container container-fluid">
                @include('include.message')
                @include('include.navbar')  
                @yield('content')
                
            </div>
        </div>
        <br>
        <br>
        @include('include.footer')
    </div>
    
</body>
</html>