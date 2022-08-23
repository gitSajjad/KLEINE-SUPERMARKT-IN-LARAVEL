<!DOCTYPE html>
<html lang="zxx" class="no-js">

@include('app.layouts.head-tag')

<body>
@include('app.layouts.header')

    @yield('content')

    <!-- start footer Area -->
   @include('app.layouts.footer')
    <!-- End footer Area -->

    @include('app.layouts.script')
</body>

</html>
