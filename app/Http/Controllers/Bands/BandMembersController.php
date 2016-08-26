<?php

namespace App\Http\Controllers\Bands;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Bands\BandMember;

class BandMembersController extends Controller
{
    public function edit(BandMember $bandmember){
    	\JavaScript::put([
    		'contacts' => $bandmember->contact,
		]);
    	return view('bands.members.edit', compact('bandmember'));
    }
}
