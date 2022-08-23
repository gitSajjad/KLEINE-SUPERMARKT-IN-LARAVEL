<!doctype html>
<html lang="en">

@include('admin.layouts.head-tag')

<body>

@include('admin.layouts.top-nav')

    <div class="container-fluid">
        <div class="row">
@include('admin.layouts.sidebar')
        <main role="main " class="col-md-9 ml-sm-auto col-lg-10 px-4">
@include('alerts.alert-content.success')
@include('alerts.alert-content.danger')
            @yield('content')




    </main>
    </div>
    </div>

@include('admin.layouts.script')
</body>

</html>
