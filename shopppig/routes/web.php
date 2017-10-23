<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', [
 'uses'=>'ProductController@getIndex',
 'as'=>'product.index'


	]);
Route::get('/addtocart/{id}', [
 'uses'=>'ProductController@getAddToCart',
 'as'=>'product.addtocart'


	]);

Route::get('/getcart', [
 'uses'=>'ProductController@getCart',
 'as'=>'product.getcart'


	]);
Route::get('/reduceByOne/{id}', [
 'uses'=>'ProductController@reduceByOne',
 'as'=>'product.reduceByOne'


	]);
Route::get('/removeAll/{id}', [
 'uses'=>'ProductController@removeAll',
 'as'=>'product.removeAll'


	]);



Route::group(["prefix"=>'user'],function(){
	Route::group(["middleware"=>'auth'],function(){
		Route::get('/profile', [
 'uses'=>'UserController@getUserProfile',
 'as'=>'user.profile'


	]);
		Route::get('/checkout', [
 'uses'=>'ProductController@getCheckOut',
 'as'=>'checkout'


	]);
Route::post('/checkout', [
 'uses'=>'ProductController@postCheckOut',
 'as'=>'checkout'


	]);
Route::get('/logout',[
	 'uses'=>'UserController@getLogOut',
 'as'=>'user.logout'

]);
});

Route::group(["middleware"=>'guest'],function(){
	Route::get('/signup', [
 'uses'=>'UserController@getSignUp',
 'as'=>'user.signup'


	]);
Route::post('/signup', [
 'uses'=>'UserController@postSignUp',
 'as'=>'user.signup'


	]);
Route::get('/signin', [
 'uses'=>'UserController@getSignIn',
 'as'=>'user.signin'


	]);
Route::post('/signin', [
 'uses'=>'UserController@postSignIn',
 'as'=>'user.signin'


	]);

});





});
