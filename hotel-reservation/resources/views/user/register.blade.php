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
	<body class="img" style="background-image: url({{asset('/admin/img/register.jpeg')}});background-size: 100% 72rem;box-shadow:inset 0 0 0 72rem rgba(255, 0, 150, 0.1);">
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
		      	<h3 class="mb-4 text-center">Don't Have an account?</h3>
		      	{{ Form::open(array('url' => '/store')) }}
                  <div class="form-group">
                    {!! Form::text('name', null,['class' => 'form-control form-control-user', 'id' => 'name', 'placeholder'=>'name', 'required' ]) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::text('contact', null,['class' => 'form-control form-control-user', 'id' => 'contact', 'placeholder'=>'contact' , 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::text('address', null,['class' => 'form-control form-control-user', 'id' => 'address', 'placeholder'=>'address', 'required' ]) !!}
                  </div>
		      		<div class="form-group">
                        {!! Form::email('email', null,['class' => 'form-control form-control-user', 'id' => 'email', 'placeholder'=>'email', 'required' ]) !!}
		      		</div>
                      <div class="form-group">
                        {!! Form::number('citizenship', null,['class' => 'form-control form-control-user citizenship', 'id' => 'citizenship', 'placeholder'=>'citizenship', 'required' ]) !!}
                        <span class="citizenship"></span>
                    </div>
	            <div class="form-group">
                    {!! Form::password('password', ['class'=> 'form-control form-control-user password_field', 'id'=>'password', 'placeholder'=>'password', 'required'])!!}
	                <span toggle=".password_field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <span class="password"></span>
                </div>
                <div class="form-group">
                    {!! Form::password('confirm-password', ['class'=> 'form-control form-control-user confirmpassword-field', 'id'=>'confirm-password', 'placeholder'=>'confirm-password', 'required'])!!}
	                <span toggle=".confirmpassword-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    <span class="confirm"></span>
	            </div>
	            <div class="form-group">

	            	<button type="submit" class="form-control btn btn-primary submit px-3">Sign Up</button>
	            </div>
	            <div class="form-group d-md-flex">
	            </div>
	          </form>
	          
		      </div>
				</div>
			</div>
		</div>
	</section>
  
    <script src="{{asset('/templatelogin/js/jquery.min.js')}}"></script>
    <script src="{{asset('/templatelogin/js/popper.js')}}"></script>
    <script src="{{asset('/templatelogin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/templatelogin/js/main.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".password_field").on('blur', function(){     
                var _password = $(".password_field").val();
                if (_password.length >= 8 ) {
                    $(".password").text("");
                }
                else{
                    $(".password").text("Must be 8 characters long.");
                }  
            });
        });
        $(document).ready(function(){
            $(".citizenship").on('blur', function(){
                var _citizenship = $(".citizenship").val();
                if (_citizenship.length == 10) {
                    $(".citizenship").text("");
                }
                else{
                    $(".citizenship").text("Must be 10 digit");
                }  
            });
            $(".confirmpassword-field").on('blur', function(){
                var _cpassword = $(".confirmpassword-field").val();
                var _password = $(".password_field").val();
                var _html ='';
                if (_cpassword == _password) {
                    $(".confirm").text("    ");
                }
                else{
                    $(".confirm").text("Paswword not matched");
                }
                
            });
        });

         
    </script>
	</body>
</html>
