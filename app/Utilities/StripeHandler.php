<?php

	namespace App\Utilities;
	
	use App\Shipping\Shipping;
	use App\Order\Sale;
	use App\Carts\Cart;
	use App\Product\Inventory;
	use App\Utilities\SlackHandler;
	
	use \Stripe\Stripe;
	use \Stripe\Charge;
	use \Stripe\Error;

	class StripeHandler{

		private $stripe;
		private $slack;

		public function __construct(SlackHandler $slack){
			$this->slack = $slack;
	        Stripe::setApiKey(env('STRIPE_SK'));
		}

		public function chargeCard($request){
			$payment = $this->completePayment($request->get('stripeToken'));
			
			if($payment == true){
				$this->completeSale();
				$this->purgeInventory();
				// $this->sendEmails();
				$this->slack->sendSaleMessage();
	        	return true;
			}else{
				return false;
			}
		}

		private function completeSale(){
			Sale::create([
				'customer_id' => \Session::get('email'),
				'cart_id' => \Session::get('cart_id')
			]);

	        $shipping = Shipping::where('cart_id', \Session::get('cart_id'))->first();
	        $shipping->payment_status = 'Paid';
            $shipping->shipped_status = 'Not Shipped';
            $shipping->save();
            
            return;
		}
		
		private function purgeInventory(){
			foreach(Cart::where('cart_id', \Session::get('cart_id'))->get() as $cart){
				$inventory = Inventory::where('product_id', $cart->product_id)->first();
				$newsize = $inventory[$cart->size] - $cart->quantity;
				$inventory->update(array($cart->size => $newsize));
			}

			return;
		}

		private function completePayment($token)
	    {

			try{
				$charge = Charge::create(array(
				   "amount" => round(\Session::get('cart_amt') * 100), // amount in cents, again
				   "currency" => "usd",
				   "source" => $token,
				   "description" => \Session::get('cart_id'))
				);
	        }catch(\Stripe\Error\Card $e) {
	        	return redirect()->route('checkout.index')->withErrors(['Card Was Declined. Please try again or use a different card.']);
	        }
	            
	        	return true;
	            // $cart_id = \Session::get('cart_id');
	            // $markPaid = Shipping::where('cart_id', \Session::get('cart_id'))->first();
	            // $markPaid->payment_status = 'Paid';
	            // $markPaid->shipped_status = 'Not Shipped';
	            // $markPaid->save();
	            

	            // $slack->sendSaleMessage();

	            // \App\Sale::create(array('customer_id' => $markPaid->email, 'cart_id' => \Session::get('cart_id')));

	            // $purge = [];
	            
	            // foreach(\App\Cart::where('customer_id', $cart_id)->get() as $purgeCarts)
	            // {    
	            //     $purge[] = $purgeCarts;
	            //     $inventory = \App\Inventory::where('product_id', $purgeCarts->product_id)->pluck($purgeCarts->size);
	            //     $newsize = $inventory - $purgeCarts->quantity;
	            //     \DB::table('inventories')->where('product_id', $purgeCarts->product_id)->update(array($purgeCarts->size => $newsize));
	            // }

	            // if(env('APP_ENV') == 'local'){
	            //     \Mail::send('emails.productshipped', array('cart' => \App\Cart::where('customer_id', $cart_id)->get(), 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
	            //         $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
	            //     });   
	            // }else{   
	            //     \Mail::send('emails.productshipped', array('cart' => \App\Cart::where('customer_id', $cart_id)->get(), 'customer' => \App\Shipping::where('cart_id', $cart_id)->first()), function($message){
	            //         $message->to(\App\Shipping::where('cart_id', \Session::get('cart_id'))->pluck('email'))->subject("Your Eternally Nocturnal Order");
	            //     });
	            // }






	            // \Session::forget('cart_id');
	            // \Session::forget('checkoutAmt');



	        }
	}