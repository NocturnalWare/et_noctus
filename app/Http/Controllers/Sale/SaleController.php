<?php

namespace App\Http\Controllers\Sale;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sale\Sale;
use App\Shipping\Shipping;

class SaleController extends Controller
{
    public function index(){
    	$sales = Shipping::where('shipped_status', 'Not Shipped')->get();
    	return view('sales.index', compact('sales'));
    }

    public function shipped(){
    	$sales = Shipping::where('shipped_status', '!=', 'Not Shipped')->get();
    	return view('sales.index', compact('sales'));
    }
}
