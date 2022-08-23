@extends('app.layouts.master')
@section('title')
Home
@endsection
@section('content')
<div class="site-main-container">

    <!-- Start top-post Area -->
    <section class="top-post-area pt-10">
        <div class="container no-padding">
            <div class="row small-gutters">
                @isset($topSelectedPosts[0])
                <div class="col-lg-8 top-post-left">
                    <div class="feature-image-thumb relative">
                        <div class="overlay overlay-bg"></div>

                        <img class="img-fluid" src="{{ asset($topSelectedPosts[0]->image) }}" alt="">
                    </div>
                    <div class="top-post-details">
                        <ul class="tags">
                            <li><a href="#">{{ $topSelectedPosts[0]->category->name }}</a></li>
                        </ul>
                        <a href="{{ route('show' , $topSelectedPosts[0]->id) }}">
                            <h3>{{ $topSelectedPosts[0]->title }}</h3>
                        </a>
                        <ul class="meta">
                            <li><a href="#"><span class="lnr lnr-user"></span>{{ $topSelectedPosts[0]->user->name }}</a></li>
                            <li><a href="#">{{ jdate($topSelectedPosts[0]->created_at)->format('%B %d، %Y')  }}<span class="lnr lnr-calendar-full"></span></a></li>
                            <li><a href="#">{{ $topSelectedPosts[0]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                        </ul>
                    </div>

                </div>
                @endisset


                <div class="col-lg-4 top-post-right">
                    @isset($topSelectedPosts[1])
                    <div class="single-top-post">
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset($topSelectedPosts[1]->image) }}" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="#">{{ $topSelectedPosts[1]->category->name }}</a></li>
                            </ul>
                            <a href="{{ route('show' , $topSelectedPosts[1]->id) }}">
                                <h4>{{ $topSelectedPosts[1]->title }}</h4>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{ $topSelectedPosts[1]->user->name }}</a></li>
                                <li><a href="#">{{ jdate($topSelectedPosts[1]->created_at)->format('%B %d، %Y')  }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#"> {{ $topSelectedPosts[1]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    @endisset
                    <div class="single-top-post mt-10">
                        @isset($topSelectedPosts[2])
                        <div class="feature-image-thumb relative">
                            <div class="overlay overlay-bg"></div>
                            <img class="img-fluid" src="{{ asset($topSelectedPosts[2]->image) }}" alt="">
                        </div>
                        <div class="top-post-details">
                            <ul class="tags">
                                <li><a href="#"> {{ $topSelectedPosts[2]->category->name }}</a></li>
                            </ul>
                            <a href="{{ route('show' , $topSelectedPosts[2]->id) }}">
                                <h4>{{ $topSelectedPosts[2]->title }}</h4>
                            </a>
                            <ul class="meta">
                                <li><a href="#"><span class="lnr lnr-user"></span>{{ $topSelectedPosts[2]->user->name }}</a></li>
                                <li><a href="#">{{ jdate($topSelectedPosts[2]->created_at)->format('%B %d، %Y')  }}<span class="lnr lnr-calendar-full"></span></a></li>
                                <li><a href="#">{{ $topSelectedPosts[2]->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                            </ul>
                        </div>
                    </div>
                    @endisset
                </div>



                @isset($breaking_news)
                <div class="col-lg-12">
                    <div class="news-tracker-wrap">
                        <h6><span>خبر فوری:</span> <a href="#">{{ $breaking_news->title }}</a></h6>
                    </div>
                </div>
                @endisset
            </div>
        </div>
    </section>
    <!-- End top-post Area -->
    <!-- Start latest-post Area -->
    <section class="latest-post-area pb-120">
        <div class="container no-padding">
            <div class="row">
                <div class="col-lg-8 post-list">
                    <!-- Start latest-post Area -->
                    <div class="latest-post-wrap">
                        <h4 class="cat-title">آخرین اخبار</h4>

                        @foreach ($last_posts as $last_post)

                        <div class="single-latest-post row align-items-center">
                            <div class="col-lg-5 post-left">
                                <div class="feature-img relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluid" src="{{ asset($last_post->image) }}" alt="">
                                </div>
                                <ul class="tags">
                                    <li><a href="#">{{ $last_post->category->name }} </a></li>
                                </ul>
                            </div>
                            <div class="col-lg-7 post-right">
                                <a href="{{ route('show' , $last_post->id) }}">
                                    <h4>{{ $last_post->title }}</h4>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{ $last_post->user->name }}</a></li>
                                    <li><a href="#">{{ jdate($last_post->created_at)->format('%B %d، %Y') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#"> {{ $last_post->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>

                            </div>
                        </div>

                        @endforeach


                    </div>
                    <!-- End latest-post Area -->

                    <!-- Start banner-ads Area -->
                    <div class="col-lg-12 ad-widget-wrap mt-30 mb-30">
                        <img class="img-fluid" src="img/banner-ad.jpg" alt="">
                    </div>
                    <!-- End banner-ads Area -->
                    <!-- Start popular-post Area -->
                    <div class="popular-post-wrap">
                        <h4 class="title">اخبار پربازدید</h4>

                        @isset($popular_posts[0])
                        <div class="feature-post relative">
                            <div class="feature-img relative">
                                <div class="overlay overlay-bg"></div>
                                <img class="img-fluid" src="{{ asset($popular_posts[0]->image) }}" alt="">
                            </div>
                            <div class="details">
                                <ul class="tags">
                                    <li><a href="#"> {{ $popular_posts[0]->category->name }}</a></li>
                                </ul>
                                <a href="{{ route('show' , $popular_posts[0]->id) }}">
                                    <h3>{{ $popular_posts[0]->title }}</h3>
                                </a>
                                <ul class="meta">
                                    <li><a href="#"><span class="lnr lnr-user"></span>{{$popular_posts[0]->user->name}}</a></li>
                                    <li><a href="#">{{ jdate( $popular_posts[0]->created_at)->format('%B %d، %Y') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                    <li><a href="#">{{   $popular_posts[0]->comments->count()}}<span class="lnr lnr-bubble"></span></a></li>
                                </ul>
                            </div>
                        </div>
                        @endisset


                        <div class="row mt-20 medium-gutters">
                        @isset($popular_posts[1])

                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="{{ asset($popular_posts[1]->image) }}" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">{{ $popular_posts[1]->category->name }} </a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="{{ route('show' , $popular_posts[1]->id) }}">
                                        <h4>{{ $popular_posts[1]->title }}</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>{{$popular_posts[1]->user->name}}</a></li>
                                        <li><a href="#">{{ jdate( $popular_posts[1]->created_at)->format('%B %d، %Y') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#"> {{   $popular_posts[1]->comments->count()}}<span class="lnr lnr-bubble"></span></a></li>
                                    </ul>

                                </div>
                            </div>

                        @endisset

                        @isset($popular_posts[2])
                            <div class="col-lg-6 single-popular-post">
                                <div class="feature-img-wrap relative">
                                    <div class="feature-img relative">
                                        <div class="overlay overlay-bg"></div>
                                        <img class="img-fluid" src="{{ asset($popular_posts[2]->image) }}" alt="">
                                    </div>
                                    <ul class="tags">
                                        <li><a href="#">{{ $popular_posts[2]->category->name }} </a></li>
                                    </ul>
                                </div>
                                <div class="details">
                                    <a href="{{ route('show' , $popular_posts[1]->id) }}">
                                        <h4>{{ $popular_posts[2]->title }}</h4>
                                    </a>
                                    <ul class="meta">
                                        <li><a href="#"><span class="lnr lnr-user"></span>{{$popular_posts[2]->user->name}}</a></li>
                                        <li><a href="#">{{ jdate( $popular_posts[2]->created_at)->format('%B %d، %Y') }}<span class="lnr lnr-calendar-full"></span></a></li>
                                        <li><a href="#">{{   $popular_posts[2]->comments->count()}}<span class="lnr lnr-bubble"></span></a></li>
                                    </ul>

                                </div>
                            </div>
                            @endisset
                        </div>
                    </div>
                    <!-- End popular-post Area -->
                </div>
                @include('app.layouts.partials.side-bar')
            </div>
        </div>
    </section>
    <!-- End latest-post Area -->
</div>


@endsection
