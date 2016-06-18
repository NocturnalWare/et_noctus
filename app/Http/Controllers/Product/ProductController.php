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
    	
    	\JavaScript::put([
    		'products' => $products,
    	]);
    	
    	return view('products.index', compact('products'));
    }

    public function show(Product $product){

    	\JavaScript::put([
    		'products' => $product,
    	]);
    	
    	return view('products.show', compact('product'));
    }
}
