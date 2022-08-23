@extends('admin.layouts.master')
@section('title')
ایجاد دسته بندی
@endsection
@section('content')

<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create Category</h1>
</section>
<section class="row my-3">
    <section class="col-12">
        <form method="post" action="{{ route('admin.category.store') }}">
            @csrf
    <div class="form-group">
        <label for="name">Title</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name ...">
    </div>
    @error('name')
    <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror

    <button type="submit" class="btn btn-primary btn-sm">store</button>
    </form>
    </section>
@endsection

