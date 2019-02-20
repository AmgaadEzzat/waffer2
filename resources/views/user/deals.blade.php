@extends('user.master')
@section('content')
<<<<<<< HEAD

    <br><br>
    <div class="row" >
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="row">
=======
>>>>>>> e6fec2d75905335e984c91c2d4db27db7869f003




  <div class="container-fluid">
     <div class="row"> 
    

        @foreach($deals as $deal)
<<<<<<< HEAD
                <div class="col-sm-4">

=======
                <div class="col-sm-3">
>>>>>>> e6fec2d75905335e984c91c2d4db27db7869f003
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
        </div>  <!--end of row--> 





   </div> <!--end of container-->    
                </div></div>
        <div class="col-sm-1"></div>
    </div>
    
@stop