<?php

namespace App\Http\Controllers\Shipping;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyPost\EasyPost;
use App\Shipping\Shipping;
use App\Carts\Cart;

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

	    $shipping = Shipping::where('cart_id', $cart_id)->first();

		if(empty($shipping)){
			return Shipping::create(array_merge([
				'cart_id' => \Session::get('cart_id'), 
				'cart_amt' => \Session::get('cart_amt')
			],
				$request->except('_token'))
			);
		}else{
			$shipping->update($request->except('_token'));
			return redirect()->route('checkout.index');
		}
	}

    public function checkRate(Request $request){
        EasyPost::setApiKey(env('EASYPOST'));

        $shipping = Shipping::find(1);
        $shipment = $this->buildShipment($shipping);
        $cart = new Cart;
        $rate = $shipment->lowest_rate();

        $total = $rate->rate+.5 + $cart->getBaseCartAmount()/100;

        \Session::set('cart_amt', $total);

    	return ['rate' => $rate->rate+.5, 'total' => $total];
    }

    private function buildShipment($shipping){
        $to_address = \EasyPost\Address::create(
            array(
                "name"    => "$shipping->ship_f_name $shipping->ship_l_name",
                "street1" => "$shipping->ship_address1",
                "street2" => "$shipping->ship_address2",
                "city"    => "$shipping->ship_city",
                "state"   => "$shipping->ship_state",
                "zip"     => "$shipping->ship_zip",
            )
        );
        $from_address = \EasyPost\Address::create(
            array(
                "company" => "Eternally Nocturnal",
                "street1" => "31121 Westfield",
                "city"    => "Livonia",
                "state"   => "MI",
                "zip"     => "48150",
                "phone"   => "313-515-5094"
            )
        );
        $parcel = \EasyPost\Parcel::create(
            array(
                "weight" => 16.0
            )
        );
        $shipment = \EasyPost\Shipment::create(
            array(
                "to_address"   => $to_address,
                "from_address" => $from_address,
                "parcel"       => $parcel
            )
        );

        return $shipment;
    }
}
