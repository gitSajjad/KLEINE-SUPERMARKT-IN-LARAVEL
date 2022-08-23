@extends('app.layouts.master')
@section('title')
Home
@endsection
@section('content')
<div class="site-main-container">
    <!-- Start top-post Area -->
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start single-post Area -->
                    <div class="single-post-wrap">
                        <div class="feature-img-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset($post->image) }}" alt="">
                        </div>
                        <div class="content-wrap">
                            <ul class="tags mt-10">
                                <li><a href="#">{{$post->category->name}} </a></li>
                            </ul>
                            <a href="#">
                                <h3>{{$post->title}}</h3>
                            </a>
                            <ul class="meta pb-20">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{ $post->user->name }}</a></li>
                                <li><a href="#">{{ jdate($post->created_at)->format('%B %d، %Y')  }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#">{{ $post->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                            <p>
                                {!! $post->body !!}
                            </p>

                            <div class="navigation-wrap justify-content-between d-flex">
                                <a class="prev" href="#"><span class="lnr lnr-arrow-right"></span>خبر بعدی</a>
                                <a class="next" href="#">خبر قبلی<span class="lnr lnr-arrow-left"></span></a>
                            </div>

                            <div class="comment-sec-area">
                                <div class="container">
                                    <div class="row flex-column">
                                        <h6>نظرات</h6>
                                        <div class="comment-list">

                                            @forelse ($post->comments()->approved()->get() as $comment )

                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">

                                                    <div class="desc">
                                                        <h5><a href="#">{{$comment->user->name}} </a></h5>
                                                        <p class="date mt-3">{{ jdate($comment->created_at)->format('%B %d، %Y') }}</p>
                                                        <p class="comment">
                                                            {{ $comment->comment }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            @empty
                                            نظری برای این پست یافت نشد
                                            @endforelse

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>



                        @auth


                        <div class="comment-form">

                            <h4>درج نظر جدید</h4>


                            <form action="{{ route('comment.store', $post->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <textarea class="form-control mb-10" rows="5" name="comment" placeholder="متن نظر" onfocus="this.placeholder = ''" onblur="this.placeholder = 'متن نظر'" required=""></textarea>
                                </div>
                                <button class="primary-btn text-uppercase">ارسال</button>
                            </form>

                        </div>
                        @endauth
                        @guest
                        <p>جهت ثبت نظر باید در سایت
                    <a href="{{ route('register') }}" class="primary-btn text-uppercase">عضو شوید</a>

                            و یا
                    <a href="{{ route('login') }}" class="primary-btn text-uppercase"> وارد سایت</a>

                             شده باشید</p>



                        @endguest
                    </div>
                    <!-- End single-post Area -->
                </div>
              @include('app.layouts.partials.side-bar')
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>

@endsection
