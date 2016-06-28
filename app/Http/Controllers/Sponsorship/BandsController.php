<?php

namespace App\Http\Controllers\Sponsorship;

use Illuminate\Http\Request;

use App\Sponsorship\BandSponsorship;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class BandsController extends Controller
{
    public function show(BandSponsorship $band){
    	return view('sponsorships.band', compact('band'));
    }
}
