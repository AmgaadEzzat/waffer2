@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #17a2b8">{{ __('Add New Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/addCategory" >
                            @csrf
                            <div class="form-group row">
                                <label for="catname" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                    <input id="catname" type="text" class="form-control{{ $errors->has('categoryName') ? ' is-invalid' : '' }}" name="categoryName" value="{{ old('categoryName') }}" required autofocus>

                                    @if ($errors->has('categoryName'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoryName') }}</strong>
                                    </span>
                                    @endif
                                        {{--@if(session('alert'))--}}
                                            {{--<div class="alert alert-success">--}}
                                                {{--{{session('alert')}}--}}
                                            {{--</div>--}}
                                        {{--@endif--}}

                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



