<?php

namespace App\Http\Controllers\Promotion;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Promotions\Promotion;
use App\Promotions\PromotionCode;

class PromotionController extends Controller
{
	public function index(){
		$promos = Promotion::all();

		\JavaScript::put([
			'promotions' => $promos,
			'todaysDate' => \Carbon::parse('today'),
		]);

		return view('promotions.admin.index', compact('promos'));
	}
	
	public function edit(Promotion $promotion){
		\JavaScript::put([
			'promotion' => $promotion,
		]);
		return view('promotions.admin.edit', compact('promotion'));
	}

	public function update(Request $request, Promotion $promotion){
		$promotion->update($request->except('_token', '_method'));
		return redirect()->route('promotion.index');
	}
}
