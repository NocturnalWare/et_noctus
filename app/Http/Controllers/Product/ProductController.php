<?php

namespace App\Http\Controllers\Product;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product\Product;
use App\Product\Price;
use App\Product\Inventory;

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

    public function adminIndex(){
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.admin-index', compact('products'));
    }

    public function edit(Product $product){

        \JavaScript::put([
            'product' => $product,
        ]);
        return view('products.edit', compact('product'));
    }

    public function store(Request $request){
        $data = $request->except('_method', '_token');
        //make a new product object
        $product = Product::create($data['product']);
        $product->inventories()->save(new Inventory($data['inventory']));
        $product->prices()->save(new Price($data['prices']));
        return $product;
        return route('products.show', $product->id);
    }

    public function show(Product $product){

    	\JavaScript::put([
    		'products' => $product,
    	]);
    	
    	return view('products.show', compact('product'));
    }

    public function update(Request $request, Product $product){
        $product->update($request->get('product'));
        $product->inventories->update($request->get('inventory'));
        $product->prices->update($request->get('prices'));
    }
}
