@extends('layouts.app')


@section('content')
    <style>
        .panel {

            position: relative;

            overflow: hidden;

            display: block;

            border-radius: 0 !important;

        }

        .panel-body {

            width: 100%;

            height: 100%;

            padding: 15px 8px;

            float: left;

            overflow: hidden;

            position: relative;

            text-align: center;

            cursor: default;

        }

        .panel-body .overlay {

            position: absolute;

            overflow: hidden;

            width: 80%;

            height: 80%;

            left: 10%;

            top: 10%;

            border-bottom: 1px solid #FFF;

            border-top: 1px solid #FFF;

            -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;

            transition: opacity 0.35s, transform 0.35s;

            -webkit-transform: scale(0,1);

            -ms-transform: scale(0,1);

            transform: scale(0,1);

        }

        .panel-body .overlay i{

            opacity: 0;

        }

        .panel-body a:hover .overlay {

            opacity: 1;

            filter: alpha(opacity=100);

            -webkit-transform: scale(1);

            -ms-transform: scale(1);

            transform: scale(1);

        }

        .panel-body a:hover img {

            filter: brightness(0.6);

            -webkit-filter: brightness(0.6);

        }

        .like-btn{

            background: #3399ff none repeat scroll 0 0;

            border-radius: 3px;

            color: white;

            padding: 7px 3px 3px 7px;

            margin-right: 5px;

            margin-top: -5px;

        }

        .like-btn i,.dislike-btn i{

            color: white;

        }

        .dislike-btn{

            background: #FA4E69 none repeat scroll 0 0;

            border-radius: 3px;

            color: white;

            padding: 7px 5px 3px 3px;

            margin-top: -5px;

        }

        h2 {

            padding: 15px;

            font-family: calibri;

            display: inline-block;

        }

        .panel .panel-body a {

            overflow: hidden;

        }

        .panel .panel-body a img {

            display: block;

            margin: 0;

            width: 100%;

            height: auto;

        }

        .panel .panel-body a:hover span.overlay {

            display: block;

            visibility: visible;

            opacity: 0.55;

            -moz-opacity: 0.55;

            -webkit-opacity: 0.55;

        }

        .panel .panel-body a:hover span.overlay i {

            position: absolute;

            top: 45%;

            left: 0%;

            width: 100%;

            font-size: 2.25em;

            color: #fff !important;

            text-align: center;

            opacity: 1;

            -moz-opacity: 1;

            -webkit-opacity: 1;

        }

        .panel .panel-footer {

            padding: 8px !important;

            background-color: #f9f9f9 !important;

            border:0px;

        }

        .panel .panel-footer h4 {

            display: inline;

            font: 400 normal 1.125em "Roboto",Arial,Verdana,sans-serif;

            color: #34495e margin: 0 !important;

            padding: 0 !important;

            font-size: 12px;

        }

        .panel .panel-footer h4 a{

            padding: 4px 7px;

            text-decoration: none;

        }

        .panel .panel-footer h4 a:hover{

            background-color: #69a8d4;

            color: white;

            border-radius: 2px;

            transition: all 0.4s;

        }

        .panel .panel-footer i.glyphicon {

            display: inline;

            font-size: 1.125em;

            cursor: pointer;

            padding-right: 7px;

        }

        .panel .panel-footer i.glyphicon-thumbs-down {

            color: #e74c3c;

            padding-left: 5px;

            padding-right: 5px;

        }

        .panel .panel-footer div {

            width: 15px;

            display: inline;

            font: 300 normal 1.125em "Roboto",Arial,Verdana,sans-serif;

            color: white !important;

            text-align: center;

            background-color: transparent !important;

            border: none !important;

        }

        .like-post{

            color: #e21309 !important;

        }
    </style>

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">Posts</div>


                    <div class="card-body">

                        @if($posts->count())

                            @foreach($posts as $post)

                                <article class="col-xs-12 col-sm-6 col-md-3">

                                   <div class="panel panel-info" data-id="{{ $post->id }}">

                                        <div class="panel-body">

                                            <a href="https://itsolutionstuff.com/upload/itsolutionstuff.png" title="Nature Portfolio" data-title="Amazing Nature" data-footer="The beauty of nature" data-type="image" data-toggle="lightbox">

                                                <img src="https://itsolutionstuff.com/upload/itsolutionstuff.png" alt="Nature Portfolio" />

                                                <span class="overlay"><i class="fa fa-search"></i></span>

                                            </a>

                                        </div>

                                        <div class="panel-footer">

                                            <h4><a href="#" title="Nature Portfolio">{{ $post->title }}</a></h4>

                                            <span class="pull-right">

                                            <span class="like-btn">

                                                <i id="like{{$post->id}}" class="glyphicon glyphicon-thumbs-up {{ auth()->user()->hasLiked($post) ? 'like-post' : '' }}"></i> <div id="like{{$post->id}}-bs3">{{ $post->likers()->get()->count() }}</div>

                                            </span>

                                        </span>

                                        </div>

                                    </div>

                                </article>

                            @endforeach

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>


    <script type="text/javascript">

        $(document).ready(function() {


            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });


            $('i.glyphicon-thumbs-up, i.glyphicon-thumbs-down').click(function(){

                var id = $(this).parents(".panel").data('id');

                var c = $('#'+this.id+'-bs3').html();

                var cObjId = this.id;

                var cObj = $(this);


                $.ajax({

                    type:'POST',

                    url:'/ajaxRequest',

                    data:{id:id},

                    success:function(data){

                        if(jQuery.isEmptyObject(data.success.attached)){

                            $('#'+cObjId+'-bs3').html(parseInt(c)-1);

                            $(cObj).removeClass("like-post");

                        }else{

                            $('#'+cObjId+'-bs3').html(parseInt(c)+1);

                            $(cObj).addClass("like-post");

                        }

                    }

                });


            });


            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {

                event.preventDefault();

                $(this).ekkoLightbox();

            });

        });

    </script>

@endsection