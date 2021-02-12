@extends('backend.layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Ecommerce</h1>
          <p>Basic bootstrap tables</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Category</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Add Category</h3>
             <form method="post" enctype="multipart/form-data" action="{{ route('category.store') }}">
             @csrf
             <div class="form-group">
                 <label for="nameInput">Name:</label>
                 <input type="text" name="name" class="form-control" id="fileInput" class="@error('name') is-invalid @enderror" value="{{old('name')}}">
                 @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
             </div>
            
             <div class="form-group">
                 <label for="nameInput">Photo:</label>
                 <input type="file" name="photo" class="@error('photo') is-invalid @enderror" >
                 @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
             </div>
             <input type="submit" name="save" value="Save" class="btn btn-sm btn-primary">

            </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
 