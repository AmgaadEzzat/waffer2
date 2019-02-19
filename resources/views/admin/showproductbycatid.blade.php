@extends('admin.master')
@section('content')

<div class="container ">
    <div class="row  ">
    @foreach($products as $product)
        <div class="col-md-4 ">
            <div class="card h-" style="height: 90%" >
                <img class="img-fluid pl-4 w-50 h-25 " src="/img/{{$product->productImage}}" alt="Card image" style="position: relative">
                <div style="position: absolute ; top: 0; right: 0;font-size: 1.3em" class="p-3">
                    <a href="/{{$product->id}}/delete" onclick="return confirm ('Are You Sure You want to delete ! ');"> <i class="fas fa-trash"></i></a>
                    <a href="/showProductByCatId/{{$product->id}}/edit1" ><i class="fas fa-edit" style="color: #1b4b72 "></i></a>
                </div>
                <div class="card-body h-75 ">
                    <h4 class="card-title ">{{$product->productName}}</h4>
                    <div class="card-text h-50 ">
                        <p>{{$product->productDescription}}</p>
                    <p style="color: blue">{{$product->productPrice}}</p>
                    <p>{{$product->productAddress}}</p>
                    </div>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>


@endsection