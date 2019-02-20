@extends('user.master')
@section('content')


    <div class= "container-fluid " >
        <div class="row">
            
            <div class="col-sm-3 m-3">
                @foreach($userData as $userData)
                    <div class="container-fluid divinfo shadow rounded">
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
         <div class="container-fluid">
                <div class=" w-75">
                    @if(session()->has('notif'))
                    <div class="alert alert-success">
                        <button type="button" class="close"
                                data-dismiss="alert" aria-hidden="true">&times;</button>
                        <strong>Notification</strong>{{session()->get('notif')}}
                    </div>
                </div>
            @endif
                <span class="text-center m-2" > <h4  class="text-light  p-2 rounded" style="background-color: darkcyan"> Edit Product </h4></span>

                <form method="POST" action="update" enctype="multipart/form-data">
                    @csrf
<div class="container">

<div class="form-group row">
   <label for="name" class="col-sm-4 col-form-label text-md-left">{{ __('Product Name') }}</label>

   <div class="col-6">
       <input id="name" type="text" class="form-control{{ $errors->has('Product Name') ? ' is-invalid' : '' }}" name="productName" value="{{$id->productName}}" required autofocus>

       @if ($errors->has('Product Name'))
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('Product Name') }}</strong>
               </span>
       @endif
   </div>
</div>
</div>
                    <div class="container">

<div class="form-group row">
   <label for="Product Price" class="col-sm-4 col-form-label text-md-left">{{ __('Product Price ') }}</label>

   <div class="col-6">
       <input id="Product Price" type="number" class="form-control{{ $errors->has('Product Price') ? ' is-invalid' : '' }}" name="productPrice" value="{{$id->productPrice}}" required>

       @if ($errors->has('Product Price'))
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('Product Price') }}</strong>
               </span>
       @endif
   </div>
</div>
                    </div>
                    <div class="container">

<div class="form-group row">
   <label for="productAddress" class="col-sm-4 col-form-label text-md-left">{{ __('where you bought it') }}</label>

   <div class="col-6">
       <input id="productAddress" type="text" class="form-control{{ $errors->has('productAddress') ? ' is-invalid' : '' }}" name="productAddress" value="{{ $id->productAddress }}" required autofocus>

       @if ($errors->has('productAddress'))
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('productAddress') }}</strong>
               </span>
       @endif
   </div>
</div>
                    </div>
                    <div class="container">

<div class="form-group row">
   <label for="productDescription" class="col-sm-4 col-form-label text-md-left">{{ __('Product Description') }}</label>
   <div class="col-6">
       <input id="productDescription" type="text" class="form-control{{ $errors->has('productDescription') ? ' is-invalid' : '' }}" name="productDescription" value="{{ $id->productDescription}}" required autofocus>
       @if ($errors->has('productDescription'))
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $errors->first('productDescription') }}</strong>
               </span>
       @endif
   </div>
</div>
                    </div>
                    <div class="container">

<div class="form-group row">
   <label for="productImage" class="col-sm-4 col-form-label text-md-left">{{ __('Image for Product') }}</label>
   <div class="col-6">
       <input type="file" name="productImage" value="{{$id->productImage}}" id="productImage" >
       {{--<input id="productImage" type="file" value="Abload File" class="form-control{{ $errors->has('productImage') ? ' is-invalid' : '' }}" name="productImage" required autofocus>--}}
       @if ($errors->has('productImage'))
           <span class="invalid-feedback" role="alert">
                   <input type="file" name="productImage" value="{{$id->productImage}}" >
               </span>
       @endif
   </div>
</div>
                    </div>

<div class="container">
<div class="form-group row">
   <label for="type" class="col-sm-4 col-form-label text-md-left">{{ __('Category Name') }}</label>
    <div class="col-6">
                <select  class="form-control" name= "catId"value="{{$id->catId}}" >
                    @foreach($catName as $category)
                    <option  name="catname" value="{{$category->id}}" >
                        {{$category->categoryName}}</option>
                    @endforeach
                </select>
    </div>

</div>
</div>
                    <div class="container">
    <div class="form-group row">
        <div class="col-6 offset-md-4">
            <button type="submit" class="btn btn-info">
                {{ __('Update') }}
            </button>
        </div>
    </div>

                    </div>



</form>
         </div>
            </div>
</div>
</div>






@endsection
