<html lang="ar">

<head>
    <title> Waffar</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/productDetails.css')}}" rel="stylesheet">
    <link href="{{asset('css/profile.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/projectDetailsJs.js')}}"></script>
    <link rel="shortcut icon" type="image/jpg" href="{{asset('/images/icon.jpg')}}"/>

</head>

<body>
<nav class="navbar navbar-expand-sm   ">

        <a class="navbar-brand " href="#">WaFFar </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon "> <i class="fas fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class=" w-75 ">
            <form action="/insertsearch" method="post">
                {{csrf_field()}}
                <div class="form-group w-75">
                    <div class="input-group mt-4">
                        <input type="text" name="txtsearch" id="txtsearch" class="form-control input-lg" placeholder="Search is easier now...." autocomplete=off />
                        <div class="input-group-append">
                            <button class="btn btn-success btn-outline-light" id="buttonsearch" type="submit">Search</button>
                        </div>
                    </div>
                </div>
                <div id="productList" class="fixed-top" style="padding-top:60px;padding-left:130px;">
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


<div class="w-25 ">
        <ul class="navbar-nav  ">


            @guest
                <li class="nav-item" style="padding-left:24px;">
                    <a href="{{ route('login') }}"  class="btn btn-success">Log in</a>
                </li>

                <li class="nav-item"  style="padding-left:24px;">
                    <a href="{{ route('register') }}" class="btn  navbutton btn-danger">Join now</a>
                </li>
            @else
                <li class="nav-item"> <a href="#" class="nav-link">
                     <h5><span class="badge badge-danger large  mt-1">Deals </span> </h5>
                    </a></li>
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

    </div>

</nav>

@yield("content")

<footer  class="col-sm-12 footer">
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
        <div class="col-sm-3"><br><strong>WaffaR</strong><br>
            <p>Customers and componies ,<br>go to our website</p>

        </div>
        <div class="col-sm-2" id="footerlinks"><br><strong>Links</strong><br>
            <p><a href="#">Waffer Coaches</a> <br><a href="#">Waffer coaches</a><br><a href="#">About Us</a><br>
            </p>
        </div>
        <div class="col-sm-2" id="footerlinks"><br><br><p><a href="#">Parteners</a> <br><a href="#">Contact Us</a><br></p></div>
        <div class="col-sm-3" id="footerlinks">
            <br><strong>Follow Us</strong><br>
            <a href="www.facebook.com" style="color:white;"><i class="fab fa-facebook-square"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.twitter.com" style="color:white;"><i class="fab fa-twitter-square"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.google.com" style="color:white;"><i class="fab fa-google"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.instagram.com" style="color:white;"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;&nbsp;
            <a href="www.youtube.com" style="color:white;"> <i class="fab fa-youtube"></i></a>&nbsp;&nbsp;&nbsp;<br>
            <br><small>© 2019 WaffeR. All Rights Reserved.<br> Owned by <a href="#" id="footerlink">BasharSoft LLC.</a> </small><br><br>
        </div>
        <div class="col-sm-1" >
        </div>
    </div>



</footer>




</body>

</html>
