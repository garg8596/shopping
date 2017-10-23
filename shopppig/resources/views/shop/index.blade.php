@extends('layouts.master')

@section('content')
@if(Session::has('success'))
<div class="row">
  <div class="col-md 4 col-xs-6 col-md-offset-4 col-xs-offset-3">
    <div class="alert alert-success" id="charge-message">
      {{Session::get('success')}}
    </div>
  </div>
</div>
@endif
@foreach($products->chunk(3) as $productsChunk)
<div class="row">
@foreach($productsChunk as $product)
<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
      <img src="{{$product->imagePath}} "alt="...">
      <div class="caption">
        <h3>{{$product->title}}</h3>
        <p class="description">{{$product->description}} </p>
        <div class="clearfix">
        <div class="price pull-left">${{$product->price}}</div>
        <a href="{{route('product.addtocart',['id'=>$product->id])}}" class="btn btn-success pull-right" role="button" >Add to Cart</a>
        </div> 
      </div>
    </div>
  </div>
</div>
@endforeach
  
@endforeach
echo "hello";


@endsection
@section('title')
we are back and
@endsection
