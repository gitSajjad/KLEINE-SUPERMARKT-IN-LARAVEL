@extends('admin.layouts.master')
@section('title')
صفحه اصلی پست ها
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Website Setting</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="{{ route('admin.setting.edit',$settings->id) }}" class="btn btn-sm btn-success">set web setting</a>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>Website setting</caption>
        <thead>

            <tr>
                <th>name</th>
                <th>value</th>
            </tr>
        </thead>
        <tbody>




            <tr>
                <td>
            <tr>
                <td>title</td>
                <td>
                   {{ $settings->title}}
                </td>
            </tr>
            <tr>
                <td>description</td>
                <td>
                   {{$settings->description}}
                </td>
            </tr>
            <tr>
                <td>key words</td>
                <td>
                   {{$settings->keywords}}
                </td>
            </tr>
            <tr>
                <td>Logo</td>
                <td><img src="{{ asset($settings->logo) }}" alt="" width="100px" height="100px"></td>
            </tr>
            <tr>
                <td>Icon</td>
                <td><img src="{{ asset($settings->icon) }}" alt="" width="100px" height="100px"> </td>
            </tr>



                </td>

        </td>
    </tr>


        </tbody>
    </table>
</section>




@endsection
