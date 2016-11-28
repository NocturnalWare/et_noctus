<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Carts\Cart;

class SetCart
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(empty(\Session::get('cart_id'))){
            \Session::set('cart_id', str_random(32));
        }

        $cart = Cart::where('cart_id', \Session::get('cart_id'))->get();
        $cart_amount = new Cart;

        view()->share('cart', $cart);
        view()->share('cart_amount', $cart_amount->getBaseCartAmount());
        view()->share('cart_quantity', $cart->sum('quantity'));
        
        \JavaScript::put([
            'bands' => \App\Sponsorship\BandSponsorship::all(),
            'shows' => \App\Shows\Show::all(),
            'cart' => $cart,
            'cart_quantity' => $cart->sum('quantity'),
        ]);

        return $next($request);
    }
}
