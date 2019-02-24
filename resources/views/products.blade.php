@extends('user.master')
@section('content')
    <style type="text/css">
        #mymap {
            border:1px solid red;
            width: 800px;
            height: 500px;
        }
    </style>

    <div class="container-fluid ">
        <div class="row">
            <div class=" col-sm-3  p-5">

                    <div class="container">
                        <h4> Our Category</h4>
                 <ul class="list-group">



                       @foreach($catgoryMob as $mob)
                            <li class="list group item">Mobiles({{$mob->catMob}})</li>
                            @endforeach

                            @foreach($catgoryTab as $tab)
                            <li class="list group item">Tablets({{$tab->catTap}})</li>
                             @endforeach
                           @foreach($catgoryLap as $lap)
                            <li class="list group item">Laptops  ({{$lap->catLap}}) </li>
                          @endforeach


                        </ul>


                        <h1>Price Range</h1>
                        <div class="slidecontainer ">
                            <input type="range" min="0" max="50000"  value="50" class="slider" id="myRange">
                            <p>Cost: <span id="range"></span> EGP</p>

                        </div>

                        <button type="button" id="filter" class="btn btn-danger">Filter</button>
                        <button type="button" id="back" class="btn btn-danger">Back<br> without Filter</button>


            </div>
            </div>

            <div class="col-sm-6   " style="background-color:white;">
                @foreach($searchResult as $searchRes)
                    <div class="container row border  border-success m-2 price">
                    <div class="col-sm-4 m-2" >
                        <img src="/images/{{$searchRes->productImage}} " class="w-75 h-50 p-2" >
                    </div>
                        <div class="col-sm-6 ">

                            <div class=" {{$searchRes->productPrice}}"> </div>


                        <input type="hidden" value="{{$searchRes->productPrice}}" id="input">
                            <span class="p-2" >{{$searchRes->productName}}</span><br>

                       <a href="#" class="discraption  p-2">{{$searchRes->productDescription}} </a><br><br>

                            <span class=" border  btn-outline-success  p-2">{{$searchRes->productPrice}} EGP</span><br><br>
                     <a href="details/{{$searchRes->id}}" id="prices" class="btn btn-outline-dark  mb-2">view this product</a>
                        </div>
                    </div>
                @endforeach
            </div>

<br><br><br>

            <script>
                $(document).ready(function () {
                    var slider = document.getElementById("myRange");
                    var output = document.getElementById("range");
                    output.innerHTML = slider.value;

                    slider.oninput = function() {
                        output.innerHTML = this.value;
                    }
                    $('#back').hide();

                    $('#filter').click(function() {
                        $('#back').fadeIn("slow");

                            $('.price').each(function () {
console.log(slider.value);
                                var dslidervalue=parseInt(slider.value)-3000;
                                console.log(dslidervalue);
                                var newslidervalue=parseInt(slider.value)+3000;
                                console.log(newslidervalue);
                                var inputvalue=$(this).find("input[type=hidden]").val();
                                console.log(inputvalue);
                               if((dslidervalue<=inputvalue)&&(newslidervalue>=inputvalue))
                                    {
                                    $(this).show();
                                    console.log('1');
                                }

                                else{
                                    $(this).hide();
                                    console.log('3');
                                }

                                $('#back').click(function () {
                                    $('#back').fadeOut();
                                });
                            });
                        });

                    $(document).on('click', '#back', function(){
                        $('.price').show();
                    });

                    // $('#filter').click(function() {
                    //     $('.price').each(function () {
                    //         if($(this).hasClass(slider.value))
                    //         {
                    //             $(this).css('display','block');
                    //         }
                    //         else {
                    //             $(this).css('display','none');
                    //         }
                    //
                    //     });
                    // });




                    // var count=1;
                    // $('.dislikeclicked1').click(function () {
                    //     if(count==1){
                    //         $('#dislikeclicked2').val(parseInt($('#dislikeclicked2').val())+1);
                    //         var el = parseInt($('#dislikediv').text());
                    //         $('#dislikediv').text(el+1);
                    //         $('#flagtoupdate').val(1);
                    //         console.log("true");
                    //         count=0; }
                    //     else{
                    //         $('#dislikeclicked2').val(parseInt($('#dislikeclicked2').val())-1);
                    //         var el = parseInt($('#dislikediv').text());
                    //         $('#dislikediv').text(el-1);
                    //         count=1;
                    //         $('#flagtoupdate').val(0);
                    //     }
                    // });
                    //
                    //
                    //
                    // $('.likeclicked1').click(function () {
                    //     if(count==1){
                    //         $('#likeclicked2').val(parseInt($('#likeclicked2').val())+1);
                    //         var el = parseInt($('#likediv').text());
                    //         $('#likediv').text(el+1);
                    //
                    //         $('#flagtoupdatelike').val(1);
                    //         console.log("true");
                    //         count=0; }
                    //     else{
                    //         $('#likeclicked2').val(parseInt($('#likeclicked2').val())-1);
                    //         var el = parseInt($('#likediv').text());
                    //         $('#likediv').text(el-1);
                    //         count=1;
                    //         $('#flagtoupdatelike').val(0);
                    //     }
                    // });


                    // $('#likeproduct').each(function ()
                    // {
                    //     $('#likeproduct').click(function (e)
                    //     {e.preventDefault();
                    //
                    //         var prodid =  $("#asd").attr("h");
                    //         console.log(prodid);
                    //         $.ajax({
                    //             url: "fetchlike/",
                    //             method: "get",
                    //             data: {id: prodid},
                    //             success: function (data) {
                    //                 console.log(data);
                    //                 $('#numberOfLikes').html(data);
                    //             }
                    //         });
                    //     });});
                    //
                    //
                    //
                    // $('#dislikeproduct').click(function() {
                    //     var prodid= $('.prodid').val();
                    //     $.ajax({
                    //         url: "fetchdislike/",
                    //         method: "get",
                    //         data:{id:prodid},
                    //         success: function (data) {
                    //             console.log(data);
                    //             $('#numberOfdisLikes').html(data);
                    //         }
                    //     });
                    //
                    // });
                    //
                    //
                    // $('#wishlist').click(function() {
                    //     var prodid= $('.prodid').val();
                    //     $.ajax({
                    //         url: "addtowishlist/",
                    //         method: "get",
                    //         data:{id:1},
                    //         success: function (data) {
                    //             console.log(data);
                    //             $('#wishlist').addClass(data);
                    //         }
                    //     });
                    //
                    // });


                });
            </script>
        </div>
        <br><br><br>
    </div>
@stop
