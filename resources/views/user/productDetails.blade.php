@extends('user.master')
@section('content')

    <div class="container-fluid">
        <div class="row container-fluid">
            <div class="col-sm-2 border  border-secondary ">
                <div class="dropdown">
                    <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
                        Browse By Category
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item border border-secondary border-bottom-0 " href="#">Mobiles & Tablets</a>
                        <a class="dropdown-item border border-secondary border-bottom-0" href="#">Computer & Software</a>
                        <a class="dropdown-item  border border-secondary" href="#">Electorinc</a>

                    </div>
                </div>
            </div>
            <div class="col-sm-10 border  border-secondary border-left-0 d-inline-flex justify-content-end  small">
                <a href="#" class="m-2"> Mobiles & Tablets </a>

                <a href="#" class="m-2"> Mobiles </a>

                <a href="#" class="m-2"> Smart phones </a>
            </div>
        </div>
    </div>
    <div class="container m-5 ">
        <div class="row">
            <div class="col-sm-3 col-xs-2 border  border-secondary">

                <a href="#" data-toggle="modal" data-target="#myModal"> <img src="images/mob1.jpg" class="w-100 m-2">  </a>
                <div id="demo" class="carousel slide" data-ride="carousel">



                    <!-- The slideshow -->
                    <div class="carousel-inner m-2">
                        <div class="carousel-item active">
                            <img src="images/2.jpg" class="w-25 " >
                        </div>
                        <div class="carousel-item ">
                            <img src="images/3.jpg"  class="w-25">
                        </div>
                        <div class="carousel-item ">
                            <img src="images/huawei_nova3i.jpg"  class="w-25 ">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Product </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>


                            <div class="modal-body">
                                <div id="modelDemo" class="carousel slide" data-ride="carousel">



                                    <!-- The slideshow -->
                                    <div class="carousel-inner m-2">
                                        <div class="carousel-item active">
                                            <img src="images/2.jpg" class="w-50 " >
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/3.jpg"  class="w-50 ">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="images/4.jpg"  class="w-50 ">
                                        </div>
                                        <div class="carousel-item ">
                                            <img src="images/huawei_nova3i.jpg"  class="w-50 ">
                                        </div>
                                    </div>

                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#modelDemo" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#modelDemo" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>

                                </div>

                            </div>



                        </div>



                    </div>



                </div>
            </div>



            <div class="col-sm-9  border  border-secondary border-left-0 container">  <a href="#">  <h1>Product name and details</h1></a>
                <span class="border border-secondary w-75 p-2 m-4"  > Price 333.22$</span>
                <span class="badge badge-success m-4"> live</span>
                <br>
                <span class="m-4"> product details </span>
                <div class="m-4"> <button class="btn btn-success"> Buy it from Jumia</button> </div>
                <div id=stars class="m-4 d-inline-flex">
                    <span style="color:rgb(179, 75, 75);"><i class="far fa-star"></i></span>
                    <span style="color:rgb(179, 75, 75);"><i class="far fa-star"></i></span>
                    <span style="color:rgb(179, 75, 75);"><i class="far fa-star"></i></span>
                    <span style="color:rgb(179, 75, 75);"><i class="far fa-star"></i></span>
                    <span style="color:rgb(179, 75, 75);"><i class="far fa-star"></i></span>
                    <ul class="nav d-inline-flex ">
                        <li class=""><a href="#" class="p-2"> Be the frist to review</a></li>
                        <li ><a href="#" class="p-2"> Add a wish list</a></li>
                        <li ><a href="#" class="p-2"> Search for samilar items</a></li>
                    </ul>
                </div>
                <div> Share:
                    <span > <a href="www.facebook.com" style="color:blue ; font-size: 35px;"> <i class="fab fa-facebook-square"></i></a></span>
                    <span ><a href="www.twitter.com" style="color:darkturquoise ;font-size: 35px;">  <i class="fab fa-twitter"></i></a></span>
                    <span ><a href="www.google.com" style="color:firebrick;font-size: 35px;"> <i class="fab fa-google-plus"></i></a> </span>

                </div>


            </div>
        </div>
    </div>



    <div class="container ">
        <div class="row justify-content-between  m-3 p-3  border border-light" style="background-color:rgb(226, 219, 219)">
            <h3 class=""> the best seller in smartphones </h3>
            <span class="m-2 ">    <a href="#"> More..</a></span>
        </div>
        <div class="row " id=bestsellerDiv>

            <div class="col-sm-3 " >
                <div class="crad border ">
                    <img src="images/2.jpg"  class="w-50 m-5">
                    <div class="card-body cardstyle" >
                        <a href="#"  class="m-4 text-center">  product name </a>
                        <br>
                        <span class="small m-2 p-4 text-secondary"> the price from "the place"</span>

                        <br>
                        <span class="text-*-center   p-4 font-weight-bold"  style="color:red;"> 5658.25 EGP </span>


                    </div>
                </div>
            </div>






        </div>



    </div>


@stop