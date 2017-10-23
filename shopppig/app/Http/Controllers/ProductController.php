<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
Use Session;
use App\Cart;
use Stripe\Stripe;
use Stripe\Charge;
use Auth;
use App\Order;

class ProductController extends Controller
{
    public function getIndex(){
    	$products=Product::all();
    	return view('shop.index',['products' => $products]);
    }
    public function getAddToCart(Request $request,$id){
    	$product=Product::find($id);
    	$oldCart=Session::has('cart')?Session::get('cart'):null;
    	$cart=new Cart($oldCart);
    	$cart->add($product,$product->id);
    	$request->session()->put('cart',$cart);
    	
    	return redirect()->route('product.index');

    }
    public function getCart(){
    	if(!Session::has('cart')){
    		return view('shop.cartinfo');
    	}
    	$oldCart=Session::get('cart');
    	$cart=new Cart($oldCart);
    	return view('shop.cartinfo',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);

    }

     public function reduceByOne($id){
        if(!Session::has('cart')){
            return view('shop.cartinfo');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->reduceByOne($id);
         if(count($cart->items)>0){
            Session::put('cart',$cart);

        }
        else{
            Session::forget('cart');
        }
       
        return redirect()->route('product.getcart');
      

    }
     public function removeAll($id){
          if(!Session::has('cart')){
            return view('shop.cartinfo');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        $cart->removeAll($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);

        }
        else{
            Session::forget('cart');
        }
        
        return redirect()->route('product.getcart');

    }
    public function getCheckOut(){
    	if(!Session::has('cart')){
    		return view('shop.cartinfo');
    	}
    	$oldCart=Session::get('cart');
    	$cart=new Cart($oldCart);
    	return view('shop.checkout',['price'=>$cart->totalPrice]);


    }
    public function postCheckOut(Request $request){
        if(!Session::has('cart')){
            return view('shop.cartinfo');
        }
        $oldCart=Session::get('cart');
        $cart=new Cart($oldCart);
        Stripe::setApiKey('sk_test_yRhniWnqyngH6PI00ItDDxXk');

        try{
            $charge=Charge::create(array(
               "amount" => $cart->totalPrice*100,
               "currency" => "usd",
               "source" => $request->input('stripeToken'), // obtained okenwith Stripe.js
               "description" => "A test Charge"
            ));
            $order=new Order();
            $order->name=$request->input('name');
            $order->address=$request->input('address');
            $order->cart=serialize($cart);
            $order->payment_id=$charge->id;
            Auth::user()->orders()->save($order);


        }catch(\Exception $e){
            return redirect()->route('checkout')->with('error',$e->getMessage());

        }
        Session::forget('cart');
         return redirect()->route('product.index')->with('success','You Have made A siccessful Transcation');


    	
    }
}
