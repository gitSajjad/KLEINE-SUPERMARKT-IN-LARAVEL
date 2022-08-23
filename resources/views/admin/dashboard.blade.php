@extends('admin.layouts.master')
@section('title')
dddddd
@endsection
@section('content')

<div class="row mt-3">


    <div class="col-sm-6 col-lg-3">
        <a href="" class="text-decoration-none">
            <div class="card text-white bg-gradiant-green-blue mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-clipboard-list"></i> دسته بندی</span>{{ $categories_count }} <span class="badge badge-pill right"></span></div>
                <div class="card-body">
                    <section class="font-12 my-0"><i class="fas fa-clipboard-list"></i> GO TO Categories!</section>
                </div>
            </div>
            </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="" class="text-decoration-none">
            <div class="card text-white bg-juicy-orange mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-users"></i> کاربران</span>{{ $users->count() }} <span class="badge badge-pill right"></span></div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">

                        <span class=""><i class="fas fa-users-cog"></i> ادمین ها <span class="badge badge-pill mx-1">{{ $users->where('permission', 1)->count() }}</span></span>
                        <span class=""><i class="fas fa-user"></i> کاربرها <span class="badge badge-pill mx-1">{{ $users->where('permission', 0)->count() }}</span></span>
                    </section>
                </div>
            </div>
            </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="" class="text-decoration-none">
            <div class="card text-white bg-dracula mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-newspaper"></i> پست های سایت</span> <span class="badge badge-pill right"></span></div>
                <div class="card-body">
                    <section class="d-flex justify-content-between align-items-center font-12">
                        <span class=""><i class="fas fa-bolt"></i> تعداد پست ها <span class="badge badge-pill mx-1">{{ $posts_count }}</span></span>
                    </section>
                </div>
            </div>
            </a>
    </div>
    <div class="col-sm-6 col-lg-3">
        <a href="" class="text-decoration-none">
            <div class="card text-white bg-neon-life mb-3">
                <div class="card-header d-flex justify-content-between align-items-center"><span><i class="fas fa-comments"></i> کامنت ها</span> <span class="badge badge-pill right"></span></div>
                <div class="card-body">
                    <!--                        <h5 class="card-title">Info card title</h5>-->
                    <section class="d-flex justify-content-between align-items-center font-12">


                        <span class=""><i class="far fa-eye-slash"></i> دیده نشده <span class="badge badge-pill mx-1">{{ $commends->where('status', 0)->count() }}</span></span>
                        <span class=""><i class="far fa-check-circle"></i> ارسال شده به سایت <span class="badge badge-pill mx-1">{{ $commends->where('status', 1)->count() }}</span></span>


                    </section>
                </div>
            </div>
            </a>
    </div>

</div>


<div class="row mt-2">
    <div class="col-4">
        <h2 class="h6 pb-0 mb-0">
            Most viewed posts
        </h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>

                    <tr>
                        <th>#</th>
                        <th>title</th>
                        <th>view</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($mostViewedPosts as $mostViewedPost )
                    <tr>
                        <td>
                            <a class="text-primary" href="">
           {{$loop->iteration}}
                </a>
                </td>
                <td>
               {{$mostViewedPost->title}}
                </td>
                <td><span class="badge badge-secondary">{{$mostViewedPost->view}}</span></td>
                </tr>

                    @endforeach



                </tbody>
                </table>
    </div>
</div>
<div class="col-4">
    <h2 class="h6 pb-0 mb-0">
        Most commented posts

    </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>comment</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($mostCommentedPosts as $mostCommentedPost )

                <tr>
                    <td>
                        <a class="text-primary" href="">
         {{$loop->iteration}}
                </a>
                </td>
                <td>
                  {{$mostCommentedPost->title}}
                </td>
                <td><span class="badge badge-success">{{ $mostCommentedPost->comments_count }}</span></td>
                </tr>

                @endforeach



                </tbody>
                </table>
    </div>
</div>
<div class="col-4">
    <h2 class="h6 pb-0 mb-0">
        Comments
    </h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>username</th>
                    <th>comment</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>

@foreach ($lastComments as $lastComment )
<tr>
    <td> {{$loop->iteration }}</td>


<td>
{{$lastComment->user->username}}
</td>
<td>
{{$lastComment->comment}}
</td>
<td><span class="badge badge-warning">@if($lastComment->status == 0)
unseen
@elseif ($lastComment->status == 1)
seen
@else
approve
@endif
</span></td>
</tr>

@endforeach


                </tbody>
                </table>
    </div>
</div>
</div>
@endsection
