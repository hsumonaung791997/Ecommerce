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
            <h3 class="tile-title">Order List</h3> 
            <!-- <a href="{{ route('category.create') }}" class="btn btn-sm btn-primary pull-right">Add New</a> -->
            <div class="table-responsive">
            @if($orders->isEmpty())
                <div class="well text-center">No Record Found!</div>
            @else
              <table class="table" id="Datatable">
                <thead class="bg-dark text-white">
                  <tr>
                    <th>NO</th>
                    <th>Order No</th>
                    <th>Total</th>
                    <th>Order Date</th>
                     <th>Customer Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php  $i = 1; ?>
                  @foreach($orders as $order)
                  <tr>
                      <td>{{ $i++ }} </td>
                      <td>{{ $order->orderno}}</td>
                      <td>{{ $order->total}}</td>
                      <td>{{ $order->orderdate}}</td>
                      <td>{{ $order->user->name}}</td>
                      <td>
                        <a href="{{ route('order.edit' , $order->id )}}" class='btn btn-sm btn-warning'>Detail</a>
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