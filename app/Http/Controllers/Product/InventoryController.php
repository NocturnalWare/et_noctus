<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product\Product;

class InventoryController extends Controller
{
    public function index(){
    	$products = Product::all();
    	\Javascript::put([
    		'names' => $products->pluck('name'),
    		'products' => $products
    	]);
    	return view('products.inventory.index', compact('products'));
    }

    public function update(Request $request){
    	$data = $request->get('product');
    	$product = Product::find($data['id']);
    	$product->inventories()->update($data['inventories']);
    	return $product;
    }
}
