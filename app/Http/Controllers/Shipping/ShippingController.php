<?php

namespace App\Http\Controllers\Shipping;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyPost\EasyPost;
use App\Shipping\Shipping;
use App\Carts\Cart;
use App\Promotions\Promotion;

class ShippingController extends Controller
{

	public function create(){
		return view('shipping.create');
	}

	public function store(Request $request){
		$cart_id = \Session::get('cart_id');
		
		$this->validate($request, [
	        'email' => 'required|email',
	        'ship_f_name' => 'required',
	        'ship_address1' => 'required',
	        'ship_city' => 'required',
	        'ship_state' => 'required',
	        'ship_zip' => 'required',
	    ]);

		\Session::set('email', $request->get('email'));
	    $shipping = Shipping::where('cart_id', $cart_id)->first();
	    $data = array_merge([
				'cart_id' => \Session::get('cart_id'), 
				'cart_amt' => \Session::get('cart_amt')
			],
				$request->except('_token')
		);

		if(empty($shipping)){
			Shipping::create($data);			
			return redirect()->route('checkout.index');
		}else{
			$shipping->update($data);
			return redirect()->route('checkout.index');
		}
	}

    public function checkRate(Request $request){
        $cart = new Cart;
        $weight = $cart->getCartWeight();
        $cartprice = $cart->getBaseCartAmount()/100;
        $promo_rate = 0;
        
        $shipment = Shipping::checkRate($request->get('zip'), $weight);
        
        $rate = $shipment->rate + (.25 * $cart->checkCart()->sum('quantity'));

        if(!empty($request->get('code'))){
        	$promo = new Promotion;
        	$promo_rate = $promo->calculateRate($request->get('code'), $cartprice);
        	$cartprice = $promo_rate;
        	$promo_rate = $cart->getBaseCartAmount()/100 - $promo_rate;
        }

        $total = $rate + $cartprice;

        \Session::set('cart_amt', $total);

    	return ['rate' => number_format($rate, 2), 'promo_rate' => number_format($promo_rate, 2), 'total' => number_format($total, 2)];
    }


}
