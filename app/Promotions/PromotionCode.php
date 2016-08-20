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
        'total',
		'quantity',
		'used',
		'expires',
    ];

    protected $table = 'promotion_codes';

    public function getPromotion(){
    	return \App\Promotions\Promotion::where('id', $this->promotion_id)->first();
    }
}
