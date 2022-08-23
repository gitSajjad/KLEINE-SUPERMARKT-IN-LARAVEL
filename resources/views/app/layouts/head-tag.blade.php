@section('style')

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>@yield('title')</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
    <!--
		CSS
		============================================= -->

        <link rel="stylesheet" href="{{ asset('app/css/linearicons.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/nice-select.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/owl.carousel.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('app/css/main.css') }}">
</head>
@show
@yield('styles')
