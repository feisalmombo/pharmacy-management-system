<!doctype html>
<html lang="en">
  <head>
  	<title>Change Password</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('login-montana/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" href="{{asset('login-montana/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url({{asset('login-montana/images/bg.jpg')}});">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					{{-- <img class="img-fluid rounded-circle" src="@if(!empty(AppSettings::get('logo'))) {{asset('storage/'.AppSettings::get('logo'))}} @else{{asset('assets/img/logo.jpg')}} @endif" alt="Logo" > --}}
					<h1 style="color: hsla(345, 100%, 37%, 0.867)">MONTANA PHARMACY</h1>
				</div>
			</div>
			<div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">

                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <x-alerts.danger :error="$error" />
                                @endforeach
                            @endif
                    <h5 class="mb-4 text-center" style="color: #ffffff">!! Change password before login !!</h5>

                <form method="POST" action="{{ route('password.update') }}" class="signin-form">
                    @csrf

                    <div class="form-group">
                        <input id="password" type="password" class="form-control" name="password" placeholder="New Password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <div class="form-group">
                        <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-primary submit px-3">Change Password</button>
                    </div>
                </form>

                </div>
                </div>
            </div>
		</div>
	</section>

	<script src="{{asset('login-montana/js/jquery.min.js')}}"></script>
    <script src="{{asset('login-montana/js/popper.js')}}"></script>
    <script src="{{asset('login-montana/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('login-montana/js/main.js')}}"></script>

	</body>
</html>

