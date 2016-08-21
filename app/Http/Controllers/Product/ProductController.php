<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product\Product;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::orderBy('id', 'desc')->get();
    	
    	\JavaScript::put([
    		'products' => $products,
    	]);
    	
    	return view('products.index', compact('products'));
    }

    public function sortindex($category){
        $products = Product::where('category', $category)->orderBy('id', 'desc')->get();
        if($products){
            return view('products.index', compact('products'));
        }

        return redirect()->back();
    }

    public function create(){
        return view('products.create');
    }

    public function show(Product $product){

    	\JavaScript::put([
    		'products' => $product,
    	]);
    	
    	return view('products.show', compact('product'));
    }
}
