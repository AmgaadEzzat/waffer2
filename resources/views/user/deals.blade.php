@extends('user.master')
@section('content')
    <link rel="stylesheet" href="{{asset('css/homestyle.css')}}">
    <script src="{{asset('js/homejs.js')}}"></script>
    <div class="col-sm-12" >
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-8"><br><br>
                <h1 class="text-secondary">Latest Deals Browsed</h1>
                <hr style="background-color:gray;border-color:gray;"><br><br>
            </div>
            <div class="col-sm-3"></div>
        </div>
    <br><br>
    <div class="row" >
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
  <div class="container-fluid">
     <div class="row"> 
    

        @foreach($deals as $deal)



                <div class="col-sm-3">

                    <div class="card" style="">
                        <b class="text-primary font-weight-bold">{{$deal->name}}</b>
                        <img class="card-img-top" src="/img/{{$deal->Image}}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{$deal->Heading}}</h4>
                            <p class="card-text">
                                <b class="text-primary"> End Date&nbsp;</b>:&nbsp;{{$deal->end}}<br>
                                <b class="text-primary">Begin Date</b>&nbsp;:&nbsp;{{$deal->begin }}<br></p>
                            <a href="/detailofdeal/{{$deal->id}}" class="btn btn-primary">Show More Details</a>
                        </div> <!--end of card body--> 
                    </div> <!--end of card--> 
                    </div>  <!--end of co13--> 
                   
                
                @endforeach
            <br><br>
        </div>  <!--end of row--> 





   </div> <!--end of container-->    
                </div>
        <div class="col-sm-1"></div>
    </div>  <br><br>
    </div>  <br><br></div>
@stop