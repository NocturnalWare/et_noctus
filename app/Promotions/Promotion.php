<?php

namespace App\Promotions;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $table = 'promotions';

    protected $fillable = [
    	'promotion_name',
    	'price_percent',
    	'price_flat',
    ];

    protected $with = [
    	'codes',
    ];

    public function codes(){
    	return $this->hasMany(PromotionCode::class, 'promotion_id', 'id')->orderBy('used', 'asc')->orderBy('expires', 'desc');
    }

    public function calculateRate($code, $price){
    	$promo = $this->checkCode($code);
    	
    	if(!empty($promo)){
    		\Session::put('promo_code', $code);
    		$promo = $promo->getPromotion();
    		if($promo->price_percent > 0){
    			return $price - ($price * ($promo->price_percent/100));
    		}
    		
    		return ($price - $promo->price_flat);
    	}

    	return $price;
    }

    public function checkCode($code){
    	return $this->validateCode($code);
    }

    public function validateCode($code){
    	return PromotionCode::where('code', $code)->first();
    }
}
