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

    protected $with = [
    	'codes',
    ];

    public function codes(){
    	return $this->hasMany(PromotionCode::class, 'promotion_id', 'id')->orderBy('used', 'asc')->orderBy('expires', 'desc');
    }
}
