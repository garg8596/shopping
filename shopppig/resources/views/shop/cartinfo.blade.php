@extends('layouts.master')
@section('content')
@if(Session::has('cart'))
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	<ul class="list-group">
	@foreach($products as $product)
	<li class="list-group-item">
		<span class="badge">{{$product['qty']}}</span>
		<strong>{{$product['item']['title']}}</strong>
		<span class="label label-success">{{$product['price']}}</span>
		<div class="btn-group">
			<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Action
			<span class="caret"></button>
			<ul class="dropdown-menu">
				<li><a href="{{route('product.reduceByOne',['id'=>$product['item']['id']])}}">Reduce by 1</a></li>
				<li><a href="{{route('product.removeAll',['id'=>$product['item']['id']])}}">Remove All</a></li>

			</ul>
		</div>





	</li>
	@endforeach
	</ul>
	</div>
	</div>

	<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	<strong>Total:{{$totalPrice}}</strong>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
	<a href="{{route('checkout')}}"type="button" class="btn btn-success">Checkout</a>
	
	
		
     


	</div>



</div>
@else
<h1>Sorry, No items in the cart</h1>
@endif

@endsection()