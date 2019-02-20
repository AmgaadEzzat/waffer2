<!DOCTYPE html>
<html>
<head>
    <title>Waffar</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
    <meta name="author" content="Vincent Garreau" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/homestyle.css')}}">
    <script src="{{asset('js/homejs.js')}}"></script>
    <link rel="shortcut icon" type="image/jpg" href="{{asset('images/icon.jpg')}}"/>
    <link href="{{asset('js/owl-carousel/owl.carousel.css')}} rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

</head>
<style>

</style>
<script>

</script>
</head>
<body id="up">



<nav class="navbar navbar-expand-sm fixed-top text-white" id="navbar">

    <a class="navbar-brand font-weight-bold" id="logo" href="{{ url('/') }}"><i class="fas fa-money-bill-wave"></i><STRONG>WaffeR</STRONG>.com</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" style="background-color:rgb(224, 220, 220);color:red;"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">


        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item"  style="padding-left:24px;">

                <a href="/deals"class="btn btn-danger">Deals</a>

            </li>
            @guest
                <li class="nav-item" style="padding-left:24px;">
                    <a href="{{ route('login') }}"  class="btn btn-warning">Log in</a>
                </li>

                <li class="nav-item"  style="padding-left:24px;">
                    <a href="{{ route('register') }}" class="btn  navbutton btn-primary">Join now</a>
                </li>
            @else


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white font-weight-bold" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                        <a class="dropdown-item text-dark" href="{{ route('profile') }}" id="navlinks">profile</a>

                    </div>
                </li>
            @endguest
        </ul>

    </div>
</nav>
<!--end navbar-->
<!--carousal-->
<div class="col-sm-12" id="particles-js" style="background-image: url({{asset('images/navpic1.jpg')}});">
    <script src="{{asset('js/particles.js')}}"></script>
    <script src="{{asset('js/js/app.js')}}"></script>
    <script src="{{asset('js/js/lib/stats.js')}}"></script>
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">


        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<!--end search-->
<!--end carousal-->

<!--begin searched products-->

<div class="col-sm-12" >

    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-7">

            <!--begin for loop-->
            <br><br><br><br><br><br><br><br><label for="txtsearch" class="text-light" id=""style="font-size:2vw; margin-bottom:1000;" >
                <i class="fas fa-search"></i>
                Search now for the lowest price<br> in <h class="font-weight-bold">Egypt</h></label><br><br>

            <form action="/insertsearch" method="post">
                {{csrf_field()}}
                <div class="form-group">

                    <div class="input-group mb-3" >

                        <input type="text" name="txtsearch" id="txtsearch" required class="form-control input-lg" placeholder="Search is easier now...." autocomplete=off />

                        <div class="input-group-append" >
                            <button class="btn btn-light" id="buttonsearch" type="submit">Search</button>
                        </div>
                    </div>
                </div>

                <div id="productList" class="text-dark">
                </div>

            </form>
            {{ csrf_field() }}

            <script>
                $(document).ready(function(){
                    console.log("dddd");
                    $('#txtsearch').keyup(function(){
                        var query = $(this).val();
                        if(query != '')
                        {
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url:"{{ route('autocomplete.fetch') }}",
                                method:"POST",
                                data:{query:query, _token:_token},
                                success:function(data){
                                    console.log(data);
                                    $('#productList').fadeIn("slow");
                                    $('#productList').html(data);
                                }
                            });
                        }
                    });

                    $(document).on('click', 'li', function(){
                        $('#txtsearch').val($(this).text());
                        $('#productList').fadeOut("slow");
                    });

                });
            </script>












        </div>
    </div>
    <br><br><br><br><br><br><br>

    <br><br><br><br><br><br><br><br><br>
    <div class="row" style=""><div class="col-sm-1" style=""></div>
        <div class="col-sm-7" style="">
            <h1 class="text-secondary">Latest searched by users</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-4" style=""></div></div>





    <div class="row" style="">
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
            <div class="row">
                @foreach($mostsearchproduct as $mostsearch)
                    <div class="col-sm-3" style="">
                        <div class="card" style="">
                            <img class="card-img-top" src="/images/{{$mostsearch->productImage}}" alt="Card image" style="">
                            <div class="card-body">
                                <h4 class="card-title">{{$mostsearch->productName}}</h4>
                                <p class="card-text"><b class="text-primary">Address</b> &nbsp;:&nbsp;{{$mostsearch->productAddress}}<br>
                                    <b class="text-primary"> Price&nbsp;</b>:&nbsp;{{$mostsearch->productPrice}}EGP<br>
                                    <b class="text-primary">Posted At</b>&nbsp;:&nbsp;{{$mostsearch->created_at }}<br></p>
                                <a href="/details/{{$mostsearch->id}}" class="btn btn-primary">Show More Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="col-sm-1"></div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10"></div>
                <div class="col-sm-2"><a href="/mostsearched" style="color:gray;"><p style="color:rgb(138, 135, 135);"><i class="fas fa-angle-double-right"></i> Show More</p></a></div>
            </div>
        </div></div>






    <div class="row" style=""><div class="col-sm-1" style=""></div>
        <div class="col-sm-7" style="">  <hr style="background-color:gray;border-color:gray;">
            <h1 class="text-secondary">The Lowest Prices At Our Website</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-4" style=""></div></div>



    <div class="row" style="background-color: #dbe6f0;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="main">

                <div id="myBtnContainer"><br><br>
                    <button class="btn btnn active" onclick="filterSelection('all')"> All</button>
                    @foreach($catName as $catagory)
                        <button class="btn btnn" onclick="filterSelection('{{$catagory->categoryName}}')"> {{$catagory->categoryName}}</button>
                    @endforeach
                    <br><br>
                </div>

                <!-- Portfolio Gallery Grid -->
                <div class="row">

                    <div class="col-sm-12">
                        <div class="row text-left">
                            @foreach($products as $product)
                                {{--<div class="col-sm-4 float-left  text-left"style="margin-top:30px;">--}}
                                <div class="column col-sm-3 text-left {{$product->categoryName}}" style="margin:20px 20px 20px 20px;" >
                                    <div class="content" style="width:100%;height:100%;">
                                        <img src="/images/{{$product->productImage}}" class="img-thumbnail"alt="Car" style="width:100%;">
                                        <h4>{{$product->productName}}</h4>
                                        <p>{{$product->productDescription}}<br>
                                            <b class="text-danger"> Address &nbsp;</b>:&nbsp;{{$product->productAddress}}<br>
                                            <b class="text-danger"> Price&nbsp;</b>:&nbsp;{{$product->productPrice}}EGP<br>
                                            <b class="text-danger">Posted At</b>&nbsp;:&nbsp;{{$product->created_at }}<br>
                                            <a href="/details/{{$product->id}}" class="btn btn-primary">Show More Details</a>
                                        </p>
                                    </div>
                                </div>
                                {{--</div>--}}
                            @endforeach
                        </div>
                    </div>
                    <div class="col-sm-1"></div>
                    <!-- END GRID -->
                </div>
            </div>
            <!-- END MAIN -->

        </div>
    </div>
    <script>
        filterSelection("all")
        function filterSelection(c) {
            var x, i;
            x = document.getElementsByClassName("column");
            if (c == "all") c = "";
            for (i = 0; i < x.length; i++) {
                w3RemoveClass(x[i], "show");
                if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
            }
        }

        function w3AddClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
            }
        }

        function w3RemoveClass(element, name) {
            var i, arr1, arr2;
            arr1 = element.className.split(" ");
            arr2 = name.split(" ");
            for (i = 0; i < arr2.length; i++) {
                while (arr1.indexOf(arr2[i]) > -1) {
                    arr1.splice(arr1.indexOf(arr2[i]), 1);
                }
            }
            element.className = arr1.join(" ");
        }


        // Add active class to the current button (highlight it)
        var btnContainer = document.getElementById("myBtnContainer");
        var btns = btnContainer.getElementsByClassName("btn");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function(){
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>
    <br><br>
    <div class="row" style="">
        <div  class="col-sm-12 parallax" style="background-image: url({{asset('images/images.jpg')}});" >
            <br><br>
            <div  class="row mx-auto text-center" ><div  class="col-sm-12 text-center">
                    <p class="h-6" style="color:#d6d6d6;">Get Ready For More Opportunities!</p><br>
                        <h4 style="color:#f3f0f0;">You ara minutes away from Browse your latest product you buy</h4><br>
                </div></div>
            <div  class="row"><br><br><div  class="col-sm-12 text-center"><br>
                    <a href="{{ route('login') }}" class="btn btn-danger mx-auto"   >Join Now</a><br>
                </div></div>
        </div>
    </div>










    <br>
    <!--footer-->
    <div class="row">
        <div  class="col-sm-12 footer">
            <div class="row"><br><br>
                <div class="col-sm-1"></div>
                <div class="col-sm-8"><br><br><p class="font-weight-bold"><strong><i class="fas fa-money-bill-wave"></i>&nbsp;WaffeR.com</strong></p></div>
                <div class="col-sm-2" ><br><br><a href="#" id="footerlink"><p class="font-weight-bold text-right"  for="up"><strong ><i class="fas fa-chevron-up"></i></strong></p></a></div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                    <hr style="background-color:gray;border-color:gray;">
                </div>
                <div class="col-sm-1"></div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <!--firstcolumn-->
                <div class="col-sm-3"><br><strong>WaffeR</strong><br>
                    <p>Customers and componies ,<br>go to our website</p>

                </div>
                <div class="col-sm-2" id="footerlinks"><br><strong>Links</strong><br>
                    <p><a href="#">Waffer Coaches</a> <br><a href="#">Waffer coaches</a><br><a href="#">About Us</a><br>
                    </p>
                </div>
                <div class="col-sm-2" id="footerlinks"><br><br><p><a href="#">Parteners</a> <br><a href="#">Contact Us</a><br></p></div>
                <div class="col-sm-3" id="footerlinks">
                    <br><strong>Follow Us</strong><br>
                    <a href="/www.facebook.com" style="color:white;"><i class="fab fa-facebook-square"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="/www.twitter.com" style="color:white;"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="/www.google.com" style="color:white;"><i class="fab fa-google"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="/www.instagram.com" style="color:white;"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
                    <a href="/www.youtube.com" style="color:white;"> <i class="fab fa-youtube"></i></a>&nbsp;&nbsp;&nbsp;<br>
                    <br><small>© 2019 WaffeR. All Rights Reserved.<br> Owned by <a href="#" id="footerlink">BasharSoft LLC.</a> </small><br><br>
                </div>
                <div class="col-sm-1" >
                </div>
            </div>



        </div></div>
    <!--end-footer-->

</body>
</html>



{{--<div class="row" style=""><div class="col-sm-1" style=""></div>--}}
{{--<div class="col-sm-7" style="">--}}
{{--<h1 class="text-secondary">Latest searched by users</h1>--}}
{{--<hr style="background-color:gray;border-color:gray;"><br><br>--}}
{{--<div id="myBtnContainer">--}}
{{--<button class="btn btnn active" onclick="filterSelection('all')"> Show all</button>--}}
{{--<button class="btn btnn" onclick="filterSelection('nature')"> Nature</button>--}}
{{--<button class="btn btnn" onclick="filterSelection('cars')"> Cars</button>--}}
{{--<button class="btn btnn" onclick="filterSelection('people')"> People</button>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-4" style=""></div>--}}
{{--</div>--}}





{{--<div class="row" style="">--}}

{{--<div class="col-sm-1" style="border:2px solid red;"></div>--}}
{{--<div class="col-sm-10" style="border:2px solid red;">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-3" style="border:2px solid red;">--}}
{{--<div class="rrow">--}}
{{--<div class="column nature">--}}
{{--<div class="content">--}}
{{--<img src="/images/save2.jpg" alt="Mountains" style="width:100%">--}}
{{--<h4>Mountains</h4>--}}
{{--<p>Lorem ipsum dolor..</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-3" style="border:2px solid red;">ssss</div>--}}
{{--<div class="col-sm-3" style="border:2px solid red;">ssss</div>--}}
{{--<div class="col-sm-3" style="border:2px solid red;">ssss</div>--}}
{{--<div class="col-sm-3" style="border:2px solid red;">ssss</div><div class="col-sm-3" style="border:2px solid red;">ssss</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="col-sm-1"style="border:2px solid red;"></div>--}}
{{--</div>--}}



{{--<div class="row" style="">--}}
{{--<!--begin searched products-->--}}

{{--<div class="col-sm-12" >--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-5"><br><br>--}}
{{--<h1 class="text-secondary">Latest searched by users</h1>--}}
{{--<hr style="background-color:gray;border-color:gray;"><br><br>--}}
{{--</div>--}}
{{--<div class="col-sm-5"></div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-9">--}}
{{--<div class="row">--}}
{{--<!--begin for loop-->--}}

{{--@foreach($mostsearchproduct as $mostsearch)--}}
{{--<div class="col-sm-3"  id="img-prd">--}}
{{--<span   class="dislik"style="width:8%;background-color:gray;" id="dislikediv">{{$mostsearch->like}}--}}
{{--@if(Auth::check())--}}
{{--<button class="dislikeclicked1"> <i class="far fa-thumbs-up"></i></button>--}}
{{--@endif--}}
{{--</span><span>--}}
{{--<span  class="dislik"style="width:8%;background-color:gray;" id="dislikediv">{{$mostsearch->dislike}}</span>--}}
{{--@if(Auth::check())--}}
{{--<button class="dislikeclicked1"> <i class="far fa-thumbs-down"></i></button>--}}
{{--@endif--}}
{{--</span>--}}
{{--<br>--}}
{{--<img src="/img/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail imgprd" /><br>--}}
{{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="modal1" style="margin-left:50px;margin-bottom:1000px;">--}}
{{--Show--}}
{{--</button>--}}

{{--<div class="modal fade" id="myModal">--}}
{{--<div class="modal-dialog modal-xl">--}}
{{--<div class="modal-content">--}}

{{--<!-- Modal Header -->--}}
{{--<div class="modal-header">--}}
{{--<h4 class="modal-title"><b class="text-primary">{{$mostsearch->productName}}</b> </h4>--}}
{{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--</div>--}}

{{--<!-- Modal body -->--}}
{{--<div class="modal-body">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-8">--}}
{{--<b class="text-primary">DATE</b>&nbsp;:&nbsp;{{$mostsearch->created_at }}--}}
{{--<br>--}}
{{--<b class="text-primary">Address</b> &nbsp;:&nbsp;{{$mostsearch->productAddress}}--}}
{{--<br>--}}
{{--<b class="text-primary"> Price&nbsp;</b>:&nbsp;{{$mostsearch->productPrice}}$--}}
{{--</div>--}}
{{--<div class="col-sm-4">--}}
{{--<img src="/images/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail" /><br>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<!-- Modal footer -->--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}




{{--</div>--}}

{{--@endforeach<!--end for-->--}}




{{--</div><!--end col 9-->--}}
{{--</div><!--end row for displaying product-->--}}
{{--<div class="col-sm-1">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="col-sm-12">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-10"></div>--}}
{{--<div class="col-sm-2"><a href="/mostsearched" style="color:gray;"><p style="color:rgb(138, 135, 135);"><i class="fas fa-angle-double-right"></i> Show More</p></a></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<br>--}}
{{--<!--begin products with lowest price-->--}}
{{--</div>--}}
{{--<!--end search-->--}}
{{--<!--end carousal-->--}}
{{--<div class="row" style="">--}}
{{--<div  class="col-sm-12 parallax" style="background-image: url({{asset('images/Saving-plans.jpg')}});" >--}}
{{--<div  class="row mx-auto text-center" ><div  class="col-sm-12 text-center">--}}
{{--<h2 style="color:#d6d6d6;">Get Ready For More Opportunities!</h1><br>--}}
{{--<h3 style="color:#f3f0f0;">You ara minutes away from Browse your latest product you buy</h3></h2><br>--}}
{{--</div></div>--}}
{{--<div  class="row"><br><br><div  class="col-sm-12 text-center"><br>--}}
{{--<button class="btn btn-danger mx-auto"   >Join Nows</button><br>--}}
{{--</div></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<!--begin searched products-->--}}
{{--<div class="row" style=""><div class="col-sm-12" >--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-5"><br><br>--}}
{{--<h1 class="text-secondary">Latest searched by users</h1>--}}
{{--<hr style="background-color:gray;border-color:gray;"><br><br>--}}
{{--</div>--}}
{{--<div class="col-sm-5"></div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-9">--}}
{{--<div class="row">--}}
{{--<!--begin for loop-->--}}

{{--@foreach($mostsearchproduct as $mostsearch)--}}
{{--<div class="col-sm-3"  id="img-prd">--}}
{{--<span   class="dislik"style="width:8%;background-color:gray;" id="dislikediv">{{$mostsearch->like}}--}}
{{--@if(Auth::check())--}}
{{--<button class="dislikeclicked1"> <i class="far fa-thumbs-up"></i></button>--}}
{{--@endif--}}
{{--</span><span>--}}
{{--<span  class="dislik"style="width:8%;background-color:gray;" id="dislikediv">{{$mostsearch->dislike}}</span>--}}
{{--@if(Auth::check())--}}
{{--<button class="dislikeclicked1"> <i class="far fa-thumbs-down"></i></button>--}}
{{--@endif--}}
{{--</span>--}}
{{--<br>--}}
{{--<img src="/img/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail imgprd" /><br>--}}
{{--<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="modal1" style="margin-left:50px;margin-bottom:1000px;">--}}
{{--Show--}}
{{--</button>--}}

{{--<div class="modal fade" id="myModal">--}}
{{--<div class="modal-dialog modal-xl">--}}
{{--<div class="modal-content">--}}

{{--<!-- Modal Header -->--}}
{{--<div class="modal-header">--}}
{{--<h4 class="modal-title"><b class="text-primary">{{$mostsearch->productName}}</b> </h4>--}}
{{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--</div>--}}

{{--<!-- Modal body -->--}}
{{--<div class="modal-body">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-8">--}}
{{--<b class="text-primary">DATE</b>&nbsp;:&nbsp;{{$mostsearch->created_at }}--}}
{{--<br>--}}
{{--<b class="text-primary">Address</b> &nbsp;:&nbsp;{{$mostsearch->productAddress}}--}}
{{--<br>--}}
{{--<b class="text-primary"> Price&nbsp;</b>:&nbsp;{{$mostsearch->productPrice}}$--}}
{{--</div>--}}
{{--<div class="col-sm-4">--}}
{{--<img src="/images/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail" /><br>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<!-- Modal footer -->--}}
{{--<div class="modal-footer">--}}
{{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}




{{--</div>--}}

{{--@endforeach<!--end for-->--}}




{{--</div><!--end col 9-->--}}
{{--</div><!--end row for displaying product-->--}}
{{--<div class="col-sm-1">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="col-sm-12">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-10"></div>--}}
{{--<div class="col-sm-2"><a href="/mostsearched" style="color:gray;"><p style="color:rgb(138, 135, 135);"><i class="fas fa-angle-double-right"></i> Show More</p></a></div>--}}
{{--</div>--}}
{{--</div></div>--}}

{{--<br>--}}
<!--begin products with lowest price-->

{{--<div class="col-sm-12" >--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-5"><br><br>--}}
{{--<h1 class="text-secondary">The lowest prices at our website</h1>--}}
{{--<hr style="background-color:gray;border-color:gray;"><br><br>--}}
{{--</div>--}}
{{--<div class="col-sm-5"></div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-9">--}}
{{--<div class="row">--}}
{{--<!--begin for loop-->--}}
{{--@foreach($products as $product)--}}
{{--<div class="col-sm-3"  >--}}
{{--<div class="card w-100 h-100" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top w-50 h-50" src="/img/{{$product->	productImage}}" alt="Card image" style="width:100%">--}}
{{--<div class="card-body  h-100">--}}
{{--<small class="card-title font-weight-bold">{{$product->productName}}</small><br>--}}
{{--<small class="card-text">{{$product->productPrice}}</small>--}}
{{--<p >{{$product->productAddress}}</p>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--@endforeach--}}
{{--<!--end for-->--}}

{{--</div>--}}
{{--</div>--}}




{{--</div><!--end col 9-->--}}
{{--</div><!--end row for displaying product-->--}}
{{--<div class="col-sm-1">--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="col-sm-12">--}}
{{--<div class="row">--}}
{{--<div class="col-sm-10"></div>--}}
{{--<div class="col-sm-2"><!--<a href="/mostsearched" style="color:gray;"><p style="color:rgb(138, 135, 135);"><i class="fas fa-angle-double-right"></i> Show More</p></a>--></div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<br>--}}


{{--<!--end products with lowest price-->--}}






{{--<!--end searched products-->--}}

{{--<div  class="col-sm-12 parallax" style="background-image: url({{asset('images/Saving-plans.jpg')}});" >--}}
{{--<div  class="row mx-auto text-center" ><div  class="col-sm-12 text-center">--}}
{{--<h2 style="color:#d6d6d6;">Get Ready For More Opportunities!</h1><br>--}}
{{--<h3 style="color:#f3f0f0;">You ara minutes away from Browse your latest product you buy</h3></h2><br>--}}
{{--</div></div>--}}
{{--<div  class="row"><br><br><div  class="col-sm-12 text-center"><br>--}}
{{--<button class="btn btn-danger mx-auto"   >Join Nows</button><br>--}}
{{--</div></div>--}}
{{--</div>--}}

{{--<!--end join now-->--}}

{{--<!--companies discount-->--}}
{{--<div class="col-sm-12" >--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-6"><br><br>--}}
{{--<h1 class="text-secondary">Latest Discounts Browsed</h1>--}}
{{--<hr style="background-color:gray;border-color:gray;"><br><br>--}}
{{--</div>--}}
{{--<div class="col-sm-5"></div>--}}
{{--</div>--}}

{{--<div class="row">--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">--}}
{{--<div class="carousel-inner">--}}
{{--<div class="carousel-item active">--}}
{{--<div class="row"><div class="col-md-1 col-sm-6 col-12" ></div>--}}
{{--<div class="col-md-3 col-sm-6 col-12" >--}}
{{--<a href="#"> <div class="card" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">--}}
{{--<div class="card-body">--}}
{{--<small class="card-title font-weight-bold">Assuit Governate</small><br>--}}
{{--<small class="card-text">Products postes at assuit</small>--}}
{{--</div>--}}
{{--</div>--}}
{{--</a>--}}
{{--</div>--}}
{{--<div class="col-md-3 col-sm-6 col-12" >--}}
{{--<a href="#">--}}
{{--<div class="card" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">--}}
{{--<div class="card-body">--}}
{{--<small class="card-title font-weight-bold">Assuit Governate</small><br>--}}
{{--<small class="card-text">Products postes at assuit</small>--}}
{{--</div>--}}
{{--</div>--}}
{{--</a>--}}
{{--</div>--}}
{{--<div class="col-md-3 col-sm-6 col-12">--}}
{{--<a href="#">                                        <div class="card" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">--}}
{{--<div class="card-body">--}}
{{--<small class="card-title font-weight-bold">Assuit Governate</small><br>--}}
{{--<small class="card-text">Products postes at assuit</small>--}}
{{--</div>--}}
{{--</div></a>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--<div class="carousel-item">--}}
{{--<div class="row">--}}
{{--<div class="col-md-1 col-sm-6 col-12" ></div>--}}
{{--<div class="col-md-3 col-sm-6 col-12" ><a href="#">--}}
{{--<div class="card" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">--}}
{{--<div class="card-body">--}}
{{--<small class="card-title font-weight-bold">Assuit Governate</small><br>--}}
{{--<small class="card-text">Products postes at assuit</small>--}}
{{--</div>--}}
{{--</div>--}}
{{--</a></div>--}}
{{--<div class="col-md-3 col-sm-6 col-12" >--}}
{{--<a href="#"><div class="card" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">--}}
{{--<div class="card-body">--}}
{{--<small class="card-title font-weight-bold">Assuit Governate</small><br>--}}
{{--<small class="card-text">Products postes at assuit</small>--}}
{{--</div>--}}
{{--</div></a>--}}
{{--</div>--}}
{{--<div class="col-md-3 col-sm-6 col-12">--}}
{{--<a href="#"><div class="card" style="width: 100%;max-height:100%;height: auto; ">--}}
{{--<img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">--}}
{{--<div class="card-body">--}}
{{--<small class="card-title font-weight-bold">Assuit Governate</small><br>--}}
{{--<small class="card-text">Products postes at assuit</small>--}}
{{--</div>--}}
{{--</div></a>--}}
{{--</div>--}}

{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="background-color:rgb(133, 133, 130);color:red;width:5%;height:3%;height:auto;border-radius:60%;">--}}
{{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--<span class="sr-only" style="color:rgb(26, 26, 24);" >Previous</span>--}}
{{--</a>--}}
{{--<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="background-color:rgb(133, 133, 130);color:red;width:5%;height:3%;height:auto;border-radius:60%;">--}}
{{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--<span class="sr-only" style="color:rgb(26, 26, 24);" >Next</span>--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}

{{--</div>--}}





{{--</div>--}}
































{{--<br>--}}
{{--<!--footer-->--}}
{{--<div  class="col-sm-12 footer">--}}
{{--<div class="row"><br><br>--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-8"><br><br><p class="font-weight-bold"><strong><i class="fas fa-money-bill-wave"></i>&nbsp;WaffeR.com</strong></p></div>--}}
{{--<div class="col-sm-2" ><br><br><a href="#" id="footerlink"><p class="font-weight-bold text-right"  for="up"><strong ><i class="fas fa-chevron-up"></i></strong></p></a></div>--}}
{{--<div class="col-sm-1"></div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<div class="col-sm-10">--}}
{{--<hr style="background-color:gray;border-color:gray;">--}}
{{--</div>--}}
{{--<div class="col-sm-1"></div>--}}
{{--</div>--}}
{{--<div class="row">--}}
{{--<div class="col-sm-1"></div>--}}
{{--<!--firstcolumn-->--}}
{{--<div class="col-sm-3"><br><strong>WaffeR</strong><br>--}}
{{--<p>Customers and componies ,<br>go to our website</p>--}}

{{--</div>--}}
{{--<div class="col-sm-2" id="footerlinks"><br><strong>Links</strong><br>--}}
{{--<p><a href="#">Waffer Coaches</a> <br><a href="#">Waffer coaches</a><br><a href="#">About Us</a><br>--}}
{{--</p>--}}
{{--</div>--}}
{{--<div class="col-sm-2" id="footerlinks"><br><br><p><a href="#">Parteners</a> <br><a href="#">Contact Us</a><br></p></div>--}}
{{--<div class="col-sm-3" id="footerlinks">--}}
{{--<br><strong>Follow Us</strong><br>--}}
{{--<a href="/www.facebook.com" style="color:white;"><i class="fab fa-facebook-square"></i></a>&nbsp;&nbsp;&nbsp;--}}
{{--<a href="/www.twitter.com" style="color:white;"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;--}}
{{--<a href="/www.google.com" style="color:white;"><i class="fab fa-google"></i></a>&nbsp;&nbsp;&nbsp;--}}
{{--<a href="/www.instagram.com" style="color:white;"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;--}}
{{--<a href="/www.youtube.com" style="color:white;"> <i class="fab fa-youtube"></i></a>&nbsp;&nbsp;&nbsp;<br>--}}
{{--<br><small>© 2019 WaffeR. All Rights Reserved.<br> Owned by <a href="#" id="footerlink">BasharSoft LLC.</a> </small><br><br>--}}
{{--</div>--}}
{{--<div class="col-sm-1" >--}}
{{--</div>--}}
{{--</div>--}}



{{--</div>--}}
{{--<!--end-footer-->--}}

{{--</body>--}}
{{--</html>--}}
