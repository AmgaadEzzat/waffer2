
{{--<div >--}}
    {{--<div>--}}
        {{--<div >--}}

            {{--<!-- Modal Header -->--}}


            {{--<!-- Modal body -->--}}
            {{--<div class="modal-body">--}}
                {{--<form action="update" method="post">--}}
                    {{--{{csrf_field()}}--}}

                    {{--<input type="text" value="{{$idd->productName}}" name="productName"/>--}}
                    {{--<input type="number" value="{{$idd->productPrice}}" name="productPrice"/>--}}
                    {{--<input type="text" value="{{$idd->productAddress}}"name="productAddress"/>--}}

                    {{--<textarea value="{{$idd->productDescription}}" name="productDescription">{{$idd->productDescription}}</textarea>--}}
                    {{--<select  name="catId">--}}

                        {{--@foreach($catName as $catname)--}}
                            {{--<option value="{{$idd->catId}}">{{$catname->categoryName}}</option>--}}
                            {{--<input type="hidden" value="{{$idd->userId}}" name="userId"/>--}}
                        {{--@endforeach--}}
                    {{--</select>--}}
                    {{--<input type="file" value="{{$idd->productImage}}" name="productImage">{{$idd->productImage}}</input>--}}

                    {{--<button onclick="return confirm ('Are You Sure You want to delete ! ');" class="btn btn-primary">update</button>--}}
                {{--</form>--}}
            {{--</div>--}}

            {{--<!-- Modal footer -->--}}


        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}

@extends('admin.master')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header" style="background: #2ed8b6   ">{{ __('Update Product') }}</div>

                    <div class="card-body">
                        <form method="POST" action="update" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-left">{{ __('productName') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control{{ $errors->has('productName') ? ' is-invalid' : '' }}" name="productName" value="{{$idd->productName}}" required autofocus>

                                    @if ($errors->has('productName'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="Product Price" class="col-md-4 col-form-label text-md-left">{{ __('productPrice') }}</label>

                                <div class="col-md-6">
                                    <input id="Product Price" type="number" class="form-control{{ $errors->has('productPrice') ? ' is-invalid' : '' }}" name="productPrice" value="{{$idd->productPrice}}" required>

                                    @if ($errors->has('productPrice'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productPrice') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="productAddress" class="col-md-4 col-form-label text-md-left">{{ __('where you bought it') }}</label>

                                <div class="col-md-6">
                                    <input id="productAddress" type="text" class="form-control{{ $errors->has('productAddress') ? ' is-invalid' : '' }}" name="productAddress" value="{{$idd->productAddress}}" required autofocus>

                                    @if ($errors->has('productAddress'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productAddress') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="productDescription" class="col-md-4 col-form-label text-md-left">{{ __('Product Description') }}</label>
                                <div class="col-md-6">
                                    <input id="productDescription" type="text" class="form-control{{ $errors->has('productDescription') ? ' is-invalid' : '' }}" name="productDescription" value="{{$idd->productDescription}}" required autofocus>
                                    @if ($errors->has('productDescription'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productDescription') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="productImage" class="col-md-4 col-form-label text-md-left">{{ __('Image for Product') }}</label>
                                <div class="col-md-6">
                                    <input type="file"  name="productImage" value="{{$idd->productImage}}" id="productImage" accept="image/*"  class="{{ $errors->has('productImage') ? ' is-invalid' : '' }}" required>
                                    {{--<input id="productImage" type="file" value="Abload File" class="form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" name="productImage" required autofocus>--}}
                                    @if ($errors->has('productImage'))
                                        <span class="invalid-feedback" role="alert">
                                         <strong>{{ $errors->first('productImage') }}</strong>
                                                                         </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row  ">
                                <label for="type" class="col-md-4 col-form-label text-md-left"></label>
                                <div class="col-md-6 ">

                                    <label for="sel1">Category Name:</label>
                                    <span class="form-group" name="catId">
                                    <select class="form-control" id="sel1" name="catId">
                                        @foreach($catName as $catname)
                                            <option value="{{$idd->catId}}" name="catId" >{{$catname->categoryName}}</option>
                                        @endforeach
                                    </select>

                                </span>

                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" onclick="return confirm ('Are You Sure You want to edit ! ');"  class="btn text-white" style="background-color: #ffb64d">
                                        {{ __('update') }}
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