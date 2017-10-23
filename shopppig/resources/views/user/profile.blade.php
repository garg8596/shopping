@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-4">
	<h1>User profile</h1>
	<hr/>
	<strong>My Orders</strong>
	@foreach($orders as $order)
	<div class="panel panel-default">
            <div class="panel-body">
            <ul class="list-group">
                @foreach($order->cart->items as $item)
                 <li class="list-group-item">
                 <span class="badge">${{$item['price']}}</span>
                 {{$item['item']['title']}} | {{$item['qty']}} units


                 </li>
                 @endforeach
  
            </ul>

    
            </div>
    <div class="panel-footer"><strong>Total Price: {{$order->cart->totalPrice}}</strong></div>
    
    @endforeach
 	</div>
</div>
@endsection()