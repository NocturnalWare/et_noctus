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

Route::group(['middleware' => 'cart'], function () {

	Route::get('/', ['as' => 'welcome', 'uses' => function () {
	    return view('welcome');
	}]);

	Route::get('products', ['as' => 'products.index', 'uses' => 'Product\ProductController@index']);
	Route::get('products/sort/{category}', ['as' => 'products.sort', 'uses' => 'Product\ProductController@sortindex']);
	Route::get('products/{product}', ['as' => 'products.show', 'uses' => 'Product\ProductController@show']);
	Route::get('cart', ['as' => 'cart.index', 'uses' => 'Carts\CartsController@index']);
	Route::post('cart', ['as' => 'cart.store', 'uses' => 'Carts\CartsController@store']);
	Route::get('cart/check', ['as' => 'cart.check', 'uses' => 'Product\ProductController@show']);
});
