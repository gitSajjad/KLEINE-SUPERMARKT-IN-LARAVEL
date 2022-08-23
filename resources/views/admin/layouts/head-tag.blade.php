
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('title')</title>

    <link rel="shortcut icon" href="" type="image/x-icon" />
@section('style')
    <link rel="stylesheet" href="{{ asset('/admin-asset/css/bootstrap.min.css') }}" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">

    <link href="{{ asset('admin-asset/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('sweetalert/sweetalert2.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin-asset/app.css') }}" rel="stylesheet" type="text/css">
        {{-- <link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css"> --}}
@show
@yield('styles')
</head>



