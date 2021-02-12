@extends('backend.layouts.master')
@section('content')
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Basic Tables</h1>
          <p>Basic bootstrap tables</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active"><a href="#">Simple Tables</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Sub Category List</h3> 
            <a href="{{ route('subcategory.create') }}" class="btn btn-sm btn-primary pull-right">Add New</a>
            <div class="table-responsive">
            @if($sub_categories->isEmpty())
                <div class="well text-center">No Record Found!</div>
            @else
              <table class="table" id="Datatable">
                <thead class="bg-dark text-white">
                  <tr>
                      <th>No</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php  $i = 1; ?>
                  @foreach($sub_categories as $sub_category)
                  <tr>
                      <td>{{ $i++ }} </td>
                    <td>{{ $sub_category->name}}</td>
                    <td>{{ $sub_category->category->name }}</td>
                    <td>
                      <a href="{{ route('subcategory.edit' , $sub_category->id )}}" class='btn btn-sm btn-warning'>Edit</a>
                      <form method="post" action="{{ route('subcategory.destroy' , $sub_category->id )}} " onsubmit="return confirm('Are you sure want to delete?')">
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