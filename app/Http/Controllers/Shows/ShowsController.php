<?php

namespace App\Http\Controllers\Shows;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shows\Show;

class ShowsController extends Controller
{
	public function adminIndex(){
		$shows = Show::all();
		\JavaScript::put([
			'shows' => $shows,
		]);
		return view('shows.admin.index', compact('shows'));
	}

	public function adminEdit(Show $show){
		return view('shows.admin.edit', compact('show'));
	}
}
