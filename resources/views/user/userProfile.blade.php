@extends('user.master')
@section('content')
    <div class="container-fluid">
        <div class="row infoAnim">
        <div class="col-sm-3 m-3">
            



@foreach($userData as $userData)
    <div class="container-fluid divinfo">
                <div class=" bg-light p-3 h-100 rounded ">
                    <p ><i class="fas fa-briefcase info"></i>{{$userData->name}}</p>
                    <p ><i class="fas fa-home info"></i>{{$userData->city}}</p>
                    <p ><i class="fas fa-envelope info"></i>{{$userData->email}}</p>

                    <p ><i class="fas fa-phone info"></i>{{$userData->phone}}</p>
                    <hr>


                   <a href="/profile/{{$userData->id}}/editUser" class="btn border border-secondary btnstyle"> Edit Your Info</a>

                    </div>
    @endforeach
    </div>
            </div>

        <div class="col-sm-8 m-2">
            <div  class="container-fluid">
                <div class="nav navbar-expand-sm nav-tabs nav-fill shadow" id="nav-tab" role="tablist" style="background-color:#e6e6e6;">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#add-product" role="tab">Add product</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#show-product" role="tab">show products</a>


                </div>
            </div>
            <div class="tab-content  " id="nav-tabContent">
                <div class="tab-pane  fade show active" id="add-product" role="tabpanel" >

                    <div class="container">

                                <div class="card shadow">
                                    <div class="card-header rounded" style="background-color:darkcyan;" > <span class="p-2 text-light"> <i class="fas fa-plus-circle "></i> </span> {{ __('Add New Product') }}</div>

                                    <div class="card-body container shadow">
                                        <form method="POST" action="insertProductByUser" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group  container row">
                                                <label for="name" class="col-sm-4 col-form-label text-sm-left">{{ __('Product Name') }}</label>

                                                <div class="col-sm-6">
                                                    <input id="name" type="text" class="form-control{{ $errors->has('Product Name') ? ' is-invalid' : '' }}" name="productName" value="{{ old('Product Name') }}" required autofocus>

                                                    @if ($errors->has('Product Name'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Product Name') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group  container row">
                                                <label for="Product Price" class="col-sm-4 col-form-label text-sm-left">{{ __('Product Price ') }}</label>

                                                <div class="col-sm-6">
                                                    <input id="Product Price" type="number" class="form-control{{ $errors->has('Product Price') ? ' is-invalid' : '' }}" name="productPrice" value="{{ old('Product Price') }}" required>

                                                    @if ($errors->has('Product Price'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Product Price') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group container row">
                                                <label for="productAddress" class="col-sm-4 col-form-label text-sm-left">{{ __('where you bought it') }}</label>

                                                <div class="col-sm-6">
                                                    <input id="productAddress" type="text" class="form-control{{ $errors->has('productAddress') ? ' is-invalid' : '' }}" name="productAddress" value="{{ old('productAddress') }}" required autofocus>

                                                    @if ($errors->has('productAddress'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productAddress') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group container row">
                                                <label for="productDescription" class="col-sm-4 col-form-label text-sm-left">{{ __('Product Description') }}</label>
                                                <div class="col-sm-6">
                                                    <input id="productDescription" type="text" class="form-control{{ $errors->has('productDescription') ? ' is-invalid' : '' }}" name="productDescription" value="{{ old('productDescription') }}" required autofocus>
                                                    @if ($errors->has('productDescription'))
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productDescription') }}</strong>
                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group container row">
                                                <label for="productImage" class="col-sm-4 col-form-label text-sm-left">{{ __('Image for Product') }}</label>
                                                <div class="col-sm-6">

                                                    <input id="productImage" type="file" value="Abload File" class="form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" name="productImage" required autofocus>
                                                    @if ($errors->has('productImage'))
                                                        <span class="invalid-feedback" role="alert">
                                        <input type="file" name="productImage" value="Abload File" >
                                    </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="form-group container row">
                                                <label for="type" class="col-sm-4 col-form-label text-sm-left">{{ __('Category Name') }}</label>
                                                <div class="col-sm-6">

                                                    <span class="form-group" name="catname">
                                    <select class="form-control" id="sel1" name="catname">
                                        @foreach($catName as $catname)
                                            <option name="catname" >{{$catname->categoryName}}</option>
                                        @endforeach
                                    </select>

                                </span>

                                            </div>
                                            </div>

                                            <div class="form-group container row ">
                                                <div class="col-sm-6 offset-sm-4">
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
                            <div class="crad border shadow h-75 ">
                                <img src="/img/{{$proUser->productImage}}"  class="w-25 h-25 m-3" data-toggle="modal" data-target="#myModal">
                                <div class="modal fade" id="myModal">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"> {{$proUser->productName}}</h4>
                                            </div>
                                            <div class="modal-body">
                                              <img src="/img/{{$proUser->productImage}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body cardstyle w-75 h-50" >
                                    <a href="#"  class="ml-3 text-center">  {{$proUser->productName}} </a>
                                    <br>
                                    <span class="small m-2 text-secondary d-flex">  buy it from {{$proUser->productAddress}} </span>


                                    <span class="text-*-center    font-weight-bold"  style="color:red;">{{$proUser->productPrice }}  EGP </span>


                                </div>
                            </div>
                           <a href="/profile/{{$proUser->id}}/editProduct"  class="btn btn-outline-dark m-3 shadow"> Edit</a>
                            <a href="/delete/{{$proUser->id}}"class="btn btn-outline-dark m-3 shadow"  onclick="return confirm ('Are You Sure You want to delete ! ');">
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
