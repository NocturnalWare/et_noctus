<?php

namespace App\Http\Controllers\Shows;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shows\Venue;

class VenuesController extends Controller
{
	public function index(){
		$venues = Venue::all();
		return view('venues.index', compact('venues'));
	}
}
