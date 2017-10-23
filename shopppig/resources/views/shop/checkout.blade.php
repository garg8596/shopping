@extends('layouts.master')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
	<h1>Checkout</h1>
	<h3>Total:${{$price}}</h3>
	<div id="charge-error" class="alert alert-danger {{!Session::has('error')?'hidden':''}}">
		{{Session::has('error')}} 
	</div>
	<form action="{{route('checkout')}}" method="post" id="form-check">
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" id="name" class="form-control" name="name" required>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="form-group">
				<label for="address">Address</label>
				<input type="text" id="address" class="form-control" name="address" required>
			</div>
		</div>
		<hr/>
		<div class="col-xs-12">
			<div class="form-group">
				<label for="card-holder-name">Card Holder Name</label>
				<input type="text" id="card-holder-name" class="form-control" required>
			</div>
		</div>
		<div class="col-xs-12">
			<div class="form-group">
				<label for="credit-card-number">Credit Card Number</label>
				<input type="text" id="credit-card-number" class="form-control" required>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="col-xs-6">
		<div class="form-group">
				<label for="card-expiry-month">Card Expiry Month</label>
				<input type="text" id="card-expiry-month" class="form-control" required>
			</div>
			
		</div>
		<div class="col-xs-6">
		<div class="form-group">
				<label for="card-expiry-year">Card Expiry Year</label>
				<input type="text" id="card-expiry-year" class="form-control" required>
			</div>
			
		</div>
	</div>
		<div class="row">
			<div class="col-xs-12">
			<div class="form-group">
				<label for="cvc">CVC</label>
				<input type="text" id="cvc" class="form-control" required>
			</div>
				
			</div>
		</div>
		{{csrf_field()}}
		<button type="submit" class="btn btn-success">Buy Now</button>



	</form>
	</div>
</div>
@endsection()
@section('script')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{URL::to('js/checkout.js')}}"></script>
@endsection()