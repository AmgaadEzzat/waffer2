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

@foreach($searchResult as $searchRes)
<div class="col-xs-7 col-sm-6 col-lg-8 border " style="background-color:white;">
    <h2><a href="#" class="discraption">{{$searchRes->productDescription}} </a></h2>
    <img src="/images/{{$searchRes->productImage}} " class="justify-content-left"  width="70" height="120">
    <p style="padding-left:30px;display: inline">{{$searchRes->productName}}</p><br>
    <span class="stars">
             <form action="/like" method="post">
            {{csrf_field()}}
            <!-- <input type="text" id="dislikeclicked2" name="dislikeclicked2" value="{{$searchRes->like}}" disabled/>-->
                <input type="hidden" name="flagtoupdatelike" id="flagtoupdatelike"/>
            <input type="hidden" name="productidlike" value="{{$searchRes->id}}"/>
            <input type="hidden"id="likeclicked2" name="like" value="{{$searchRes->like}}" />
                <div style="width:5%;background-color:gray;" id="likediv">{{$searchRes->like}}</div>
                @if(Auth::check())
            <button type="submit" class="likeclicked1"> <i class="far fa-thumbs-up"></i></button>
                    @endif
      </form>


<input type="hidden" name="inputsearch"value="{{$inputsearch}}"/>

      <form action="/dislike" method="post">
            {{csrf_field()}}
       <!-- <input type="text" id="dislikeclicked2" name="dislikeclicked2" value="{{$searchRes->dislike}}" disabled/>-->
          <input type="hidden" name="flagtoupdate" id="flagtoupdate"/>
            <input type="hidden" name="productid" value="{{$searchRes->id}}"/>
            <input type="hidden"id="dislikeclicked2" name="dislike" value="{{$searchRes->dislike}}" />
                <div  style="width:5%;background-color:gray;" id="dislikediv">{{$searchRes->dislike}}</div>
                @if(Auth::check())
            <button class="dislikeclicked1"> <i class="far fa-thumbs-down"></i></button>
                @endif
      </form>


    &nbsp;
    <a href="/wishlist/{{$searchRes->id}}"style="color:{{$styleforicon}};" target="_blank"> <i class="fas fa-heart"></i>Add to a wish list</a>
    <button type="button" id="prices" class="btn btn-outline-dark">{{$searchRes->productPrice}} EGP</button>


    </span>

@endforeach
<script>
var slider = document.getElementById("myRange");
var output = document.getElementById("range");
output.innerHTML = slider.value;

slider.oninput = function() {
output.innerHTML = this.value;
}


$(document).ready(function () {
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
@stop