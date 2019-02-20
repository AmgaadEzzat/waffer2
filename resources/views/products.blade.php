@extends('user.master')
@section('content')
    <style type="text/css">
        #mymap {
            border:1px solid red;
            width: 800px;
            height: 500px;
        }
    </style>
    <body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-xs-5 col-sm-6 col-lg-4" style="background-color:white;">
                <div class="dropdown">

                    <button type="button" class="btn btn-outline-light text-dark" data-toggle="dropdown">Browse by category
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Mobiles & Tablets </a><hr>
                        <a class="dropdown-item" href="#">Electronics</a><hr>
                        <a class="dropdown-item" href="#">Kids</a>
                    </div>
                    <div class="container">
                        <h2>Categoriesp</h2>
                        <ul class="list-group">
                            <li class="list group item">Mobiles & Tablets</li>
                            <li class="list group item">Tablets (101)</li>
                            <li class="list group item">Mobiles (1609)</li>
                            <li class="list group item">Mobile & Tablet </li>
                            <li class="list group item">Accessories (101088)</li>
                        </ul>
                    </div>
                </div>
                <h1>Price Range</h1>

                <div class="slidecontainer ">
                    <input type="range" min="1000" max="10000"  value="50" class="slider" id="myRange">
                    <p>Cost: <span id="range"></span> EGP</p>
                </div>


                <button type="button" id="filter" class="btn btn-danger">Filter</button>

            </div>

            <div class="col-xs-7 col-sm-6 col-lg-8 border " style="background-color:white;">
                @foreach($searchResult as $searchRes)
                    <h2><a href="#" class="discraption">{{$searchRes->productDescription}} </a></h2>
                    <img src="/images/{{$searchRes->productImage}} " class="justify-content-left"  width="70" height="120">
                    <p style="padding-left:30px;display: inline">{{$searchRes->productName}}</p><br><h2>{{$searchRes->productPrice}} EGP</h2>
                    <input type="hidden" name="productid" class="prodid" value="{{$searchRes->id}}"/>
                    <a href="details/{{$searchRes->id}}" id="prices" class="btn btn-outline-dark">view this product</a>

                    {{--<span class="stars">--}}

                    {{--@if(Auth::check())--}}
                    {{--<span><button id="likeproduct">like&nbsp;<i class="far fa-thumbs-up"></i></button></span>--}}
                    {{--@endif--}}
                    {{--<span id="numberOfLikes">{{$searchRes->like}}</span>--}}

                    {{--</span>--}}
                    {{--<span class="stars">--}}

                    {{--@if(Auth::check())--}}
                    {{--<span><button id="dislikeproduct" h="">dislike&nbsp;<i class="far fa-thumbs-down"></i></button></span>--}}
                    {{--@endif<a h="{{$searchRes->id}}" id="asd"></a>--}}
                    {{--<span id="numberOfdisLikes">{{$searchRes->dislike}}</span>--}}

                    {{--</span>--}}



                    {{--<script>--}}
                    {{--$(document).ready(function () {--}}
                    {{--$('#likeproduct').click(function () {--}}

                    {{--$.ajax({--}}
                    {{--url: "fetchlike/{id}",--}}
                    {{--method: "get",--}}
                    {{--data: {id: "{{$searchRes->id}}"},--}}
                    {{--success: function (data) {--}}
                    {{--console.log(data);--}}
                    {{--$('#numberOfLikes').html(data);--}}
                    {{--}--}}
                    {{--});--}}

                    {{--});--}}


                    {{--$('#dislikeproduct').click(function (event) {--}}
                    {{--event.preventDefault();--}}
                    {{--$.ajax({--}}
                    {{--url: "fetchdislike/{id}",--}}
                    {{--method: "get",--}}
                    {{--data: {id: "{{$searchRes->id}}"},--}}
                    {{--success: function (data) {--}}
                    {{--console.log(data);--}}
                    {{--$('#numberOfdisLikes').html(data);--}}
                    {{--}--}}
                    {{--});--}}

                    {{--});--}}

                    {{--});--}}
                    {{--</script>--}}

                    {{--&nbsp;--}}
                    {{--<button class="btn btn-light" id="wishlist"> <i class="fas fa-heart"></i>Add to a wish list</button>--}}
                    {{--<div id="a"></div>--}}

                @endforeach

            </div>

<br><br><br>

            <script>
                $(document).ready(function () {
                    $('#likeproduct').each(function ()
                    {
                        $('#likeproduct').click(function (e)
                        {e.preventDefault();

                            var prodid =  $("#asd").attr("h");
                            console.log(prodid);
                            $.ajax({
                                url: "fetchlike/",
                                method: "get",
                                data: {id: prodid},
                                success: function (data) {
                                    console.log(data);
                                    $('#numberOfLikes').html(data);
                                }
                            });
                        });});



                    $('#dislikeproduct').click(function() {
                        var prodid= $('.prodid').val();
                        $.ajax({
                            url: "fetchdislike/",
                            method: "get",
                            data:{id:prodid},
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













                    var slider = document.getElementById("myRange");
                    var output = document.getElementById("range");
                    output.innerHTML = slider.value;

                    slider.oninput = function() {
                        output.innerHTML = this.value;
                    }



                    var count=1;
                    $('.dislikeclicked1').click(function () {
                        if(count==1){
                            $('#dislikeclicked2').val(parseInt($('#dislikeclicked2').val())+1);
                            var el = parseInt($('#dislikediv').text());
                            $('#dislikediv').text(el+1);
                            $('#flagtoupdate').val(1);
                            console.log("true");
                            count=0; }
                        else{
                            $('#dislikeclicked2').val(parseInt($('#dislikeclicked2').val())-1);
                            var el = parseInt($('#dislikediv').text());
                            $('#dislikediv').text(el-1);
                            count=1;
                            $('#flagtoupdate').val(0);
                        }
                    });



                    $('.likeclicked1').click(function () {
                        if(count==1){
                            $('#likeclicked2').val(parseInt($('#likeclicked2').val())+1);
                            var el = parseInt($('#likediv').text());
                            $('#likediv').text(el+1);

                            $('#flagtoupdatelike').val(1);
                            console.log("true");
                            count=0; }
                        else{
                            $('#likeclicked2').val(parseInt($('#likeclicked2').val())-1);
                            var el = parseInt($('#likediv').text());
                            $('#likediv').text(el-1);
                            count=1;
                            $('#flagtoupdatelike').val(0);
                        }
                    });


                });
            </script>
        </div>
        <br><br><br>
    </div>
@stop