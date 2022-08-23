@extends('admin.layouts.master')
@section('title')
آپدیت دسته بندی
@endsection
@section('content')


<section class="pt-3 pb-1 mb-2 border-bottom">
    <h1 class="h5">Edit User</h1>
</section>

<section class="row my-3">
<section class="col-12">

    <form method="post" action="{{ route('admin.user.update', $user->id) }}" >
        @csrf
        @method('put')
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $user->username) }}" placeholder="Enter title ...">
    </div>
    @error('username')
    <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror

    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email"  value="{{ old('email' ,$user->email) }}" placeholder="Enter title ..." >
    </div>
    @error('email')
    <span class="alert_required bg-danger text-white p-2 mt-3 rounded" role="alert">
        <strong>
            {{ $message }}
        </strong>
    </span>
    @enderror

    {{-- <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" id="password" name="password"  value="{{ old('password' , $user->password) }}" placeholder="Enter title ..." >
    </div> --}}


    <div class="form-group">
        <label for="permission">permission</label>
        <select name="permission"  value="{{ old('permission' , $user->permission) }}" id="permission" class="form-control" required autofocus>
                    <option value="0" >User</option>
                    <option value="1" >Admin</option>
            </select>
    </div>
    @error('permission')
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

