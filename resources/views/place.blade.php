@extends('user.master')
@section('content')

    <br><br>
    <div class="row" >
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                <div class="container-fluid">
                    <div class="row">


                        @foreach($place as $place)
                            <div class="col-sm-3">




                                    <div class="card" style="">
                                        <b class="text-primary font-weight-bold">{{$place->name}}</b>
                                        <img src="/images/{{$place->productImage}}" class="img-thumbnail"alt="Car" style="width:100%;">
                                        <div class="card-body">
                                            <h4>{{$place->productName}}</h4>
                                            <p>{{$place->productDescription}}<br>
                                                <b class="text-danger"> Address &nbsp;</b>:&nbsp;{{$place->productAddress}}<br>
                                                <b class="text-danger"> Price&nbsp;</b>:&nbsp;{{$place->productPrice}}EGP<br>
                                                <b class="text-danger">Posted At</b>&nbsp;:&nbsp;{{$place->created_at }}<br>
                                                <a href="/details/{{$place->id}}" class="btn btn-primary">Show More Details</a>
                                            </p>
                                        </div> <!--end of card body-->
                                    </div> <!--end of card-->
                                </div>  <!--end of co13-->


                                @endforeach
                            </div>  <!--end of row-->





                    </div> <!--end of container-->
                </div>
            <div class="col-sm-1"></div>
        </div>

@stop