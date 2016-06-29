<?php

namespace App\Promotions;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
    	'promotion_name',
    	'price_fixed',
    	'price_flat',
    ];
}
