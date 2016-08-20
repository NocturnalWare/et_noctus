<?php

namespace App\Http\Controllers\Promotion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promotions\Promotion;
use App\Promotions\PromotionCode;

class PromotionCodeController extends Controller
{
    public function store(Request $request, Promotion $promotion){
    	$data = $request->except('_token');

    	if($request->get('generic') == true){
    		$data['code'] = $this->generateCode();
    	}

    	return $promotion->codes()->save(new PromotionCode($data));
    }

    private function generateCode(){
    	return strtoupper(str_random(10));
    }
}
