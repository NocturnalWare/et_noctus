<?php

namespace App\Http\Controllers\Carts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Carts\Cart;

class CartsController extends Controller
{
    public function store(Request $request){
    	$cart = Cart::where('product_id', $request->get('product_id'))->where('cart_id', \Session::get('cart_id'))->where('size', $request->get('size'))->first();
    	$data = $request->except('_token');

    	if(empty($cart)){
    		$cart = Cart::create($data);
    	}else{
    		$data['quantity'] = $cart->quantity+1;
    		$cart->update($data);
    		$cart->save();
    	}

    	return ['cart' => $cart->checkCart(), 'cart_quantity' => $cart->checkCart()->sum('quantity')];
    }

    public function destroy($product_id){
    	Cart::where('cart_id', \Session::get('cart_id'))->where('product_id', $product_id)->delete();
    	return;
    }
}
