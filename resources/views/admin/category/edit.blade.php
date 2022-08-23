@extends('admin.layouts.master')
@section('title')
آپدیت دسته بندی
@endsection
@section('content')

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Edit Category</h1>
</section>

<section class="row my-3">
<section class="col-12">
    <form method="post" action="{{ route('admin.category.update',$category->id) }}">
        @csrf
        @method('put')
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{ old('name',$category->name) }}">
            <!--            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    </div>
    @error('name')
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

