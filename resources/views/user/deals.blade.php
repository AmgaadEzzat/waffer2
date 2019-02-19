@extends('user.master')
@section('content')
    <div class="row" >
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
                @foreach($deals as $deal)
                <div class="col-sm-3">
                    <div class="card" style="">
                        <b class="text-primary font-weight-bold">{{$deal->name}}</b>
                        <img class="card-img-top" src="/img/{{$deal->Image}}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{$deal->Heading}}</h4>
                            <p class="card-text"><b class="text-primary">
                                <b class="text-primary"> End Date&nbsp;</b>:&nbsp;{{$deal->end}}<br>
                                <b class="text-primary">Begin Date</b>&nbsp;:&nbsp;{{$deal->begin }}<br></p>
                            <a href="/detailofdeal/{{$deal->id}}" class="btn btn-primary">Show More Details</a>
                        </div>
                    </div>
                </div>
                @endforeach
                    <br><br><br>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <br><br><br>
    </div>
    <br><br><br><br><br><br>
@stop