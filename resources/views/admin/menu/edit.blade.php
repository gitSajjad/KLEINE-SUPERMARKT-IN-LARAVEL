@extends('admin.layouts.master')
@section('title')
آپدیت دسته بندی
@endsection
@section('content')


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Edit Menu</h1>
</section>

<section class="row my-3">
<section class="col-12">
    <form method="post" action="{{ route('admin.menu.update',$menu->id) }}">
        @csrf
        @method('put')

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name ..." value="{{ old('name',$menu->name) }}" required>
    </div>
    @error('name')
    <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror

    <div class="form-group">
        <label for="url">url</label>
        <input type="text" class="form-control" id="url" name="url" placeholder="Enter url ..." value="{{ old('url',$menu->url) }}" required>
    </div>
    @error('url')
    <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror

    <div class="form-group">
        <label for="parent_id">parent ID</label>
        <select name="parent_id" id="parent_id" class="form-control" autofocus>
            <option value="">منوی اصلی </option>
                @foreach ($parents as $parent )
                <option value="{{ $parent->id }}">
                   {{ $parent->name }}
                </option>

                @endforeach

                </select>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">update</button>
    </form>
    </section>
    </section>



    </main>
</div>
</div>

@endsection

