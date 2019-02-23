@extends('user.master')
@section('content')
    <script type='text/javascript'
            src='//platform-api.sharethis.com/js/sharethis.js#property=5c6dfab11ef90f001147ace3&product=inline-share-buttons'
            async='async'></script>
    <style>


        .img-zoom-container {
            position: relative;
        }

        .img-zoom-lens {
            position: absolute;
            border: 1px solid #d4d4d4;
            /*set the size of the lens:*/
            width: 40px;
            height: 40px;
        }

        .img-zoom-result {
            border: 1px solid #d4d4d4;
            /*set the size of the result div:*/
            width: 300px;
            height: 300px;
        }
        #comment{display: none;}
    </style>

    <div class="container m-5 ">
        <div class="row">
            @foreach($productdetails as $product)
                <div class="col-sm-4 col-xs-2 border  border-secondary">


                    <div class="img-zoom-container">
                        <img id="myimage" src="/images/{{$product->productImage}}" width="300" height="240"><br><br>
                        <div id="myresult" class="img-zoom-result"></div>
                        <br><br><br>
                    </div>


                </div>



                <div class="col-sm-8  border  border-secondary border-left-0 container">
                    <h1>{{$product->name}}</h1>
                    <a href="#">  <h1>Product name and details</h1></a>
                    <span class="border border-secondary w-75 p-2 m-4"  >  {{$product->productPrice}}EGP</span>
                    <span class="badge badge-success m-4"> {{$product->productAddress}}</span>
                    <br>
                    <span class="m-4"> {{$product->productDescription}} </span>
                    <div class="m-4">
                        {{--<button class="btn btn-success"> Buy it from Jumia</button> --}}
                    </div>  <input type="hidden" name="productid" id="prodid" value="{{$id}}"/>
                    <div id=stars class="m-4 d-inline-flex">
                    <span style="color:rgb(179, 75, 75);">

                        @if(!Auth::check()) <b>Likes:</b>@endif
                        @if(Auth::check())
                            <button class="likeproduct">like&nbsp;<i class="far fa-thumbs-up"></i></button>
                        @endif
                        <span id="numberOfLikes">{{$product->like}}</span>
                    </span>



                        <span style="color:rgb(179, 75, 75);">
                        @if(!Auth::check())<b>Dislikes:</b>@endif
                            @if(Auth::check())
                                <span><button id="dislikeproduct" h="">dislike<i class="far fa-thumbs-down"></i></button></span>
                            @endif
                            <span id="numberOfdisLikes">{{$product->dislike}}</span>
                    </span>
                        @if(Auth::check())
                            <ul class="nav d-inline-flex ">

                                <li ><button class="p-2 btn btn-light" id="wishlist"> <i class="fas fa-heart"></i>Add to a wish list</button></li>
                            </ul>
                        @endif
                    </div>
                    <div> Share:
                        {{--<div class="sharethis-inline-share-buttons"></div>--}}
                        <div class="sharethis-inline-share-buttons"></div>
                    </div>
                    <hr>
                    <ul class="nav d-inline-flex ">
                        <li class=""><b style="color:gray">{{$commentsinthisproduct}}&nbsp; comments</b></li>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        @if ($commentsinthisproduct==0)
                            @if(Auth::check())
                            <li ><button class="p-2 btn btn-light" id="addcomment">Be the frist to review</button></li>@endif
                            <div id="comment">
                                <form action="/storecomment/{{$id}}" method="post">
                                    {{csrf_field()}}
                                    <textarea type="text" name="Comment"class="form-control{{ $errors->has('Comment') ? ' is-invalid' : '' }}" value="{{ old('Comment') }}" required placeholder="Add Your Comment Here">
                            </textarea>
                                    @if ($errors->has('Comment'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Comment') }}</strong>
                                    </span>
                                    @endif

                                    <br>
                                    <br><button id="add" class="btn btn-primary">Add Comment</button>
                                </form>
                            </div>  </ul>

                    @else

                        <div class="col-sm-12">

                            @foreach($comments as $comment)
                                <br><br>
                                <b>{{$comment->name}}</b><br>
                                <p>{{$comment-> Comment}}</p>
                                <small class='text-primary'>{{$comment-> created_at}}</small>

                                <hr>
                            @endforeach
                            @if(Auth::check())
                                <form action="/storecomment/{{$id}}" method="post">
                                    {{csrf_field()}}
                                    <textarea type="text" name="Commentt"class="form-control"  placeholder="Add Your Comment Here" required>
                            </textarea><br>
                                    <br><button id="add" class="btn btn-primary">Add Comment</button>
                                </form>
                            @endif
                            @endif
                        </div>

                </div>
        </div>
    </div>
    @endforeach
    </div>



    {{--<div class="container ">--}}
    {{--<div class="row justify-content-between  m-3 p-3  border border-light" style="background-color:rgb(226, 219, 219)">--}}
    {{--<h3 class=""> the best seller in smartphones </h3>--}}
    {{--<span class="m-2 ">    <a href="#"> More..</a></span>--}}
    {{--</div>--}}
    {{--<div class="row " id=bestsellerDiv>--}}

    {{--<div class="col-sm-3 " >--}}
    {{--<div class="crad border ">--}}
    {{--<img src="images/2.jpg"  class="w-50 m-5">--}}
    {{--<div class="card-body cardstyle" >--}}
    {{--<a href="#"  class="m-4 text-center">  product name </a>--}}
    {{--<br>--}}
    {{--<span class="small m-2 p-4 text-secondary"> the price from "the place"</span>--}}

    {{--<br>--}}
    {{--<span class="text-*-center   p-4 font-weight-bold"  style="color:red;"> 5658.25 EGP </span>--}}


    {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}






    {{--</div>--}}



    {{--</div>--}}
    <script>

        imageZoom("myimage", "myresult");
        $(document).ready(function () {

            $('.likeproduct').click(function (e) {
                e.preventDefault();
                var prodid =$('#prodid').val();
                console.log(prodid);
                $.ajax({
                    url: "/fetchlike",
                    method: "get",
                    data: {id: prodid},
                    success: function (data) {
                        console.log(data);
                        $('#numberOfLikes').html(data);
                    }
                });
            });



            $('#dislikeproduct').click(function (e) {

                e.preventDefault();
                var prodid = $('#prodid').val();
                console.log(prodid);
                $.ajax({
                    url: "/fetchdislike",
                    method: "get",
                    data: {id: prodid},
                    success: function (data) {
                        console.log(data);
                        $('#numberOfdisLikes').html(data);
                    }
                });

            });


            $('#wishlist').click(function() {
                var prodid= $('.prodid').val();
                $.ajax({
                    url: "addtowishlist/",
                    method: "get",
                    data:{id:1},
                    success: function (data) {
                        console.log(data);
                        $('#wishlist').addClass(data);
                    }
                });

            });



            $('#addcomment').click(function () {
                    $('#comment').css("display","block")
                }
            );
        });


    </script>

@stop
