<?php

namespace App\Sale;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
    	'customer_id',
    	'cart_id',
    ];

    protected $table = 'sales';

    public function shippingLabel(){
    	return $this->hasOne('\App\ShippingLabel', 'cart_id', 'cart_id');
    }
}
