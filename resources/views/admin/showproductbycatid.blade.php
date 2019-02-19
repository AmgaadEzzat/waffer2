@extends('admin.master')
@section('content')

    {{--<table class="table table-hover m-b-0" id="table">--}}
        {{--<thead>--}}
        {{--<tr>--}}
            {{--<th>name</th>--}}
            {{--<th>price</th>--}}
            {{--<th>where to be</th>--}}
            {{--<th>Description</th>--}}
            {{--<th>Category</th>--}}
            {{--<th>User name</th>--}}
            {{--<th>Image</th>--}}
            {{--<th>Delete</th>--}}
            {{--<th>update</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}


        {{--@foreach($products as $product)--}}
            {{--<tr>--}}

                {{--<td>{{$product->productName}}</td>--}}
                {{--<td>{{$product->productPrice}}</td>--}}
                {{--<td>{{$product->productAddress}}</td>--}}
                {{--<td>{{$product->productDescription}}</td>--}}
                {{--<td>{{$product->categoryName}}</td>--}}
                {{--<td>{{$product->name}}</td>--}}
                {{--<td><img src="/img/{{$product->productImage}}" class="img-fluid w-25 " style="width:20%;height:10%;"></td>--}}
                {{--<td> <a href="/{{$product->id}}/delete" onclick="return confirm ('Are You Sure You want to delete ! ');"> <button class="btn btn-info">Delete</button></a></td>--}}
                {{--<td> <a href="/showProductByCatId/{{$product->id}}/edit1">edit</a><br></td>--}}




            {{--</tr>--}}
        {{--@endforeach--}}
        {{----}}
        {{--</tbody>--}}
    {{--</table>--}}
<div class="container ">
    <div class="row  ">
    @foreach($products as $product)
        <div class="col-md-4 ">
            <div class="card h-100" >
                <img class="img-fluid pl-4 w-50 h-25 " src="/img/{{$product->productImage}}" alt="Card image" style="position: relative">
                <div style="position: absolute ; top: 0; right: 0;font-size: 1.3em" class="p-3">
                    <a href="/{{$product->id}}/delete" onclick="return confirm ('Are You Sure You want to delete ! ');"> <i class="fas fa-trash"></i></a>
                    <a href="/showProductByCatId/{{$product->id}}/edit1" ><i class="fas fa-edit" style="color: #FFD700"></i></a>
                </div>
                <div class="card-body ">
                    <h4 class="card-title ">{{$product->productName}}</h4>
                    <p class="card-text h-25">{{$product->productDescription}}</p>
                    <a href="/{{$product->id}}/showDetailsProduct"><button  id="btnModal" class="btn btn-primary">See Details</button></a>
                </div>
            </div>
        </div>

        @endforeach
    </div>
</div>
    {{--@foreach($detailsProducts as $DProduct)--}}
    {{--<!-- The Modal -->--}}
    {{--<div id="myModal" class="modal">--}}

        {{--<!-- Modal content -->--}}
        {{--<div class="modal-content">--}}
            {{--<span class="close">&times;</span>--}}
            {{--<p>{{$DProduct->productPrice}}</p>--}}
            {{--<p>{{$DProduct->productAddress}}</p>--}}
        {{--</div>--}}

    {{--</div>--}}
    {{--@endforeach--}}

@endsection