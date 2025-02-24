<!DOCTYPE html>
<html>
<head>
    <title>Your Account Details</title>
</head>
<body>
    <h2>Hello, {{ $user->name }}</h2>
    <p>Your account has been created successfully.</p>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p><a href="{{ url('http://localhost:9090/login') }}">Click here to login</a></p>
</body>
</html>
