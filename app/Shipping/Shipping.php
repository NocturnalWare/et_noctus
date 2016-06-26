<?php

namespace App\Shipping;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = [
    	'email',
    	'ship_f_name',
    	'ship_l_name',
    	'ship_address1',
    	'ship_address2',
    	'ship_city',
    	'ship_state',
    	'ship_zip',
    	'phone',
    	'cart_amt',
    	'cart_id',
    	'payment_status',
    	'shipped_status',
    	'tracking_number'
    ];
}
