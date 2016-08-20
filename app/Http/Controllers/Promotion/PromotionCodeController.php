<?php

namespace App\Http\Controllers\Promotion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promotions\Promotion;
use App\Promotions\PromotionCode;

class PromotionCodeController extends Controller
{
	public function index(){
		return PromotionCode::all();
	}

    public function store(Request $request, Promotion $promotion){
    	$data = $request->except('_token');
    	$data['expires'] = \Carbon::parse($data['expires']);
    	if($request->get('generic') == 'true'){
    		$data['code'] = $this->generateCode();
    	}else{
    		$data['code'] = strtoupper($data['code']);
    	}

    	return $promotion->codes()->save(new PromotionCode($data));
    }

    public function destroy(PromotionCode $promotioncode){
    	$promotioncode->delete();
    	return;
    }

    private function generateCode(){
    	return strtoupper(str_random(10));
    }
}
