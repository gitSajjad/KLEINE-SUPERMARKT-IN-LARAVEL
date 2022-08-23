<div class="col-lg-4 ">
    <div class="sidebars-area ">
        <div class="single-sidebar-widget editors-pick-widget">
            <h6 class="title ">انتخاب سردبیر</h6>
            @isset($selectedPost)
            <div class="editors-pick-post">

                <div class="feature-img-wrap relative">
                    <div class="feature-img relative">
                        <div class="overlay overlay-bg"></div>
                        <img class="img-fluid" src="{{ asset($selectedPost->image) }}" alt="">
                    </div>
                    <ul class="tags">
                        <li><a href="#">{{ $selectedPost->category->name }} </a></li>
                    </ul>
                </div>
                <div class="details">
                    <a href="{{ route('show' , $selectedPost->id) }}">
                        <h4 class="mt-20">{{ $selectedPost->title }}</h4>
                    </a>
                    <ul class="meta">
                        <li><a href="#"><span class="lnr lnr-user"></span>{{ $selectedPost->user->name }}</a></li>
                        <li><a href="#">{{ jdate( $selectedPost->created_at)->format('%B %d، %Y') }}<span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="#">{{ $selectedPost->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                    </ul>

                </div>
            </div>
            @endisset
        </div>

        @isset($sideBarBanner)
        <div class="single-sidebar-widget ads-widget">
            <img class="img-fluid" src="{{ asset($sideBarBanner->image) }}" alt="">
        </div>
        @endisset






        <div class="single-sidebar-widget most-popular-widget">
            <h6 class="title">پر بحث ترین ها</h6>
            @foreach ($mostCommentedPosts as $mostCommentedPost )
            <div class="single-list flex-row d-flex">
                <div class="thumb">
                    <img style="width: 100%" src="{{ asset($mostCommentedPost->image) }}" alt="">
                </div>
                <div class="details">
                    <a href="{{ route('show' , $mostCommentedPost->id) }}">
                        <h6> {{ $mostCommentedPost->title }} </h6>
                    </a>
                    <ul class="meta">
                        <li><a href="#">{{ jdate( $mostCommentedPost->created_at)->format('%B %d، %Y') }}<span class="lnr lnr-calendar-full"></span></a></li>
                        <li><a href="#">{{ $mostCommentedPost->comments->count() }}<span class="lnr lnr-bubble"></span></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>



    </div>
</div>
