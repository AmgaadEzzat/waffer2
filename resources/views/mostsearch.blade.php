@extends('user.master')
@section('content')
    <link rel="stylesheet" href="{{asset('css/homestyle.css')}}">
    <script src="{{asset('js/homejs.js')}}"></script>
<div class="col-sm-12" >
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5"><br><br>
            <h1 class="text-secondary">Latest searched by users</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row" >
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">


                        @foreach($mostsearchproduct as $mostsearch)
                            <div class="col-sm-3">




                                <div class="card" style="">
                                    <b class="text-primary font-weight-bold">{{$mostsearch->name}}</b>
                                    <img src="/images/{{$mostsearch->productImage}}" class="img-thumbnail"alt="Car" style="width:100%;">
                                    <div class="card-body">
                                        <h4>{{$mostsearch->productName}}</h4>
                                        <p>{{$mostsearch->productDescription}}<br>
                                            <b class="text-danger"> Address &nbsp;</b>:&nbsp;{{$mostsearch->productAddress}}<br>
                                            <b class="text-danger"> Price&nbsp;</b>:&nbsp;{{$mostsearch->productPrice}}EGP<br>
                                            <b class="text-danger">Posted At</b>&nbsp;:&nbsp;{{$mostsearch->created_at }}<br>
                                            <a href="/details/{{$mostsearch->id}}" class="btn btn-primary">Show More Details</a>
                                        </p>
                                    </div> <!--end of card body-->
                                </div> <!--end of card-->
                            </div>  <!--end of co13-->


                        @endforeach
                        <br><br>
                    </div>  <!--end of row-->





                </div> <!--end of container-->
            </div>
            <div class="col-sm-1"></div>
        </div>  <br><br>
    </div>  <br><br></div>
@stop