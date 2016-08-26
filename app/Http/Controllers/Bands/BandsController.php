<?php

namespace App\Http\Controllers\Bands;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bands\Band;

class BandsController extends Controller
{
	public function index(){
		$bands = Band::all();
		return view('bands.index', compact('bands'));
	}

	public function edit(Band $band){
		return view('bands.edit', compact('band'));
	}
}
