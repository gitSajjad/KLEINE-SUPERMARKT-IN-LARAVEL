@extends('admin.layouts.master')
@section('title')
ایجاد یک پست جدید
@endsection
@section('styles')
<link href="{{ asset('jalalidatepicker/persian-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection
@section('content')


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create Article</h1>
</section>

<section class="row my-3">
    <section class="col-12">

        <form method="post" action="{{ route('admin.post.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" placeholder="Enter title ..." required autofocus>
                </div>
                @error('title')
                <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
                    <strong>
                        {{ $message }}
                    </strong>
                </span>
                @enderror

                <div class="form-group">
                    <label for="cat_id">Category</label>
                    <select name="cat_id"  id="cat_id" class="form-control" required autofocus>

                        @foreach ($categories as $category )

                        <option @if (old('cat_id') == $category->id )
                            selected
                        @endif
                        value="{{ $category->id }}">
                           {{ $category->name}}
                        </option>

                        @endforeach



                    </select>
        </div>
        @error('cat_id')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control-file" required autofocus>
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
            <input type="file" id="video" name="video" class="form-control-file" required autofocus>
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
            <input type="text" class="form-control d-none" id="published_at" name="published_at" required autofocus>
            <input type="text" class="form-control" id="published_at_view" required autofocus>
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
            <textarea class="form-control" id="summary" name="summary"  placeholder="summary ..." rows="3" required autofocus>{{ old('summary') }}</textarea>
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
            <textarea class="form-control" id="body" name="body" placeholder="body ..." rows="5" required autofocus>{{ old('body') }}</textarea>
        </div>
        @error('body')
        <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
            <strong>
                {{ $message }}
            </strong>
        </span>
        @enderror

        <button type="submit" class="btn btn-primary btn-sm">store</button>
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

