<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product\Product;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::all();
    	return view('products.index', compact('products'));
    }
}
