@extends('admin.master')
@section('content')

    <div class="container-fluid " style="margin-bottom: 5%">
        <div class="row">
            <div class="col-md-8">
                <div class="dropdown dropright">
                    <button type="button" class="btn  dropdown-toggle" data-toggle="dropdown" style="background: #2ed8b6;color:white">
                        choose category
                    </button>
                    <div class="dropdown-menu">
                        @foreach($catName as $cname)
                            <a class="dropdown-item" href="showProductByCatId/{{$cname->id}}">{{$cname->categoryName}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid ">
        <div class="  justify-content-center">
            <div class="col-md-12 ">
                <div class="card table-card ">
                    <div class="card-header  d-flex flex-row justify-content-between ">
                        <h5 id="products"> Products</h5>
                        <ul class="list-unstyled d-flex flex-row">
                            <li ><a href="/adminadd"><i class="fas fa-plus-circle" style="color: #ff5370 ; font-size: 1.8em"></i></a></li>
                        </ul>
                    </div>
                    <div class="card-blok " >
                        <div class="table-responsive ">
                            <table class="  table table-hover m-b-0" id="table">
                                <thead>
                                <tr>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>User Phone</th>
                                    <th>User Type</th>
                                    <th>User City</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->type}}</td>
                                        <td>{{$user->city}}</td>
                                        <td><a href="/{{$user->id}}/deleteUser"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5 ">
        <div class="row d-flex justify-content-around">
            <div class="col-md-3 ">
                <div class="p-3 bg-white ">
                    <i class="fas fa-users pt-3" style="  float: right; font-size: 1.8em ; color: #4099ff"></i>
                    <h6>Users</h6>
                    <p style="color: #4099ff ; font-weight: bold">{{$countOfUsers}}</p>

                </div>
            </div>
            <div class="col-md-3 ">
                <div class="p-3 bg-white  " >
                    <i class="fab fa-product-hunt pt-3" style="  float: right; font-size: 1.8em ; color:#ffb64d">></i>
                    <h6>Products</h6>
                    <p style="color: #ffb64d ; font-weight: bold">{{$countOfProducts}}</p>
                </div>
            </div>
            <div class="col-md-3 ">
                <div class="p-3 bg-white  " >
                    <i class="fab fa-cuttlefish pt-3" style="  float: right; font-size: 1.8em ; color:#2a9055">></i>
                    <h6>Categoreies</h6>
                    <p style="color: #2a9055 ; font-weight: bold">{{$countOfCategories}}</p>
                </div>
            </div>
        </div>

    </div>
    @endsection