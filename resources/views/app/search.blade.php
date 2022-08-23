@extends('app.layouts.master')
@section('title')
سرچ
@endsection
@section('content')
</div>
@include('app.layouts.partials.side-bar')
</div>

    @forelse($searched_posts as $searched_post)

<p>{{ $searched_post->title }}</p>
@empty

<p>No posts</p>

@endforelse





@endsection
