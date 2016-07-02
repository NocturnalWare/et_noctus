<?php

namespace App\Http\Controllers\Promotion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promotions\Promotion;

class PromotionController extends Controller
{
	public function index(){
		$promos = Promotion::all();
		
		$test = json_encode($promos);

		\JavaScript::put([
			'promotions' => $promos,
			'todaysDate' => \Carbon::parse('today'),
		]);

		return view('promotions.admin.index', compact('promos', 'test'));
	}
	
	public function pop(){
		return Promotion::all();
	}
}
