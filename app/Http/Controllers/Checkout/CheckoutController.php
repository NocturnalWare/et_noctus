<?php

namespace App\Http\Controllers\Checkout;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shipping\Shipping;

class CheckoutController extends Controller
{
    public function index(){
    	$customer = Shipping::where('cart_id', \Session::get('cart_id'))->first();
    	return view('checkout.index', compact('customer'));
    }

    public function checkout(Request $request){
    	$token = $request->input('stripeToken');

		if(!\Session::get('cart_id')){
			return redirect()->route('products.index');
		}

		if(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('payment_status') == 'Paid'){
			return redirect()->route('checkout.paid`');
		}
    }
}
