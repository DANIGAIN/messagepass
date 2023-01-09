<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Untitled</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
    <div class="login-dark">
        <form action="{{route('register-user')}}" method="post">
            @if(Session::has('fail'))
            <div class="alart alart-success">{{Session::get('fail')}}</div>
            @endif

            @csrf
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>

            <div class="form-group"><input class="form-control" type="ts" name="name" placeholder="Full Name "></div>
            <span class="text-danger"> @error('name') {{$message}} @enderror</span>
            <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Email"></div>
            <span class="text-danger">@error('email'){{$message}} @enderror</span>
            <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Password"></div>
            <span class="text-danger">@error('password'){{$message}} @enderror</span>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit">Sign Up </button></div><a href="{{route('logIn')}}" class="forgot">Have a account</a></form>
    </div>
</body>

</html>