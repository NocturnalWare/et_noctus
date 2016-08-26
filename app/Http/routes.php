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

	Route::get('/', ['as' => 'welcome', 'uses' => 'Landing\LandingController@index']);

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


Route::group(['prefix' => 'control', 'middleware' => ['auth', 'cart']], function(){
	Route::get('ok', ['uses' => 'Order\OrdersController@index']);

	//GENERAL ADMIN ROUTES
	Route::get('manage', ['as' => 'admin.index', 'uses' => 'Admin\AdminController@index']);

	//CONTACT ROUTES
	Route::get('contacts', ['as' => 'contacts.index', 'uses' => 'Contact\ContactsController@index']);
	Route::post('contacts', ['as' => 'contacts.store', 'uses' => 'Contact\ContactsController@store']);
	Route::get('contacts/create', ['as' => 'contacts.create', 'uses' => 'Contact\ContactsController@create']);
	Route::get('contacts/edit/{contact}', ['as' => 'contacts.edit', 'uses' => 'Contact\ContactsController@edit']);
	Route::put('contacts/update/{contact}', ['as' => 'contacts.update', 'uses' => 'Contact\ContactsController@update']);

	//SHOW ROUTES
	Route::get('shows', ['as' => 'control.shows.index', 'uses' => 'Shows\ShowsController@adminIndex']);
	
	//VENUE ROUTES
	Route::get('venues', ['as' => 'venues.index', 'uses' => 'Shows\VenuesController@index']);

	//BAND ROUTES
	Route::get('bands', ['as' => 'bands.index', 'uses' => 'Bands\BandsController@index']);
	Route::get('bands/{band}/edit', ['as' => 'bands.edit', 'uses' => 'Bands\BandsController@edit']);
	Route::get('bandmembers/{bandmember}/edit', ['as' => 'bandmember.edit', 'uses' => 'Bands\BandMembersController@edit']);

	//PRODUCT ADMIN ROUTES
	Route::get('products/create', ['as' => 'products.create', 'uses' => 'Product\ProductController@create']);
	Route::get('products/edit/{product}', ['as' => 'products.edit', 'uses' => 'Product\ProductController@edit']);
	Route::post('products', ['as' => 'products.store', 'uses' => 'Product\ProductController@store']);
	Route::put('products/update/{product}', ['as' => 'products.update', 'uses' => 'Product\ProductController@update']);
	Route::get('products', ['as' => 'control.products.index', 'uses' => 'Product\ProductController@adminIndex']);
	
	//INVENTORY ROUTES
	Route::get('inventory', ['as' => 'inventory.index', 'uses' => 'Product\InventoryController@index']);
	Route::post('inventory/update', ['as' => 'inventory.update', 'uses' => 'Product\InventoryController@update']);

	//PROMO ROUTES
	Route::get('promotion', ['as' => 'promotion.index', 'uses' => 'Promotion\PromotionController@index']);
	Route::get('promotion/show/{promotion}', ['as' => 'promotion.show', 'uses' => 'Promotion\PromotionController@show']);
	Route::post('promotion', ['as' => 'promotion.store', 'uses' => 'Promotion\PromotionController@store']);
	Route::get('promotion/create', ['as' => 'promotion.create', 'uses' => 'Promotion\PromotionController@create']);
	Route::get('promotion/edit/{promotion}', ['as' => 'promotion.edit', 'uses' => 'Promotion\PromotionController@edit']);
	Route::post('promotion/update/{promotion}', ['as' => 'promotion.update', 'uses' => 'Promotion\PromotionController@update']);
	Route::get('promotion/create', ['as' => 'promotion.create', 'uses' => 'Promotion\PromotionController@create']);

	//PROMO CODE ROUTES
	Route::get('promotioncode', ['as' => 'promotioncode.index', 'uses' => 'Promotion\PromotionCodeController@index']);
	Route::post('promotioncode/store/{promotion}', ['as' => 'promotioncode.store', 'uses' => 'Promotion\PromotionCodeController@store']);
	Route::post('promotioncode/destroy/{promotioncode}', ['as' => 'promotioncode.destroy', 'uses' => 'Promotion\PromotionCodeController@destroy']);

	//SALE ROUTES
	Route::get('sales', ['as' => 'sales.index', 'uses' => 'Sale\SaleController@index']);
	Route::get('sales/shipped', ['as' => 'sales.shipped', 'uses' => 'Sale\SaleController@shipped']);

	//IG AUTH ROUTE
	Route::get('ig/auth', ['as' => 'ig.auth', 'uses' => 'Auth\IGController@authenticate']);
});