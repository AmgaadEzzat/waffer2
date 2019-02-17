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
<div class="container-fluid ">
    <div class="row  ">
    @foreach($products as $product)
        <div class="col-md-4  ">
            <div class="card h-100" >
                <img class="img-fluid pl-4 w-25 h-25" src="/img/{{$product->productImage}}" alt="Card image">
                <div class="card-body ">
                    <h4 class="card-title ">{{$product->productName}}</h4>
                    <p class="card-text h-50">{{$product->productDescription}}</p>
                    <a href="#" class="btn btn-primary">See Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection