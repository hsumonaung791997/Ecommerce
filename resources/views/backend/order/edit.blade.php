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
            <h3 class="tile-title">Edit Category</h3>
             <form method="post" enctype="multipart/form-data" action="{{ route('category.update', $category->id) }}">
             @csrf
             @method('PUT')
             <div class="form-group">
                 <label for="nameInput">Name:</label>
                 <input type="text" name="name" class="form-control" id="fileInput" class="@error('name') is-invalid @enderror" value="{{ $category->name}}">
                 @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>
            
             <div class="form-group">
                 <label for="nameInput">Photo:</label>
                 <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Old</a>
                        <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">New</a>
                     </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <img src="{{ asset($category->photo )}} " width="100px" height="100px" class="pt-3">
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <input type="file" name="photo" class="@error('photo') is-invalid @enderror pt-3">
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                 </div>
                <input type="submit" name="save" value="Update" class="btn btn-sm btn-success mt-3">
             </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </main>
@endsection
 