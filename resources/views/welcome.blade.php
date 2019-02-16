<!DOCTYPE html>
<html>
<head>
    <title>Waffar</title>


    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/homestyle.css')}}">
    <script src="{{asset('js/homejs.js')}}"></script>
    <link rel="shortcut icon" type="image/jpg" href="{{asset('images/icon.jpg')}}"/>

</head>
<style>

</style>
<script>

</script>
</head>
<body id="up">



<nav class="navbar navbar-expand-sm fixed-top text-white" id="navbar">

    <a class="navbar-brand font-weight-bold" id="logo" href="{{ url('/home') }}"><STRONG><i class="fas fa-money-bill-wave"></i>WaffeR</STRONG></a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon" style="background-color:rgb(224, 220, 220);color:red;"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link font-weight-bold navlink4" href="#" id="navlinks">Browse product</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold navlink4" href="#" id="navlinks">Search</a>
            </li>
            <li class="nav-item">
                <a class="nav-link font-weight-bold navlink4" href="#" id="navlinks">Message</a>
            </li>
            <li class="nav-item">
                <div class="btn-group">

                    <a  href="#" class="  dropdown-toggle-split nav-link font-weight-bold navlink4"id="navlinks" data-toggle="dropdown"><i class="fas fa-money-check"></i>
                    </a>
                    <div class="dropdown-menu" style="background-color:rgb(228, 166, 166);">
                        <a class="dropdown-item" href="#">Contact Us</a>
                        <a class="dropdown-item" href="#">About Us</a>
                        <a class="dropdown-item" href="#">More</a>
                    </div>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">

            <li class="nav-item"  style="padding-left:24px;">
                <div class="dropdown dropleft">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                        English
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">EngLish</a>
                        <a class="dropdown-item" href="#">عربى</a>
                    </div>
                </div>
            </li>
            @guest
            <li class="nav-item" style="padding-left:24px;">
                <a href="{{ route('login') }}"  class="btn btn-success">Log in</a>
            </li>

            <li class="nav-item"  style="padding-left:24px;">
                <a href="{{ route('register') }}" class="btn  navbutton btn-danger">Join now</a>
            </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                        </div>
                    </li>
                @endguest
        </ul>

    </div>
</nav>
<!--end navbar-->
<!--carousal-->
<div class="col-sm-12" id="carousal" style="background-image: url({{asset('images/save6.jpg')}});">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

            <label for="txtsearch" class="text-danger" style="padding-top:180px;font-size:2vw;">
                <i class="fas fa-search"></i>
                Search now for the lowest price<br> in <h class="font-weight-bold">Egypt</h></label><br><br>

<form action="/insertsearch" method="post">
{{csrf_field()}}
    <div class="form-group">
    
    <div class="input-group mb-3" >
    
        <input type="text" name="txtsearch" id="txtsearch" class="form-control input-lg" placeholder="Search is easier now...." autocomplete=off />
       
         <div class="input-group-append" >
                    <button class="btn btn-danger" id="buttonsearch" type="submit">Search</button>
                </div>
                </div>
                </div>
                
 <div id="productList">
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
        <div class="col-sm-2"></div>
    </div>
</div>

<!--end search-->
<!--end carousal-->

<!--begin searched products-->

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
                    <div class="col-sm-3"  id="img-prd">
                                            <span   class="dislik"style="width:8%;background-color:gray;" id="dislikediv">{{$mostsearch->like}}
                                @if(Auth::check())
                                    <button class="dislikeclicked1"> <i class="far fa-thumbs-up"></i></button>
                                @endif
                        </span><span>
                                           <span  class="dislik"style="width:8%;background-color:gray;" id="dislikediv">{{$mostsearch->dislike}}</span>
                                @if(Auth::check())
                                    <button class="dislikeclicked1"> <i class="far fa-thumbs-down"></i></button>
                                @endif
                        </span>
                        <br>
                        <img src="/img/{{$mostsearch->productImage}}"style="width: 100%;max-height:70%;height: auto; " class="img-thumbnail imgprd" /><br>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal" id="modal1" style="margin-left:50px;margin-bottom:1000px;">
                            Show
                        </button>

                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title"><b class="text-primary">{{$mostsearch->productName}}</b> </h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <b class="text-primary">DATE</b>&nbsp;:&nbsp;{{$mostsearch->created_at }}
                                                <br>
                                                <b class="text-primary">Address</b> &nbsp;:&nbsp;{{$mostsearch->productAddress}}
                                                <br>
                                               <b class="text-primary"> Price&nbsp;</b>:&nbsp;{{$mostsearch->productPrice}}$
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
        <div class="col-sm-1">
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2"><a href="/mostsearched" style="color:gray;"><p style="color:rgb(138, 135, 135);"><i class="fas fa-angle-double-right"></i> Show More</p></a></div>
    </div>
</div>
<br>
<!--begin products with lowest price-->

<div class="col-sm-12" >
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-5"><br><br>
            <h1 class="text-secondary">The lowest prices at our website</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-9">
            <div class="row">
                <!--begin for loop-->
               @foreach($products as $product)
                    <div class="col-sm-3"  >
                        <div class="card w-100 h-100" style="width: 100%;max-height:100%;height: auto; ">
                            <img class="card-img-top w-50 h-50" src="/img/{{$product->	productImage}}" alt="Card image" style="width:100%">
                            <div class="card-body  h-50">
                                <small class="card-title font-weight-bold">{{$product->productName}}</small><br>
                                <small class="card-text">{{$product->productPrice}}</small>
                                <p >{{$product->productAddress}}</p>
                            </div>
                        </div>
                    </div>

                   @endforeach
                        <!--end for-->

                    </div>
            </div>




            </div><!--end col 9-->
        </div><!--end row for displaying product-->
        <div class="col-sm-1">
        </div>
    </div>
</div>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2"><!--<a href="/mostsearched" style="color:gray;"><p style="color:rgb(138, 135, 135);"><i class="fas fa-angle-double-right"></i> Show More</p></a>--></div>
    </div>
</div>
<br>


<!--end products with lowest price-->






<!--end searched products-->

<div  class="col-sm-12 parallax" style="background-image: url({{asset('images/Saving-plans.jpg')}});" >
    <div  class="row mx-auto text-center" ><div  class="col-sm-12 text-center">
            <h2 style="color:#d6d6d6;">Get Ready For More Opportunities!</h1><br>
                <h3 style="color:#f3f0f0;">You ara minutes away from Browse your latest product you buy</h3></h2><br>
        </div></div>
    <div  class="row"><br><br><div  class="col-sm-12 text-center"><br>
            <button class="btn btn-danger mx-auto"   >Join Nows</button><br>
        </div></div>
</div>

<!--end join now-->

<!--companies discount-->
<div class="col-sm-12" >
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-6"><br><br>
            <h1 class="text-secondary">Latest Discounts Browsed</h1>
            <hr style="background-color:gray;border-color:gray;"><br><br>
        </div>
        <div class="col-sm-5"></div>
    </div>

    <div class="row">
        <div class="container">
            <div class="row">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row"><div class="col-md-1 col-sm-6 col-12" ></div>
                                <div class="col-md-3 col-sm-6 col-12" >
                                    <a href="#"> <div class="card" style="width: 100%;max-height:100%;height: auto; ">
                                            <img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <small class="card-title font-weight-bold">Assuit Governate</small><br>
                                                <small class="card-text">Products postes at assuit</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12" >
                                    <a href="#">
                                        <div class="card" style="width: 100%;max-height:100%;height: auto; ">
                                            <img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <small class="card-title font-weight-bold">Assuit Governate</small><br>
                                                <small class="card-text">Products postes at assuit</small>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="#">                                        <div class="card" style="width: 100%;max-height:100%;height: auto; ">
                                            <img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <small class="card-title font-weight-bold">Assuit Governate</small><br>
                                                <small class="card-text">Products postes at assuit</small>
                                            </div>
                                        </div></a>
                                </div>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row">
                                <div class="col-md-1 col-sm-6 col-12" ></div>
                                <div class="col-md-3 col-sm-6 col-12" ><a href="#">
                                        <div class="card" style="width: 100%;max-height:100%;height: auto; ">
                                            <img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <small class="card-title font-weight-bold">Assuit Governate</small><br>
                                                <small class="card-text">Products postes at assuit</small>
                                            </div>
                                        </div>
                                    </a></div>
                                <div class="col-md-3 col-sm-6 col-12" >
                                    <a href="#"><div class="card" style="width: 100%;max-height:100%;height: auto; ">
                                            <img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <small class="card-title font-weight-bold">Assuit Governate</small><br>
                                                <small class="card-text">Products postes at assuit</small>
                                            </div>
                                        </div></a>
                                </div>
                                <div class="col-md-3 col-sm-6 col-12">
                                    <a href="#"><div class="card" style="width: 100%;max-height:100%;height: auto; ">
                                            <img class="card-img-top" src="images/assuitgover.jpg" alt="Card image" style="width:100%">
                                            <div class="card-body">
                                                <small class="card-title font-weight-bold">Assuit Governate</small><br>
                                                <small class="card-text">Products postes at assuit</small>
                                            </div>
                                        </div></a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev" style="background-color:rgb(133, 133, 130);color:red;width:5%;height:3%;height:auto;border-radius:60%;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only" style="color:rgb(26, 26, 24);" >Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next" style="background-color:rgb(133, 133, 130);color:red;width:5%;height:3%;height:auto;border-radius:60%;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only" style="color:rgb(26, 26, 24);" >Next</span>
                    </a>
                </div>
            </div>
        </div>

    </div>





</div>
































<br>
<!--footer-->
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



</div>
<!--end-footer-->

</body>
</html>
