<?php

namespace App\Http\Controllers\Carts;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Carts\Cart;
use App\Promotions\Promotion;

class CartsController extends Controller
{

    public function index(){
        $carts = Cart::where('cart_id', \Session::get('cart_id'))->get();

        return view('cart.index', compact('carts'));
    }

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

    public function usePromotionCode(Request $request){
        $promo = new Promotion;
        $promo = $promo->checkCode($request->get('code'));

        return $promo;
        return $request->all();        
    }

    public function destroy(Cart $cart){
        $cart->delete();
        return redirect()->back();
    }

    public function emptyCart(Request $request, Cart $cart){
        foreach($cart->checkCart() as $item){
            $item->delete();
        }
        
        return redirect()->route('products.index');
    }
}
