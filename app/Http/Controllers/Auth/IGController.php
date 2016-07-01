<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IGController extends Controller
{
    public function authenticate(Request $request){
    	dd($request->get('code'));
    }
}
