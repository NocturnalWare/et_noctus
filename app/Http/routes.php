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

	Route::get('/privacy', ['as' => 'privacy', 'uses' => function () {
	    return view('privacy');
	}]);

	//INSTAGRAM FEED
	Route::get('ig/feed', ['as' => 'ig.feed', 'uses' => 'Auth\IGController@feed']);


	//CONTACT ROUTES
	Route::get('/contact', ['as' => 'contact.index', 'uses' => 'Utilities\ContactController@index']);
	Route::post('/contact', ['as' => 'contact.store', 'uses' => 'Utilities\ContactController@store']);

	//PRODUCT ROUTES
	Route::get('products', ['as' => 'products.index', 'uses' => 'Product\ProductController@index']);
	Route::get('products/sort/{category}', ['as' => 'products.sort', 'uses' => 'Product\ProductController@sortindex']);
	Route::get('products/{product}', ['as' => 'products.show', 'uses' => 'Product\ProductController@show']);
	
	//CART ROUTES
	Route::get('cart', ['as' => 'cart.index', 'uses' => 'Carts\CartsController@index']);
	Route::post('cart', ['as' => 'cart.store', 'uses' => 'Carts\CartsController@store']);
	Route::post('cart/empty', ['as' => 'cart.empty', 'uses' => 'Carts\CartsController@emptyCart']);
	Route::delete('cart/{cart}/destroy', ['as' => 'cart.destroy', 'uses' => 'Carts\CartsController@destroy']);
	Route::get('cart/check', ['as' => 'cart.check', 'uses' => 'Product\ProductController@show']);
	Route::post('cart/promocode', ['as' => 'cart.promocode', 'uses' => 'Carts\CartsController@usePromotionCode']);

	//SHIPPING ROUTES
	Route::post('shipping/rates/check', ['as' => 'shipping.rates.check', 'uses' => 'Shipping\ShippingController@checkRate']);
	Route::get('shipping/create', ['as' => 'shipping.create', 'uses' => 'Shipping\ShippingController@create']);
	Route::post('shipping', ['as' => 'shipping.store', 'uses' => 'Shipping\ShippingController@store']);

	//CHECKOUT ROUTES
	Route::get('checkout', ['as' => 'checkout.index', 'uses' => 'Checkout\CheckoutController@index']);
	Route::get('checkout/complete', ['as' => 'checkout.complete', 'uses' => 'Checkout\CheckoutController@complete']);
	Route::post('checkout/charge', ['as' => 'checkout.charge', 'uses' => 'Checkout\CheckoutController@charge']);

	//BAND ROUTES
	Route::get('band/{band}', ['as' => 'bands.show', 'uses' => 'Sponsorship\BandsController@show']);
});


Route::group(['prefix' => 'control', 'middleware' => 'auth'], function(){
	Route::get('ok', ['uses' => 'Order\OrdersController@index']);
	Route::get('promotion', ['as' => 'promotion.index', 'uses' => 'Promotion\PromotionController@index']);
	Route::get('promotion/edit/{promotion}', ['as' => 'promotion.edit', 'uses' => 'Promotion\PromotionController@edit']);
	Route::put('promotion/update/{promotion}', ['as' => 'promotion.update', 'uses' => 'Promotion\PromotionController@update']);
	Route::get('promotion/create', ['as' => 'promotion.create', 'uses' => 'Promotion\PromotionController@create']);
	Route::get('ig/auth', ['as' => 'ig.auth', 'uses' => 'Auth\IGController@authenticate']);
});