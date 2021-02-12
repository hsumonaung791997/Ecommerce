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
          <li class="breadcrumb-item active"><a href="#">Item</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Edit Item</h3>
             <form method="post" enctype="multipart/form-data" action="{{ route('item.update', $item->id) }}">
             @csrf
             @method('PUT')
             <div class="form-group">
                 <label for="nameInput">Name:</label>
                 <input type="text" name="name" class="form-control" id="fileInput" class="@error('name') is-invalid @enderror" value="{{ $item->name}}">
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
                    <img src="{{ asset($item->photo )}} " width="100px" height="100px" class="pt-3">
                    <input type="hidden" name="old_image" value="{{ $item->photo }} ">
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <input type="file" name="photo" class="@error('photo') is-invalid @enderror pt-3">
                    @error('photo')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                 </div>
                 <div class="form-group">
                 <label for="nameInput">Code No:</label>
                 <input type="text" name="codeno" class="form-control" id="fileInput" class="@error('codeno') is-invalid @enderror" value="{{ $item->codeno}}">
                 @error('codeno')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>

             <div class="form-group">
                 <label for="nameInput">Price:</label>
                 <input type="number" name="price" class="form-control" id="fileInput" class="@error('price') is-invalid @enderror" value="{{ $item->price}}">
                 @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>

             <div class="form-group">
                 <label for="nameInput">Discount:</label>
                 <input type="number" name="discount" class="form-control" id="fileInput" class="@error('discount') is-invalid @enderror" value="{{ $item->discount}}">
                 @error('discount')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>

             <div class="form-group">
                 <label for="nameInput">Description:</label>
                 <textarea name="description" class="form-control" id="fileInput" class="@error('description') is-invalid @enderror" >{{ $item->description}}</textarea>
                 @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
             </div>

             <div class="form-group">
                 <label for="nameInput">Brand:</label>
                 <select class="js-example-basic-single form-control" name="brand" id="brand">
                   @foreach($brands as $value)
                     <option value="{{$value->id}}"  @if( $value->id == $item->brand->id ) selected @endif>{{ $value->name }}</option>
                     @endforeach
                 </select>
                  @error('brand')
                <div class="alert alert-danger">{{ $message }}</div>
              ` @enderror
             </div>

             <div class="form-group">
                 <label for="nameInput">Sub Category:</label>
                 <select class="js-example-basic-single form-control" name="subcategory" id="brand">
                   @foreach($subcategories as $subcategory)
                     <option value="{{$subcategory->id}}"  @if( $subcategory->id == $item->subcategory->id ) selected @endif>{{ $subcategory->name }}</option>
                     @endforeach
                 </select>
                  @error('subcategory')
                <div class="alert alert-danger">{{ $message }}</div>
              ` @enderror
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
 