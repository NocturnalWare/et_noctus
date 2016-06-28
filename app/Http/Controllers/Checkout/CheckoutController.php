<?php

namespace App\Http\Controllers\Checkout;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shipping\Shipping;
use App\Utilities\StripeHandler;

class CheckoutController extends Controller
{
    public function index(){
    	$customer = Shipping::where('cart_id', \Session::get('cart_id'))->first();
    	return view('checkout.index', compact('customer'));
    }

    public function charge(Request $request, StripeHandler $stripe){
    	$token = $request->input('stripeToken');

		if(!\Session::get('cart_id')){
			return redirect()->route('products.index');
		}

		if(Shipping::where('cart_id', \Session::get('cart_id'))->pluck('payment_status') == 'Paid'){
			return redirect()->route('checkout.paid`');
		}

		$charge = $stripe->chargeCard($request);

		if($charge == true){
			return $this->completeCheckout();
		}else{
			return redirect()->route('checkout.index')->withErrors(['There was a problem, please try again.', 'If the problem continues, please use the contact form']);
		}
    }

    public function complete(){
    	return view('checkout.complete');
    }

    private function completeCheckout(){
    	\Session::forget('cart_id');
    	\Session::forget('cart_amt');
    	return redirect()->route('checkout.complete');
    }
}
