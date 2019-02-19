@extends('user.master')
@section('content')
    <br><br>
<div class="row" >
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        @if(session()->has('notif'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close"
                            data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>Notification</strong>{{session()->get('notif')}}
                </div>
            </div>
        @endif
        <div class="row">
            @foreach($deals as $deal)
                <div class="col-sm-4">
                    <div class="card" style="width:100%;">
                        <img class="card-img-top" src="/img/{{$deal->Image}}" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">{{$deal->Heading}}</h4>
                            <p class="card-text"><b class="text-primary">
                                    <b class="text-primary"> End Date&nbsp;</b>:&nbsp;{{$deal->end}}<br>
                                    <b class="text-primary">Begin Date</b>&nbsp;:&nbsp;{{$deal->begin }}<br></p>
                            <a href="/deletedeal/{{$deal->id}}" class="btn btn-primary">Delete</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <br><br><br>
        </div>
    </div>
    <div class="col-sm-1"></div>
</div>
<div class="row"><div class="col-sm-2"></div>
    <div class="col-sm-8">
    <h1> You can Browse A deal For Your Shop </h1><br><br></div>
    <div class="col-sm-2"></div>
</div>
<div class="row" >
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
<form method="POST" action="store" enctype="multipart/form-data">
    @csrf
    <div class="form-group  container row">
        <label for="name" class="col-sm-4 col-form-label text-sm-left">{{ __('Heading') }}</label>

        <div class="col-sm-6">
            <input id="name" type="text" class="form-control{{ $errors->has('Heading') ? ' is-invalid' : '' }}" name="Heading" value="{{ old('Heading') }}" required autofocus>

            @if ($errors->has('Heading'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Heading') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group  container row">
        <label for="Product Price" class="col-sm-4 col-form-label text-sm-left">{{ __('Description') }}</label>

        <div class="col-sm-6">
            <textarea id="Product Price" type="number" class="form-control{{ $errors->has('Description') ? ' is-invalid' : '' }}" name="Description" value="{{ old('Description') }}" required>
            </textarea>
            @if ($errors->has('Description'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('Description') }}</strong>
                                    </span>
            @endif
        </div>
    </div>



    <div class="form-group container row">
        <label for="productDescription" class="col-sm-4 col-form-label text-sm-left">{{ __('begin date') }}</label>
        <div class="col-sm-6">
            <input id="productDescription" type="date" class="form-control{{ $errors->has('begin') ? ' is-invalid' : '' }}" name="begin" value="{{ old('begin') }}" required autofocus>
            @if ($errors->has('begin'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('begin') }}</strong>
                                    </span>
            @endif
        </div>
    </div>

    <div class="form-group container row">
        <label for="productDescription" class="col-sm-4 col-form-label text-sm-left">{{ __('End Date') }}</label>
        <div class="col-sm-6">
            <input id="productDescription" type="date" class="form-control{{ $errors->has('end') ? ' is-invalid' : '' }}" name="end" value="{{ old('end') }}" required autofocus>
            @if ($errors->has('end'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end') }}</strong>
                                    </span>
            @endif
        </div>
    </div>


    <div class="form-group container row">
        <label for="productImage" class="col-sm-4 col-form-label text-sm-left">{{ __('Image for Deal') }}</label>
        <div class="col-sm-6">

            <input id="Image" type="file" value="Abload File" class="form-control{{ $errors->has('Image') ? ' is-invalid' : '' }}" name="Image" required autofocus>
            @if ($errors->has('Image'))
                <span class="invalid-feedback" role="alert">
                                        <input type="file" name="Image" value="Abload File" >
                                    </span>
            @endif
        </div>
    </div>
    </div>

    <div class="form-group container row ">
        <div class="col-sm-6 offset-sm-4">
            <button type="submit" class="btn btn-info">
                {{ __('Add') }}
            </button>
        </div>
    </div>
</form>
</div>
<div class="col-sm-1"></div>
<br><br><br>
</div>
<br><br><br><br><br><br>
@stop