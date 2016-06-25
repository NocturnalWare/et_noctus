<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Authentication routes...
Route::get('login', array('as' => 'getLoginPage', 'uses' => 'Auth\AuthController@getLogin'));
Route::post('login', array('as' => 'login', 'uses' => 'Auth\AuthController@postLogin'));
Route::get('logout', array('as' => 'logout', 'uses' => function(){
	Auth::logout();
	return redirect()->route('welcome');
}));

Route::group(['middleware' => 'cart'], function () {

	Route::get('/', ['as' => 'welcome', 'uses' => function () {
	    return view('welcome');
	}]);

	//PRODUCT ROUTES
	Route::get('products', ['as' => 'products.index', 'uses' => 'Product\ProductController@index']);
	Route::get('products/sort/{category}', ['as' => 'products.sort', 'uses' => 'Product\ProductController@sortindex']);
	Route::get('products/{product}', ['as' => 'products.show', 'uses' => 'Product\ProductController@show']);
	
	//CART ROUTES
	Route::get('cart', ['as' => 'cart.index', 'uses' => 'Carts\CartsController@index']);
	Route::post('cart', ['as' => 'cart.store', 'uses' => 'Carts\CartsController@store']);
	Route::delete('cart/{cart}/destroy', ['as' => 'cart.destroy', 'uses' => 'Carts\CartsController@destroy']);
	Route::get('cart/check', ['as' => 'cart.check', 'uses' => 'Product\ProductController@show']);

	//SHIPPING ROUTES
	Route::post('shipping/rates/check', ['as' => 'shipping.rates.check', 'uses' => 'Shipping\ShippingController@checkRate']);
});


Route::group(['prefix' => 'control', 'middleware' => 'auth'], function(){
	Route::get('ok', ['uses' => 'Order\OrdersController@index']);
});