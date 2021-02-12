@extends('frontend.master')

@section('content')

    <!-- Carousel -->
	
    <h1>Shopping Card</h1>

    <div class="container">
        <div class="row">
        @guest
            <button class="btn btn-sm btn-info checkout" >Checkout</button>
        @else
            <button class="btn btn-sm btn-info checkout" >Checkout</button>
         @endguest
        </div>
    </div>

<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Successful model</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
         <a href="{{ route('homepage')}}" class="btn btn-primary">OK</button>
      </div>
    </div>
  </div>
</div> -->
    
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('js/cart.js')}}"></script>
<script type="text/javascript" > 
$(document).ready(function(e){

    
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $(".checkout").click(function(){
        let ls = localStorage.getItem('cart');
        let notes = "this is notes";
        let lsarr = JSON.parse(ls);
        let total = lsarr.reduce((acc,row)=> acc + (row.price*row.qty), 0);
         $.post("{{ route('order.store')}}",{ls:ls,notes:notes,total:total} , function($response){
            // console.log($response);

            localStorage.clear();
            $('#exampleModal').modal('show');

        })
    })
})

</script>

@endsection
