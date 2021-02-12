@extends('frontend.master')

@section('content')

    <!-- Carousel -->
	
    <h1>Shopping Card</h1>

    <div class="container">
        <div class="row">
            <table class="table tabel-border">
                <thead>
                    <th>No</th>
                    <th>Date</th>
                    <th>Total Amount</th>

                    <th>Status</th>

                </thead>
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>1</td>
                        <td>{{ $order->orderdate}}</td>
                        <td>{{ $order->total}}</td>
                        <td>{{ $order->status}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       
        </div>
</div>
    
@endsection
