@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('city') }}</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required autofocus>

                                @if ($errors->has('city'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('phone') }}</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autofocus>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <div class="radio" name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
                                    <label><input id="type" type="radio" name="type"  value=0>User</label>

                                </div>
                                <div class="radio" name="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
                                    <label><input type="radio" name="type"   value=1>Company</label>
                                </div>
                            </div>
                            @if ($errors->has('type'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                            @endif

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        {{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}

{{--<head>--}}
    {{--<!-- Required meta tags-->--}}
    {{--<meta charset="UTF-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">--}}



    {{--<!-- Icons font CSS-->--}}
    {{--<link href="{{asset('vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">--}}
    {{--<link href="{{asset('vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet')}}" media="all">--}}
    {{--<!-- Font special for pages-->--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">--}}

    {{--<!-- Vendor CSS-->--}}
    {{--<link href="{{asset('vendor/select2Reg/select2.min.css')}}" rel="stylesheet" media="all">--}}
    {{--<link href="{{asset('vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">--}}

    {{--<!-- Main CSS-->--}}
    {{--<link href="{{asset('css/Regmain.css')}}" rel="stylesheet" media="all">--}}
{{--</head>--}}

{{--<body>--}}
{{--<div class="page-wrapper bg-gra-02 p-t-130 p-b-100  font-poppins">--}}
    {{--<div class="wrapper wrapper--w680">--}}
        {{--<div class="card card-4">--}}
            {{--<div class="card-body">--}}
                {{--<h2 class="title">Registration Form</h2>--}}
                {{--<form method="POST">--}}
                    {{--<div class="row row-space">--}}
                        {{--<div class="col-2">--}}
                            {{--<div class="input-group">--}}
                                {{--<label class="label">Name</label>--}}
                                {{--<input class="input--style-4" type="text" name="Name">--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    {{--</div>--}}
                    {{--<div class="row row-space">--}}
                        {{--<div class="col-2">--}}
                            {{--<div class="input-group">--}}
                                {{--<label class="label">Birthday</label>--}}
                                {{--<div class="input-group-icon">--}}
                                    {{--<input class="input--style-4 js-datepicker" type="text" name="birthday">--}}
                                    {{--<i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-2">--}}
                            {{--<div class="input-group">--}}
                                {{--<label class="label">Gender</label>--}}
                                {{--<div class="p-t-10">--}}
                                    {{--<label class="radio-container m-r-45">Male--}}
                                        {{--<input type="radio" checked="checked" name="gender">--}}
                                        {{--<span class="checkmark"></span>--}}
                                    {{--</label>--}}
                                    {{--<label class="radio-container">Female--}}
                                        {{--<input type="radio" name="gender">--}}
                                        {{--<span class="checkmark"></span>--}}
                                    {{--</label>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="row row-space">--}}
                        {{--<div class="col-2">--}}
                            {{--<div class="input-group">--}}
                                {{--<label class="label">Email</label>--}}
                                {{--<input class="input--style-4" type="email" name="email">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="col-2">--}}
                            {{--<div class="input-group">--}}
                                {{--<label class="label">Phone Number</label>--}}
                                {{--<input class="input--style-4" type="text" name="phone">--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="input-group">--}}
                        {{--<label class="label">Subject</label>--}}
                        {{--<div class="rs-select2 js-select-simple select--no-search">--}}
                            {{--<select name="subject">--}}
                                {{--<option disabled="disabled" selected="selected">Choose option</option>--}}
                                {{--<option>Subject 1</option>--}}
                                {{--<option>Subject 2</option>--}}
                                {{--<option>Subject 3</option>--}}
                            {{--</select>--}}
                            {{--<div class="select-dropdown"></div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="p-t-15">--}}
                        {{--<button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>--}}
                    {{--</div>--}}
                {{--</form>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

{{--<!-- Jquery JS-->--}}
{{--<script src="{{asset('vendor/jqueryReg/jquery.min.js')}}"></script>--}}
{{--<!-- Vendor JS-->--}}
{{--<script src="{{asset('vendor/select2Reg/select2.min.js')}}"></script>--}}
{{--<script src="{{asset('vendor/datepicker/moment.min.js')}}"></script>--}}
{{--<script src="{{asset('vendor/datepicker/daterangepicker.js')}}"></script>--}}

{{--<!-- Main JS-->--}}
{{--<script src="{{asset('js/global.js')}}"></script>--}}

{{--</body>--}}

{{--</html>--}}
<!-- end document-->

@endsection
