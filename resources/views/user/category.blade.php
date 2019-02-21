@extends('user.master')
@section('content')


    <div class="container">
        <div class="row m-3">

            @foreach($catgoryPro as $catPro)
            <div class="col-sm-3 ml-5 mb-4 wow bounceIn">

                <div class="card shadow p-2 w-100  " style="height: 85%;">
                    <b class="text-primary font-weight-bold m-2">{{$catPro->productName}}</b>
                    <img class="card-img-top m-2 w-75 h-25" src="/images/{{$catPro->productImage}}" alt="Card image" >
                    <div class="card-body">
                        <h4 class="card-title">{{$catPro->productName}}</h4>
                        <p class="card-text"><b class="text-primary">Address</b> &nbsp;:&nbsp;{{$catPro->productAddress}}<br>
                            <b class="text-primary"> Price&nbsp;</b>:&nbsp;{{$catPro->productPrice}}EGP<br>
                            <b class="text-primary">Posted At</b>&nbsp;:&nbsp;{{$catPro->created_at }}<br></p>
                        <a href="/details/{{$catPro->id}}" class="btn btn-primary">Show More Details</a>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>



    @stop
