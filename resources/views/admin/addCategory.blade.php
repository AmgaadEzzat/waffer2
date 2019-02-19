@extends('admin.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background: #17a2b8">{{ __('Add New Category') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/addCategory" >
                            @csrf
                            <div class="form-group row">
                                <label for="catname" class="col-md-4 col-form-label text-md-right">{{ __('Category Name') }}</label>

                                <div class="col-md-6">
                                    <input id="catname" type="text" class="form-control{{ $errors->has('categoryName') ? ' is-invalid' : '' }}" name="categoryName" value="{{ old('categoryName') }}" required autofocus>

                                    @if ($errors->has('categoryName'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('categoryName') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>



                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-info">
                                        {{ __('Add') }}
                                    </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
        <div class="container pt-5">
            <h2>All Categories</h2>
         <table class="table table-bordered w-50 bg-white">
          <thead>

            <th style="color: #ff5370">Category Name </th>
          </thead>
             <tbody>
             @foreach($categories as $category)
              <tr>
                  <td>
                   {{$category->categoryName}}
                  </td>
                  <td><a href="/{{$category->id}}/deleteCategory"><i class="fas fa-trash" style="color: #17a2b8"></i></a></td>
              </tr>
                 @endforeach
             </tbody>
         </table>
        </div>
    </div>
@endsection



