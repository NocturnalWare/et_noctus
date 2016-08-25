<?php

namespace App\Http\Controllers\Shows;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ShowsController extends Controller
{
	public function adminIndex(){
		return view('shows.admin.index');
	}
}
