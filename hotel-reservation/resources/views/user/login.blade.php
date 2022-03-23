<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{asset('/templatelogin/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('/templatelogin/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"><a href="{{url('home')}}">Annapurna Hotel</a></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
				  	@if (\Session::has('error'))
						<span>{!! \Session::get('error') !!}</span>
					@endif
		      	{{ Form::open(array('url' => '/check')) }}
		      		<div class="form-group">
                        {!! Form::email('email', null,['class' => 'form-control form-control-user', 'id' => 'email', 'placeholder'=>'email' ]) !!}
		      		</div>
	            <div class="form-group">
                    {!! Form::password('password', ['class'=> 'form-control form-control-user password-field', 'id'=>'password', 'placeholder'=>'password'])!!}
	                <span toggle=".password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">

	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
	            </div>
	          </form>
	          <p class="w-100 text-center">&mdash; Don't Have a account? &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="{{route('user.register')}}" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Register</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('/templatelogin/js/jquery.min.js')}}"></script>
  <script src="{{asset('/templatelogin/js/popper.js')}}"></script>
  <script src="{{asset('/templatelogin/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/templatelogin/js/main.js')}}"></script>

	</body>
</html>
