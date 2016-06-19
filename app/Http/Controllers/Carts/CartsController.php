<?php

namespace App\Http\Controllers\Carts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Carts\Cart;

class CartsController extends Controller
{
    public function store(Request $request){
    	Cart::create([
    		'product_id' => $request->get('product_id'),
    		'cart_id' => Session::get('cart_id'),
    		'size' => $request->get('size'),
    		'color' => $request->get('color'),
    	]);
    	return;
    }

    public function destroy($product_id){
    	Cart::where('cart_id', \Session::get('cart_id'))->where('product_id', $product_id)->delete();

    	return;
    }
}
