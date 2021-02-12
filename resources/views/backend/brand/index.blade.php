@extends('backend.layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Ecommerce</h1>
         </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Brand</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Brand List</h3> 
            <a href="{{ route('brand.create') }}" class="btn btn-sm btn-primary pull-right">Add New</a>
            <div class="table-responsive">
            @if($brands->isEmpty())
                <div class="well text-center">No Record Found!</div>
            @else
              <table class="table" id="Datatable">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Photo</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php  $i = 1; ?>
                  @foreach($brands as $brand)
                  <tr>
                      <td>{{ $i++ }} </td>
                    <td>{{ $brand->name}}</td>
                    <td><img src="{{ asset($brand->photo) }}" width="70px" height="80px"></td>
                    <td>
                      <a href="{{ route('brand.edit' , $brand->id )}}" class='btn btn-sm btn-warning'>Edit</a>
                      <form method="post" action="{{ route('brand.destroy' , $brand->id )}} " onsubmit="return confirm('Are you sure want to delete?')">
                          @csrf
                          @method('DELETE')
                        <input type="submit" name="btnsubmit" value="Delete" class="btn btn-sm btn-danger">
                      </form>
                     </td>
                  </tr>
                  @endforeach
                   
                </table>
                
              @endif
            </div>
          </div>
        </div>
      </div>
    </main>

@section('script')
<script type="text/javascript" src="{{ asset('Backend/js/plugins/jquery.dataTables.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('Backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
<script type="text/javascript" > 
$('#Datatable').DataTable();

</script>
@endsection 