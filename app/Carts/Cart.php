<?php

namespace App\Carts;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

	protected $fillable = [
		'product_id',
		'cart_id',
		'quantity',
		'size',
		'color',
	];

    protected $table = 'carts';

    protected $with = [
        'product',
    ];

    public function addNew($data){
    	return $this->create($data);
    }

    public function checkCart(){
        return $this->where('cart_id', \Session::get('cart_id'))->get();
    }

    public function getPrice(){
        return \App\Product\Price::where('product_id', $this->product_id)->pluck($this->size);
    }

    public function getProduct(){
        return \App\Product\Product::where('id', $this->product_id)->first();
    }

    public function product(){
        return $this->hasOne(\App\Product\Product::class, 'id', 'product_id');
    }

    public function getBaseCartAmount(){
        $price = 0;
        foreach($this->checkCart() as $item){
            $price += $item->getPrice()->first() * $item->quantity;
        }
        return $price;
    }

    public function getCartWeight(){
        $weight = 0;
        
        foreach($this->checkCart() as $item){
            $weight += 6 * $item->quantity;
        }

        return $weight;
    }
}
