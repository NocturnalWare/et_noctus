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

    public function product(){
    	return $this->hasOne(\App\Product\Product::class, 'id', 'product_id');
    }
}
