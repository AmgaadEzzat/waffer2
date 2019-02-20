@extends('admin.master')
@section('content')
    <div class="row">
        @if(session()->has('notif'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification</strong>{{session()->get('notif')}}
                </div>
            </div>
        @endif
        <div class="col-sm-12">
            <div class="row">
                @foreach($deals as $deal)
                    <div class="col-sm-4">
                        <div class="card" style="">
                            <b class="text-primary font-weight-bold">{{$deal->name}}</b>
                            <img class="card-img-top" src="/img/{{$deal->Image}}" alt="Card image">
                            <div class="card-body">
                                <h4 class="card-title">{{$deal->Heading}}</h4>
                                <p class="card-text">
                                    <b class="text-primary"> End Date&nbsp;</b>:&nbsp;{{$deal->end}}<br>
                                    <b class="text-primary">Begin Date</b>&nbsp;:&nbsp;{{$deal->begin }}<br></p>
                                <a href="/delete/{{$deal->id}}" class="btn btn-primary">Delete</a>
                            </div> <!--end of card body-->
                        </div> <!--end of card-->
                    </div>  <!--end of co13-->
                @endforeach
                <br><br>

         </div>
        </div>
    </div>
@endsection