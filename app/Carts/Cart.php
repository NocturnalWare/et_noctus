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

    public function addNew($data){
    	return $this->create($data);
    }

    public function checkCart(){
    	return $this->where('cart_id', \Session::get('cart_id'))->get();
    }
}
