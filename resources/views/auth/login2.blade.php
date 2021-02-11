<style>
    .justify-content-center{
        max-width: 400px;
        margin: 107px auto 0 !important;
        background: #fff;
        padding: 23px 17px;
        border-radius: 4px;
    }
    input{
        height: 45px;
    }
    .navbar{
        display: none !important;
    }
    a:hover{
        text-decoration: none !important;
    }
    body{
        background: url("{{asset('assets/backend/images/slide10257854.jpg')}}");
        background-size: cover;
        background-position: center center;
    }
</style>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="POST" action="{{ route('login') }}">
                        @csrf


                        <div class="form-group row">

                            <div class="col-md-12">
                            <label for="email">Email/Username</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                            <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> -->

                        <div class="form-group row ">
                            <div class="col-md-12">

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="display: block;text-align: center; color: #e35e6a;font-weight: 600;margin-bottom: 14px; font-size: 15px;">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                <button type="submit" class="btn btn-primary" style="font-size: 18px;cursor: pointer;padding: 12px 79px;display: inline-block;font-weight: 500;border-radius: 4px;border: none;width: 100%;background: linear-gradient(to right, #6a11cb 0%, #2576fd 100%);color: #fff;">
                                    {{ __('Login') }}
                                </button>

                                <hr>
                                <p class="text-center">Or</p>
                                <hr>
                                <div class="form-group row">

                                    <div class="col-md-12">
                                        <a href="{{ url('auth/facebook') }}" class="btn btn-primary btn-block">Login with Facebook</a>
                                        <a href="{{ url('auth/google') }}" class="btn btn-danger btn-block">Login with Google</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection
