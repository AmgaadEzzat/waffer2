@extends('user.master')
@section('content')

    <div class="container w-100 h-25" style="background-color: #0c5460"> <h3> {{$id->categoryName}}</h3></div>
    <div class="container">
        <div class="row">
            @foreach($catgoryPro as $catPro)
            <div class="col-4">

                <div class="crad border shadow h-75 w-50">
                    <img src="/img/{{$catPro->productImage}}"  class="w-25 h-25 m-3" data-toggle="modal" data-target="#myModal">
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title"> {{$catPro->productName}}</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="/img/{{$catPro->productImage}}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body cardstyle w-75 h-50" >
                        <a href="#"  class="ml-3 text-center">  {{$catPro->productName}} </a>
                        <br>
                        <span class="small m-2 text-secondary d-flex">  you can buy it from {{$catPro->productAddress}} </span>


                        <span class="text-*-center    font-weight-bold"  style="color:red;">{{$catPro->productPrice }}  EGP </span>


                    </div>

            </div>
        </div>
                @endforeach
    </div>
    </div>


    @stop
