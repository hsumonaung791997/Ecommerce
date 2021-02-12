
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
                <h3 class="tile-title">Detail Order</h3>
                <form method="post" enctype="multipart/form-data" action="{{ route('order.update', $order->id) }}">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                        <table class="table tabel-border">
                            <thead>
                                <th>Qty</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Subtotal</th>

                            </thead>
                            <tbody>
                                @php 
                                $total = 0;
                                @endphp
                                @foreach($order->items as $item)
                                @php
                                $qty = $item->pivot->qty;
                                $subtotal = $item->price * $qty;
                                $total +=$subtotal;
                                @endphp
                                <tr>
                                    <td>{{$qty}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->price}}</td>
                                    <td>{{$subtotal}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td>{{$total}}</td>
                                </tr>
                            </tbody>
                        </table>
                        <input type="submit" name="save" value="Confirm" class="btn btn-sm btn-success mt-3 pull-right">
                    </div>
                </div>
             </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection