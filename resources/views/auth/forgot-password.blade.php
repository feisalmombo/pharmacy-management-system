@extends('layouts.auth')

@section('content')
{{-- <p class="account-subtitle">!! Enter your email to get a password reset link !!</p> --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- Form -->
<form action="{{route('forgot-password')}}" method="post">
	@csrf
	<div class="form-group">
		<input class="form-control" name="email" type="text" placeholder="Email">
	</div>
	<div class="form-group mb-0">
		<button class="btn btn-primary btn-block" type="submit">Reset Password</button>
	</div>
</form>
<!-- /Form -->

<div class="text-center dont-have">Please click to login. <a href="{{route('login')}}">Login</a></div>
@endsection
