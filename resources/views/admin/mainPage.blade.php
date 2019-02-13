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
                            <li ><i class="far fa-trash" ></i></li>
                            <li ><i class="far fa-trash" ></i></li>
                            <li ><i class="far fa-trash" ></i></li>
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
                                        <td><a href="/{{$user->id}}/deleteUser"><i class="far fa-trash" ></i> </a></td>
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
    @endsection