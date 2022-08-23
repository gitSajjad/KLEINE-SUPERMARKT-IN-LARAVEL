@extends('admin.layouts.master')
@section('title')
ایجاد دسته بندی
@endsection
@section('content')


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Create Menu</h1>
</section>

<section class="row my-3">
<section class="col-12">
    <form method="post" action="{{ route('admin.menu.store') }}">
        @csrf
            <div class="form-group">
                <label for="name">نام</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" placeholder="Enter name ..." required>
            </div>
            @error('name')
            <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
                <strong>
                    {{ $message }}
                </strong>
            </span>
            @enderror

            <div class="form-group">
                <label for="url">مسیر</label>
                <input type="text" class="form-control" id="url" name="url" value="{{ old('name') }}" placeholder="Enter url ..." required>
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
                @foreach ($menus as $menu )
                <option value="{{ $menu->id }}">
                   {{ $menu->name }}
                </option>

                @endforeach


                </select>
    </div>

    <button type="submit" class="btn btn-primary btn-sm">store</button>
    </form>
    </section>
    </section>

    </main>
</div>
</div>
@endsection

