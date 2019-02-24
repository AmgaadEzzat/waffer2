<!DOCTYPE html>
<html>
<head>
    <title>Waffar</title>

    <link rel="stylesheet" href="{{asset('animate.css-master/animate.min.css')}}">
    <script src="{{asset('wow.min.js')}}"></script>
    <script>
        new WOW().init();
    </script>

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
    <link href="{{asset('js/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">



</head>
<style>
.btnnn:hover{
    background-color: white;
    color: white;
}


</style>
<script>

</script>
</head>
<body id="up">



<nav class="navbar navbar-expand-sm fixed-top text-white" id="navbar">

    <a class="navbar-brand font-weight-bold" id="logo" href="{{ url('/') }}"><i class="fas fa-money-bill-wave"></i><STRONG style="">WaffeR</STRONG>.com</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" style="background-color:#49cbe7;color:white;"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
@if(Auth::check())
            <li class="nav-item"  style="padding-left:24px;">

                <a href="/deals"class="btn" style= "border-radius:20px; background-color: #ff5370;color: white">Deals</a>

            </li>
    @endif
            @guest
                <li class="nav-item" style="padding-left:24px;">
                    <a href="{{ route('login') }}"  class="btn btn-warning" style="color:#93ade0; border-radius:20px;color:white">Log in</a>
                </li>

                <li class="nav-item"  style="padding-left:24px;">
                    <a href="{{ route('register') }}" class="btn  navbutton " style="color:#6473e0; border-radius:20px;background-color: #ff5370;color: white">Join now</a>
                </li>
            @else


                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle  font-weight-bold" href="#" style="color: #49cbe7" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-dark" href="/isadmin" id="navlinks"> <span class="teext-light"> <i class="far fa-user"></i></span> profile</a>
                   <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                       <span class=""><i class="fas fa-sign-out-alt"></i></span>   {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>



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
        <div class="col-sm-2">
            {{--<p style="color:#fffdee;"><br><br><br><br><br>--}}
                {{--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our Website Is A Service that <br>Helps You Searching About The<br>--}}
                {{--Product Price To Buy <br> With Lowest Price Help Others to Find Near PLace<br>To Buy Thier Product From--}}
                {{--<br><a herf="/isadmin">Click Here</a>--}}
            {{--</p>--}}
        </div>
        <div class="col-sm-8">
            <!--begin for loop-->
            <br><br><br><br><br><br><br><br><br><label for="txtsearch" class="text-light" id=""style="font-size:1.8vw;" >
                <i class="fas fa-search"></i>
                Search now for the lowest price in <h class="font-weight-bold">Egypt</h></label><br>

            <form action="/insertsearch" method="post">
                {{csrf_field()}}
                <div class="form-group">

                    <div class="input-group mb-3" >
                        <input type="search" name="txtsearch" id="txtsearch" required class="" placeholder="Search is easier now...."style="width:80%;" autocomplete=off />

                        <div class="input-group-append" >
                            <button class="btn btn-light" id="buttonsearch" style="margin-top:12%;margin-bottom:12%;border-top-right-radius:20px;border-bottom-right-radius:20px;color:#93ade0;" type="submit">Search</button>
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
                    $(document).on('click', 'body', function(){
                        $('#productList').fadeOut("slow");
                    });

                });
            </script>
        </div>
        <div class="col-sm-2">
        </div></div>
    <br><br><br><br><br><br><br>

    <br><br><br><br><br><br><br><br><br>
    <div class="row" style=""><div class="col-sm-1" style=""></div>
        <div class="col-sm-7" style="">
            <h3 class="text-secondary">Latest searched by users</h3>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        {{--<div class="col-sm-4" style=""></div>--}}
    </div>

    <div style="visibility:hidden;">{{$count=0}}</div>
    <div class="row wow fadeInRightBig " >
        <div class="col-sm-1" ></div>
        <div class="col-sm-10" >
            <div class="row">

                @foreach($mostsearchproduct as $mostsearch)
                    <div class="col-sm-3" >
                        @if($count ==8)
                            {{$count+=1}}
                            @break
                        @endif
                        <div class="card pt-4" style="width:100%;height:88%;">
                            <b class="text-primary font-weight-bold pl-3">{{$mostsearch->name}}</b>
                            <img class="card-img-top pl-2" src="/images/{{$mostsearch->productImage}}" alt="Card image" style="width:80%;height:40%;">
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










    <div class="row" style="background-color: #dbe6f0;"><div class="col-sm-1" style=""></div>
        <div class="col-sm-7" style="">  <hr style="background-color:gray;border-color:gray;">
            <h1 class="text-secondary">The Lowest Prices At Our Website</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-4" style=""></div></div>



    <div class="row " style="background-color: #dbe6f0;">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="main">

                <div id="myBtnContainer wow fadeInUpBig"><br><br>
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

                                <div class="column col-sm-3 wow fadeInUpBig {{$product->categoryName}}" style="margin-top:10px;background-color: #dbe6f0;" >
                                <div class="container-fluid" style="width:100%;height:100%;background-color: white;">
                                    <b class="text-primary font-weight-bold">{{$product->name}}</b>
                                    <img src="/images/{{$product->productImage}}" class="img-thumbnail"alt="Car" style="width:100%;height:50%;">
                                    <h4>{{$product->productName}}</h4>
                                    {{--<div style="height:10%">{{$product->productDescription}}</div>--}}
                                    <p>
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
                    <br>
                </div>
            </div>
            <!-- END MAIN -->
            <br>
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


    {{--begin of carousel--}}

    <div class="container">
        <h3 class="pt-5" style="text-align: left ; color: gray">Latest additions</h3>
        <section class="customer-logos slider pt-4">
            @foreach($lastProducts as $lastProduct)
            <div class="slide ">
                <img  src="/img/{{$lastProduct->productImage }}">
                <h5 class="pt-3">{{$lastProduct->productName}}</h5>
                <p style="height:50%">{{$lastProduct->productAddress }}<br>
                {{--{{$lastProduct->productDescription }}--}}
                    {{$lastProduct->created_at }}</p>

                <a href="/details/{{$lastProduct->id}} fixed-bottom" class="btn btn-primary">Show More Details</a>
            </div>
       @endforeach


        </section>
        <br><br>
    </div>

    {{--end of carousel--}}



    <div class="row" style="">
        <div  class="col-sm-12 parallax" style="background-image: url({{asset('images/images.jpg')}});" >
            <br><br>
            <div  class="row mx-auto text-center" ><div  class="col-sm-12 text-center">
                    <p class="h-6" style="color:#d6d6d6;">Get Ready For More Opportunities!</p><br>
                        <h4 style="color:#f3f0f0;">You are minutes away from Browse your latest product you buy</h4><br>
                </div></div>
            @if(!Auth::check())
            <div  class="row"><br><br><div  class="col-sm-12 text-center"><br>
                    <a href="{{ route('login') }}" class="btn btn-danger mx-auto"   >Join Now</a><br>
                </div></div>
            @endif
        </div>
    </div>




    <div class="row" style="">

        <div class="col-sm-1" ></div>
        <div class="col-sm-7" style="">
            <h1 class="text-secondary"> <br><br>Available Places At Our Websit</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-4" style=""></div></div>


    <div class="row  style=" ">
        <div class="col-sm-9">
            <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <div id="myBtnContainer"><br><br>
                @foreach($places as $place)
                        <a href="/place/{{$place->productAddress}}" class="btn btnnn"style="background-color:#407410; color:white;"> {{$place->productAddress}}</a>
                @endforeach
                </div>
                <br><br>
            </div>
            <div class="col-sm-1"></div>
            </div>
        </div>
        <div class="col-sm-3 wow bounceIn text-center">
          <a href="/deals" >
              <span> <img src="/images/deas.jpg" id="deals"style="width:70%;height:70%;"/></span><span><b style="font-size:4vw;paddig-top:6px;color:red;">S</b></span>
          </a>

        </div>
</div>
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


</div>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


</body>
</html>

