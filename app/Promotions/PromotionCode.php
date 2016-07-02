<?php

namespace App\Promotions;

use Illuminate\Database\Eloquent\Model;

class PromotionCode extends Model
{
    protected $fillable = [
    	'promotion_id',
		'code',
		'email',
		'owner',
		'used',
		'expires',
    ];

    protected $table = 'promotion_codes';
}
