<!DOCTYPE html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico" />

    @section('style')
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('auth/assets/vendor/bootstrap/css/bootstrap.min.css') }}  ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('auth/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}   ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/assets/vendor/animate/animate.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('auth/assets/vendor/css-hamburgers/hamburgers.min.css') }}  ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('auth/assets/vendor/select2/select2.min.css') }} ">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href=" {{asset('auth/assets/css/util.css')}} ">
    <link rel="stylesheet" type="text/css" href=" {{asset('auth/assets/css/main.css')}} ">

    @show
    @yield('styles')
    <!--===============================================================================================-->
</head>



