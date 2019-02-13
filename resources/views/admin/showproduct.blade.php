@extends('admin.master')
@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-8">
            <div class="dropdown dropright">
            <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown">
               choose category
            </button>
            <div class="dropdown-menu">
                @foreach($catName as $cname)
                <a class="dropdown-item" href="show/{{$cname->id}}">{{$cname->categoryName}}</a>
                @endforeach
            </div>
           </div>
        </div>
        </div>
    </div>
@endsection