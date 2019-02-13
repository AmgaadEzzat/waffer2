@extends('user.master')
@section('content')
    <div class= "container-fluid " >
        <div class="row">
        <div class="col-sm-3 m-3">
            <div class="profile">



@foreach($userData as $userData)
                <div class="main-container">
                    <p><i class="fas fa-briefcase info"></i>{{$userData->name}}</p>
                    <p><i class="fas fa-home info"></i>{{$userData->city}}</p>
                    <p><i class="fas fa-envelope info"></i>{{$userData->email}}</p>

                    <p><i class="fas fa-phone info"></i>{{$userData->phone}}</p>
                    <hr>

                   <a href="/profile/{{$userData->id}}/editUser" class="btn btn-outline-dark"> Edit Your Info</a>

                    </div>
    @endforeach

                </div>
            </div>

        <div class="col-sm-8 m-3">
            <div >
                <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist" style="background-color:darkcyan;">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#add-product" role="tab">Add product</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#show-product" role="tab">show products</a>


                </div>
            </div>
            <div class="tab-content " id="nav-tabContent">
                <div class="tab-pane fade show active" id="add-product" role="tabpanel" >

                    <div class="m-3" >

                                <div class="card">
                                    <div class="card-header" style="background: #3f9ae5">{{ __('Add New Product') }}</div>

                                    <div class="card-body">
                                        <form method="POST" action="insertProductByUser" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="name" class="col-sm-4 col-form-label text-md-left">{{ __('Product Name') }}</label>

                                                <div class="col-sm-6">
                                                    <input id="name" type="text" class="form-control{{ $errors->has('Product Name') ? ' is-invalid' : '' }}" name="productName" value="{{ old('Product Name') }}" required autofocus>

                                                    @if ($errors->has('Product Name'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Product Name') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="Product Price" class="col-sm-4 col-form-label text-md-left">{{ __('Product Price ') }}</label>

                                                <div class="col-sm-6">
                                                    <input id="Product Price" type="number" class="form-control{{ $errors->has('Product Price') ? ' is-invalid' : '' }}" name="productPrice" value="{{ old('Product Price') }}" required>

                                                    @if ($errors->has('Product Price'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Product Price') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="productAddress" class="col-sm-4 col-form-label text-md-left">{{ __('where you bought it') }}</label>

                                                <div class="col-sm-6">
                                                    <input id="productAddress" type="text" class="form-control{{ $errors->has('productAddress') ? ' is-invalid' : '' }}" name="productAddress" value="{{ old('productAddress') }}" required autofocus>

                                                    @if ($errors->has('productAddress'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productAddress') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="productDescription" class="col-sm-4 col-form-label text-md-left">{{ __('Product Description') }}</label>
                                                <div class="col-sm-6">
                                                    <input id="productDescription" type="text" class="form-control{{ $errors->has('productDescription') ? ' is-invalid' : '' }}" name="productDescription" value="{{ old('productDescription') }}" required autofocus>
                                                    @if ($errors->has('productDescription'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productDescription') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="productImage" class="col-sm-4 col-form-label text-md-left">{{ __('Image for Product') }}</label>
                                                <div class="col-sm-6">

                                                    <input id="productImage" type="file" value="Abload File" class="form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" name="productImage" required autofocus>
                                                    @if ($errors->has('productImage'))
                                                        <span class="invalid-feedback" role="alert">
                                        <input type="file" name="productImage" value="Abload File" >
                                    </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group row">
                                                <label for="type" class="col-sm-4 col-form-label text-md-left">{{ __('Category Name') }}</label>
                                                <div class="col-sm-6">
                                                    <div class="dropdown">


                                                        <button type="button" id="btncat" class="btn  dropdown-toggle" data-toggle="dropdown">
                                                          select Category
                                                        </button>
                                                        <div class="dropdown-menu">


                                                            @foreach($catName as $category)

                                                                <div class="dropdown-item border border-secondary   "  >
                                                                <input type="checkbox"  id="cat" name="catname" value="{{$category->categoryName}}" >
                                                                    {{$category->categoryName}}

                                                                </div>


                                                            @endforeach

                                                        </div>
                                                </div>

                                            </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-sm-6 offset-md-4">
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
                <div class="tab-pane fade" id="show-product" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row " id=bestsellerDiv>
                        @foreach($productForUser as $proUser)

                        <div class="col-sm-3 m-3 " >
                            <div class="crad border h-50  ">
                                <img src="/img/{{$proUser->productImage}}"  class="w-25 h-25 m-3">
                                <div class="card-body cardstyle w-75 h-50" >
                                    <a href="#"  class="m-4 text-center">  {{$proUser->productName}} </a>
                                    <br>
                                    <span class="small m-2  text-secondary d-flex"> you buy it from {{$proUser->productAddress}} </span>


                                    <span class="text-*-center   m-2 font-weight-bold"  style="color:red;">{{$proUser->productPrice }}  EGP </span>


                                </div>
                            </div>
                           <a href="/profile/{{$proUser->id}}/editProduct"  class="btn btn-outline-dark m-3"> Edit</a>
                            <a href="/delete/{{$proUser->id}}"class="btn btn-outline-dark m-3"  onclick="return confirm ('Are You Sure You want to delete ! ');">
                                 Delete</a>
                        </div>







                              @endforeach





        </div>
    </div>
        </div>
    </div>

        </div>
    </div>
    @endsection
