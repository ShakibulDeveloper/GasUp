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

<!-- <div class="container">

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



                <div class="form-group row">

                    <div class="col-md-6 offset-md-4">

                        <div class="form-check">

                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>



                            <label class="form-check-label" for="remember">

                                {{ __('Remember Me') }}

                            </label>

                        </div>

                    </div>

                </div>



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

</div> -->





<div class="main_wrap">

    <div class="menu_btn">

        <i class="fa fa-bars"></i>

    </div>

    <div class="col-sm-3 left_sidebar">

       <!--  <div class="close_icon">

            <i class="fa fa-close"></i>

        </div> -->

        <!-- <div class="main_logo">

            <img src="{{asset('assets/images/logo.png')}}">

        </div> -->

        <div class="main_nav">



            <!-- <ul>

                <li><a href="#" class="active"><svg viewBox="0 0 24 24"><path d="M7 3h9a3 3 0 0 1 3 3v13a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3zm0 1a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H7zm0 1h9a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1zm0 1v12h9V6H7zm2 2h5v1H9V8zm0 3h5v1H9v-1zm0 3h3v1H9v-1z" fill="#fff"/></svg> Gas Up Sales</a></li>

                <li>

                    <a href="#"> 

                        <svg  viewBox="0 0 24 24"><path d="M16 18a2 2 0 1 1 0 4a2 2 0 0 1 0-4zm0 1a1 1 0 1 0 0 2a1 1 0 0 0 0-2zm-9-1a2 2 0 1 1 0 4a2 2 0 0 1 0-4zm0 1a1 1 0 1 0 0 2a1 1 0 0 0 0-2zM18 6H4.273l2.547 6H15a.994.994 0 0 0 .8-.402l3-4h.001A1 1 0 0 0 18 6zm-3 7H6.866L6.1 14.56L6 15a1 1 0 0 0 1 1h11v1H7a2 2 0 0 1-1.75-2.97l.72-1.474L2.338 4H1V3h2l.849 2H18a2 2 0 0 1 1.553 3.26l-2.914 3.886A1.998 1.998 0 0 1 15 13z" fill="#fff"/></svg> Order

                    </a>

                </li>

                <li>

                    <a href="#"><svg viewBox="0 0 24 24"><path d="M11.5 14c4.142 0 7.5 1.567 7.5 3.5V20H4v-2.5c0-1.933 3.358-3.5 7.5-3.5zm6.5 3.5c0-1.38-2.91-2.5-6.5-2.5S5 16.12 5 17.5V19h13v-1.5zM11.5 5a3.5 3.5 0 1 1 0 7a3.5 3.5 0 0 1 0-7zm0 1a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5z" fill="#fff"/></svg> Customer Overview 



                    </a>

                </li>

                <li><a href="#"><svg  viewBox="0 0 24 24"><path d="M5.5 14a2.5 2.5 0 0 1 2.45 2H15V6H4a2 2 0 0 0-2 2v8h1.05a2.5 2.5 0 0 1 2.45-2zm0 5a2.5 2.5 0 0 1-2.45-2H1V8a3 3 0 0 1 3-3h11a1 1 0 0 1 1 1v2h3l3 3.981V17h-2.05a2.5 2.5 0 0 1-4.9 0h-7.1a2.5 2.5 0 0 1-2.45 2zm0-4a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3zm12-1a2.5 2.5 0 0 1 2.45 2H21v-3.684L20.762 12H16v2.5a2.49 2.49 0 0 1 1.5-.5zm0 1a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3zM16 9v2h4.009L18.5 9H16z" fill="#fff"/></svg> Courier Overview</a></li>

                <li><a href="#"><svg  viewBox="0 0 24 24"><path d="M5 3h6a3 3 0 0 1 3 3v4h-1V6a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-4h1v4a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V6a3 3 0 0 1 3-3zm3 9h11.25L16 8.75l.664-.75l4.5 4.5l-4.5 4.5l-.664-.75L19.25 13H8v-1z" fill="#fff"/></svg> Log Out</a></li>

            </ul> -->

        </div>

    </div>

    <div class="col-sm-9 right_contents">

        <div class="main_inner_content">

            <div class="login_bg">

                <form method="POST" action="{{ route('new_register') }}">

                        @csrf
                        
                        <div class="login_page">
                            <img src="{{asset('assets/images/Gas_Up_Logo.png')}}">
                            <h4 style="margin: 0 0 17px;">Sign Up</h4>
                            <p>Please fill this form to create an account</p>
                        </div>
                        <div class="form_box">
                        <input type="text" placeholder="Email" id="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required="required" autocomplete="email" autofocus>
                        <svg  viewBox="0 0 24 24"><path d="M21 9v9a3 3 0 0 1-3 3H5a3 3 0 0 1-3-3V9c0-1.11.603-2.08 1.5-2.598l-.003-.004l8.001-4.62l8.007 4.623l-.001.003A2.999 2.999 0 0 1 21 9zM3.717 7.466L11.5 12.52l7.783-5.054l-7.785-4.533l-7.781 4.533zm7.783 6.246L3.134 8.28A1.995 1.995 0 0 0 3 9v9a2 2 0 0 0 2 2h13a2 2 0 0 0 2-2V9c0-.254-.047-.497-.134-.72L11.5 13.711z" fill="#626262"/></svg>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form_box">
                        <input type="password" placeholder="Password" name="password" value="" class="form-control @error('password') is-invalid @enderror" required="required" id="password" required autocomplete="current-password">
                        <svg  viewBox="0 0 24 24"><path fill-opacity=".886" d="M16 8a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3v-8a3 3 0 0 1 3-3V6.5a4.5 4.5 0 1 1 9 0V8zM7 9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2H7zm8-1V6.5a3.5 3.5 0 0 0-7 0V8h7zm-3.5 6a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3zm0-1a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5z" fill="#626262"/></svg>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form_box">
                        <input type="password" placeholder="Confirm Password" name="password_confirmation" value="" class="form-control @error('password_confirmation') is-invalid @enderror" required="required" id="password_confirmation" required autocomplete="current-password">
                        <svg  viewBox="0 0 24 24"><path fill-opacity=".886" d="M16 8a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H7a3 3 0 0 1-3-3v-8a3 3 0 0 1 3-3V6.5a4.5 4.5 0 1 1 9 0V8zM7 9a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2v-8a2 2 0 0 0-2-2H7zm8-1V6.5a3.5 3.5 0 0 0-7 0V8h7zm-3.5 6a1.5 1.5 0 1 0 0 3a1.5 1.5 0 0 0 0-3zm0-1a2.5 2.5 0 1 1 0 5a2.5 2.5 0 0 1 0-5z" fill="#626262"/></svg>

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="login_btn">
                            <a class="register_btn" href="javascript:;" onclick="resetAll()">{{ __('RESET') }}</a>
                        <button type="submit">
                            {{ __('SUBMIT') }}
                        </button>
                    </div>
                    </div>

                    </form>

            </div>

        </div>

    </div>

</div>

@endsection

