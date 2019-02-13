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
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <div class="row">
                <!--begin for loop-->



                @foreach($mostsearchproduct as $mostsearch)


                <div class="col-sm-3"  id="img-prd"><p><span>
                                            <div  style="width:5%;background-color:gray;" id="dislikediv">{{$mostsearch->like}}</div>
                            @if(Auth::check())
                                <button class="dislikeclicked1"> <i class="far fa-thumbs-up"></i></button>
                            @endif
                        </span><span>
                                           <div  style="width:5%;background-color:gray;" id="dislikediv">{{$mostsearch->dislike}}</div>
                            @if(Auth::check())
                                <button class="dislikeclicked1"> <i class="far fa-thumbs-down"></i></button>
                            @endif
                        </span>
                    </p>
                    <img src="/images/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail imgprd" /><br>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="modal1" style="margin-left:50px;margin-bottom:1000px;">
                        Show
                    </button>

                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$mostsearch->productName}} </h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-sm-8">
                                    DATE:{{$mostsearch->created_at }}
                                    <br>
                                    Address:{{$mostsearch->productAddress}}
                                    <br>
                                    Price:{{$mostsearch->productPrice}}$
                                        </div>
                                        <div class="col-sm-4">
                                            <img src="/images/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail" /><br>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>





                </div>

                    @endforeach<!--end for-->






            </div><!--end col 9-->

        </div><!--end row for displaying product-->
        <br><br>
        <div class="col-sm-1">
        </div>
    </div>
</div>

<div class="col-sm-12">
    <br><br> <br><br>
</div>
@stop