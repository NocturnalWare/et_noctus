<?php

namespace App\Http\Controllers\Checkout;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function index(){
    	return view('checkout.index');
    }
}
