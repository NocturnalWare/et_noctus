<?php

namespace App\Carts;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

    public function checkCart(){
    	return $this->where('cart_id', \Session::get('cart_id'))->get();
    }
}
