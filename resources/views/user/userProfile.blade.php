@extends('user.master')
@section('content')
    <div class="container-fluid">
        <div class="row infoAnim">
        <div class="col-sm-3 m-3">
            



@foreach($userData as $userData)
    <div class="container-fluid divinfo rounded">
                <div class=" bg-light p-3 h-100   ">
                    <p class="wow fadeInDown" ><i class="fas fa-briefcase info"></i>{{$userData->name}}</p>
                    <p class="wow fadeInDown" ><i class="fas fa-home info"></i>{{$userData->city}}</p>
                    <p  class="wow fadeInDown"><i class="fas fa-envelope info"></i>{{$userData->email}}</p>

                    <p  class="wow fadeInDown"><i class="fas fa-phone info"></i>{{$userData->phone}}</p>
                    <hr>


                   <a href="/profile/{{$userData->id}}/editUser" class="btn border border-secondary btnstyle"> Edit Your Info</a>
                    <br>
                    @if(Auth::user()->type==1)
                        <a href="/Browse" class="btn border border-secondary btnstyle">Browse A Deal</a>
                    @endif
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



                                <div class="card m-2 ">
                                    <div class="card-header rounded border border-info"  > <span class="p-2 text-info"> <i class="fas fa-plus-circle "></i> </span> {{ __('Add New Product') }}</div>
                                    @if(session()->has('notif'))
                                        <div class="container">

                                            <div class="alert alert-success">
                                                <button type="button" class="close"
                                                        data-dismiss="alert" aria-hidden="true">&times;</button>
                                                <strong>Notification</strong>{{session()->get('notif')}}
                                            </div>

                                        </div>
                                    @endif
                                    <div class="card-body  shadow ">
                                        <div class="container  w-75  ">
                                        <form method="POST" action="insertProductByUser" enctype="multipart/form-data" class="needs-validation " novalidate>
                                            @csrf

                                            <input id="name" type="text" class="mb-4 form-control{{ $errors->has('Product Name') ? ' is-invalid' : '' }}" placeholder="Enter Product Name" name="productName" value="{{ old('Product Name') }}" required autofocus>
                                            <div class="invalid-feedback">
                                                Please enter product name.
                                            </div>

                                            @if ($errors->has('Product Name'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Product Name') }}</strong>
                                    </span>
                                            @endif


                                            <input id="Product Price" type="number" class="mb-4 form-control{{ $errors->has('Product Price') ? ' is-invalid' : '' }}" placeholder="How much did you bought it" name="productPrice" value="{{ old('Product Price') }}" required>
                                            <div class="invalid-feedback ">
                                                Please enter product price.
                                            </div>

                                            @if ($errors->has('Product Price'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Product Price') }}</strong>
                                    </span>
                                            @endif

                                            <input id="productAddress" type="text" class=" mb-4 form-control{{ $errors->has('productAddress') ? ' is-invalid' : '' }}" placeholder="Where you bought it " name="productAddress" value="{{ old('productAddress') }}" required autofocus>
                                            <div class="invalid-feedback">
                                                Please enter product address.
                                            </div>

                                            @if ($errors->has('productAddress'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productAddress') }}</strong>
                                    </span>
                                            @endif
                                            <input id="productDescription" type="text" class="mb-4 form-control{{ $errors->has('productDescription') ? ' is-invalid' : '' }}" placeholder="Product Description " name="productDescription" value="{{ old('productDescription') }}" required autofocus>
                                            <div class="invalid-feedback">
                                                Please enter product description.
                                            </div>
                                            @if ($errors->has('productDescription'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('productDescription') }}</strong>
                                    </span>
                                            @endif
                                            <input id="productImage" type="file" value="Abload File" class=" mb-4 form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" placeholder="Upload An Image" name="productImage" required autofocus>
                                            <div class="invalid-feedback">
                                                Please enter product image.
                                            </div>
                                            @if ($errors->has('productImage'))
                                                <span class="invalid-feedback" role="alert">
                                        <input type="file" name="productImage" value="Abload File" >
                                    </span>
                                            @endif

                                            <select class="form-control mb-4" id="sel1" name="catname" >
                                                @foreach($catName as $catname)
                                                    <option name="catname" >{{$catname->categoryName}}</option>
                                                @endforeach
                                            </select>
                                            <div class="w-100 mb-4 text-center">
                                            <button type="submit" class=" w-50 btn btn-info">
                                                {{ __('Add') }}
                                            </button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>




                </div>
                <div class="tab-pane fade" id="show-product" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <div class="row " id=bestsellerDiv>
                        @foreach($productForUser as $proUser)

                        <div class="col-sm-3 m-3 wow pulse " >
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
                                <div class="card-body cardstyle w-100 h-75" >
                                    <a href="#"  class="ml-3 text-center">  {{$proUser->productName}} </a>
                                    <br>
                                    <span class="small m-2 text-secondary d-flex">  buy it from {{$proUser->productAddress}} </span>


                                    <span class="text-*-center    font-weight-bold"  style="color:red;">{{$proUser->productPrice }}  EGP </span>


                                </div>
                            </div>
                           <a href="/profile/{{$proUser->id}}/editProduct"  class="btn btn-outline-dark m-3 shadow"> Edit</a>
                            <a href="{{$proUser->id}}/deleteFromUser" class="btn btn-outline-dark m-3 shadow"  onclick="return confirm ('Are You Sure You want to delete ! ');">
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
