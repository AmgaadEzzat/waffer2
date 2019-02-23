@extends('layouts.app')

@section('content')
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Register') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--<form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">--}}
                        {{--@csrf--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>--}}

                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>--}}

                                {{--@if ($errors->has('email'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('email') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>--}}

                                {{--@if ($errors->has('city'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('city') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>--}}

                                {{--@if ($errors->has('phone'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('phone') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}



                        {{--<div class="form-group row">--}}
                            {{--<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>--}}

                                {{--@if ($errors->has('password'))--}}
                                    {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('password') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                        {{--<div class="form-group row">--}}
                            {{--<label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="radio" name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">--}}
                                    {{--<label><input id="type" type="radio" name="type"  value=0>User</label>--}}

                                {{--</div>--}}
                                {{--<div class="radio" name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">--}}
                                    {{--<label><input type="radio" name="type"   value=1>Company</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--@if ($errors->has('type'))--}}
                                {{--<span class="invalid-feedback" role="alert">--}}
                                        {{--<strong>{{ $errors->first('type') }}</strong>--}}
                                    {{--</span>--}}
                            {{--@endif--}}

                        {{--</div>--}}

                        {{--<div class="form-group row mb-0">--}}
                            {{--<div class="col-md-6 offset-md-4">--}}
                                {{--<button type="submit" class="btn btn-primary">--}}
                                    {{--{{ __('Register') }}--}}
                                {{--</button>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('reg-css/style.css')}}">
</head>
<body >

<div class="main">

    <section class="signup">
        <!-- <img src="images/signup-bg.jpg" alt=""> -->
        <div class="container">
            <div class="signup-content">
                <form method="POST" id="signup-form" class="signup-form" onsubmit="return vaildResigter()" action="{{ route('register') }}" name="register" >
                    @csrf
                    <h2 class="form-title">Create account</h2>
                    <div class="form-group">
                        <input type="text"  name="name" class=" form-input form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"  id="name" value="{{ old('name') }}" placeholder="Your Name" required/>
                        @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="w-50 h-50" id="error_name" style="display: none "></div>

                    <div class="form-group ">
                        <input type="email" class=" form-input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"  name="email" id="email" value="{{ old('email') }}" placeholder="Your Email" required/>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="w-50 h-50" id="error_email" style="display: none "></div>

                    <div class="form-group">
                        <input type="text"  name="city" class="form-input form-control{{ $errors->has('city') ? ' is-invalid' : '' }}"  id="city" value="{{ old('city') }}" placeholder="Your City" required/>
                        @if ($errors->has('city'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('city') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="w-50 h-50" id="error_city" style="display: none "></div>
                    <div class="form-group">
                        <input type="text"  name="phone" class="form-input form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"  id="phone" value="{{ old('phone') }}" placeholder="Your Phone" required/>
                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="w-50 h-50" id="error_phone" style="display: none "></div>
                    <div class="form-group">
                        <input type="text" class="form-input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password" required/>
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="w-50 h-50" id="error_password" style="display: none "></div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password_confirmation" id="re_password" placeholder="Repeat your password"/>
                    </div>
                    <div class="form-group">
                        <span class="form-group" name="type">
                                    <select class="form-control" id="type" name="type" placeholder="Type">
                                        <option name="type" value=0>User</option>
                                         <option name="type" value=1>Company</option>
                                    </select>

                                </span>
                        @if ($errors->has('type'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('type') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="w-50 h-50" id="error_type" style="display: none "></div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="submit" class=" btn btn-info w-100" value="Sign up"/>
                    </div>
                </form>

                <p class="loginhere">
                    Have already an account ? <a href="login" class="loginhere-link">Login here</a>
                </p>
            </div>
        </div>
    </section>

</div>

<!-- JS -->
<script src="{{asset('vendor/reg-jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/reg-main.js')}}"></script>
{{--<script src-="{{asset('js/regvaild.js')}}"></script>--}}
</body>
</html>

@endsection
