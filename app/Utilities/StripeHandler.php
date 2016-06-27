<?php

	namespace App\Utilities;
	
	use \Stripe\Stripe;
	use \Stripe\Charge;
	use \Stripe\Error;

	class StripeHandler{

		private $stripe;

		public function __construct(){
	        Stripe::setApiKey(env('STRIPE_SK'));
		}

		public function completePayment(Request $request, SlackHandler $slacker)
	    {

	     // Set your secret key: remember to change this to your live secret key in production
	     // See your keys here https://dashboard.stripe.com/account/apikeys

	         // Get the credit card details submitted by the form
	         $token = $request->input('stripeToken');
	         // dd(\Session::get('cart_id'));
	         if(!\Session::get('cart_id')){
	          return redirect()->route('alreadyPaid');
	         }

	         if(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('payment_status') == 'Paid'){
	          return redirect()->route('alreadyPaid');
	         }

	         // $charge = 0;

	         // $cart->checkoutPrice()
	         // Create the charge on Stripe's servers - this will charge the user's card
	         try{
	            $charge = Charge::create(array(
	               "amount" => round($this->getCheckoutPrice()), // amount in cents, again
	               "currency" => "usd",
	               "source" => $token,
	               "description" => \Session::get('cart_id'))
	            );
	        }catch(\Stripe\Error\Card $e) {
	              // The card has been declined
	            }
	            $cart_id = \Session::get('cart_id');
	            $markPaid = \App\Shipping::where('cart_id', \Session::get('cart_id'))->first();
	            $markPaid->payment_status = 'Paid';
	            $markPaid->shipped_status = 'Not Shipped';
	            $markPaid->save();
	            
	            $slacker->sendSaleMessage();

	            \App\Sale::create(array('customer_id' => $markPaid->email, 'cart_id' => \Session::get('cart_id')));

	            $purge = [];
	            
	            foreach(\App\Cart::where('customer_id', $cart_id)->get() as $purgeCarts)
	            {    
	                $purge[] = $purgeCarts;
	                $inventory = \App\Inventory::where('product_id', $purgeCarts->product_id)->pluck($purgeCarts->size);
	                $newsize = $inventory - $purgeCarts->quantity;
	                \DB::table('inventories')->where('product_id', $purgeCarts->product_id)->update(array($purgeCarts->size => $newsize));
	            }

	            if(env('APP_ENV') == 'local'){
	                \Mail::send('emails.productshipped', array('cart' => \App\Cart::where('customer_id', $cart_id)->get(), 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
	                    $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
	                });   
	            }else{   
	                \Mail::send('emails.productshipped', array('cart' => \App\Cart::where('customer_id', $cart_id)->get(), 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
	                    $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
	                });
	            }






	            \Session::forget('cart_id');
	            \Session::forget('checkoutAmt');


	            return redirect()->route('transSuccess');

	        }
	}