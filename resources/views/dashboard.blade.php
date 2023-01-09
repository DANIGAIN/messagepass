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
   <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="margin-top:20px">
                <h4>Welcome To Dashboard</h4>
                   <table class="tabel">
                    <thead>
                        <th>Name </th>
                        <th>Email </th>
                        <th>Action </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td><a href="{{route('logout')}}">logout</a></td>
                        </tr>
                    </tbody>
                    
                   </table>
                <hr>
            </div>
        </div>
    </div>
</div>
</body>

</html>