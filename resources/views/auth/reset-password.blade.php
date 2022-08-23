@extends('auth.layouts.master')

@section('title')
reset password
@endsection


@section('countent')

<form method="post" action="{{ route('password.update') }}" class="login100-form validate-form">
@csrf
    <input  type="hidden" value="{{ $request->route('token') }}" name="token">
    <span class="login100-form-title">
        Reset Password
    </span>

    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="email" name="email" value="{{ $request->email }}" placeholder="email">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>

    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="password" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>


    <div class="wrap-input100 validate-input" data-validate="Password is required">
        <input class="input100" type="password" name="password_confirmation" placeholder="Password">
        <span class="focus-input100"></span>
        <span class="symbol-input100">
            <i class="fa fa-lock" aria-hidden="true"></i>
        </span>
    </div>

    <div class="container-login100-form-btn">
        <button type="submit" class="login100-form-btn">
            Send
        </button>
    </div>

    <div class="text-center p-t-12">
        <span class="txt1">
            Forgot
        </span>
        <a class="txt2" href="#">
            Username / Password?
        </a>
    </div>

    <div class="text-center p-t-136">
        <a class="txt2" href="#">
            Login your Account
            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
        </a>
    </div>
</form>
@endsection
