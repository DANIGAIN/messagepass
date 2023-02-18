<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>

    
    <div class="card">
        <div class="image"><img src="https://ui-avatars.com/api/?name={{$data->name}}" alt=""></div>
        <div class="content">
            <h1>{{$data->name}}</h1>
            <h3> {{$data->email}} </h3>
            <div class="container">
                <button type="button"> <a href="{{route('logout')}}">logout</a></button> <br>

                <button type="button"> <a href="{{route('chat')}}">Chat</a></button>

            </div>

            <div class="container">
                <button type="button"> <a href="{{route('logout')}}">Delete</a></button> <br>

                <button type="button"> <a href="{{route('chat')}}">Reset</a></button>

            </div>
            
        </div>
    </div>
    
    
</body>
</html>
