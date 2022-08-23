@extends('admin.layouts.master')
@section('title')
صفحه اصلی
@endsection
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h5"><i class="fas fa-newspaper"></i> Users</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <a role="button" href="#" class="btn btn-sm btn-success disabled">create</a>
    </div>
</div>
<section class="table-responsive">
    <table class="table table-striped table-sm">
        <caption>List of users</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>username</th>
                <th>email</th>
                {{-- <th>password</th> --}}
                <th>permission</th>
                <th>created at</th>
                <th>setting</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                {{-- <td>{{ $user->password }}</td> --}}
                <td>{{ ($user->permission == 0) ? 'user' : 'admin' }}</td>
                <td>{{ jdate($user->created_at)->format('%B %d، %Y')}}</td>
                <td>


                    @if ($user->permission == 0)


                    <a role="button" class="btn btn-sm btn-success text-white" href="{{ route('admin.user.setting' , $user->id) }}">click to be admin</a>

                    @else
                    <a role="button" class="btn btn-sm btn-warning text-white" href="{{ route('admin.user.setting' , $user->id) }}">click not to be user</a>

                    @endif



            <a role="button" class="btn btn-sm btn-primary text-white" href="{{ route('admin.user.edit',$user->id) }}">edit</a>
            <form  class="d-inline delete" action="{{ route('admin.user.destroy',$user->id) }}" method="POST">

                @csrf
                @method('delete')

                <button class="btn btn-danger btn-sm">Delete</button>
             </form>
            </td>
            </tr>

            @endforeach

            </tbody>
            </table>
            </section>

            @include('alerts.sweetalert.delete-confirm' , ['className' => 'delete'])
@endsection
