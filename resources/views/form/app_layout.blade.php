<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">
    <title>Form </title>
</head>
<body>
    @include('form.userbar')
    @yield('content')
    <script src="{{asset('assets/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/bootstrap.bundlle.min.js')}}"></script>


</body>
</html>
