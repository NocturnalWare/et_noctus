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
}
