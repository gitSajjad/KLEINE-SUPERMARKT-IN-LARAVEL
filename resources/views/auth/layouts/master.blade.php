@include('auth.layouts.header')

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    @include('auth.layouts.partials.error')
                    <img src=" {{ asset('auth/assets/images/img-01.png') }} " alt="IMG">

                </div>
                @yield('countent')
            </div>
        </div>
    </div>

@include('auth.layouts.footer')
