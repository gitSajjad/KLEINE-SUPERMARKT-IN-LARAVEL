@extends('admin.layouts.master')
@section('title')
اپدیت
@endsection
@section('styles')
<link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Edit Article</h1>
</section>
<section class="row my-3">
    <section class="col-12">

        <form method="post" action="{{ route('admin.post.update',$post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title',$post->title) }}" placeholder="Enter title ..." value="">
        </div>
        @error('Title')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

        <div class="form-group">
            <label for="cat_id">Category</label>
            <select name="cat_id" id="cat_id" class="form-control" required autofocus>


                @foreach ($categories as $category )

                <option @if (old('cat_id', $post->cat_id) == $category->id )
                    selected
                @endif
                value="{{ $category->id }}">
                   {{ $category->name}}
                </option>

                @endforeach
            </select>

        </div>


        <div class="form-group">
            <img style="width: 100px;" src="{{ asset($post->image) }}" alt="">
                <hr/>
                <label for="image">Image</label>
                <input type="file" id="image" name="image" class="form-control-file" autofocus>
        </div>
        @error('image')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

        <div class="form-group">
            <label for="video">video</label>
            <input type="file" id="video" name="video"  class="form-control-file"  autofocus>
            <video width="320" height="240" controls>
                <source src="{{ asset($post->video) }}" type="video/mp4">
              </video>

        </div>
        @error('video')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

        <div class="form-group">
            <label for="published_at">published at</label>
            <input type="text" class="form-control d-none" id="published_at" name="published_at"  required autofocus>
            <input type="text" class="form-control" id="published_at_view" value="{{ $post->published_at }}" required autofocus>
        </div>
        @error('published_at')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

        <div class="form-group">
            <label for="summary">summary</label>
            <textarea class="form-control" id="summary" name="summary"  value="{{ old('summary', $post->summary) }}" placeholder="summary ..." rows="3">ss</textarea>
        </div>
        @error('summary')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror
        <div class="form-group">
            <label for="body">body</label>
            <textarea class="form-control" id="body" name="body" value="{{ old('body' , $post->body) }}" placeholder="body ..." rows="5">sss</textarea>
        </div>
        @error('body')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror
        <button type="submit" class="btn btn-primary btn-sm">update</button>
        </form>
        </section>
        </section>

@endsection

@section('scripts')
<script src="{{ asset('jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('jalalidatepicker/persian-datepicker.min.js') }}"></script>
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        CKEDITOR.replace('body');
        CKEDITOR.replace('summary');
        $('#published_at_view').persianDatepicker({
            observer: true,
            toolbox:{
            calendarSwitch:{
           enabled: true
             }
             },
            format: 'YYYY/MM/DD HH:mm:ss',
             altField: '#published_at'
        })
    })
</script>
@endsection
