<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

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

        view()->share('cart_quantity', \App\Carts\Cart::where('cart_id', \Session::get('cart_id'))->sum('quantity'));
        
        \JavaScript::put([
            'cart_quantity' => \App\Carts\Cart::where('cart_id', \Session::get('cart_id'))->sum('quantity'),
        ]);

        return $next($request);
    }
}
