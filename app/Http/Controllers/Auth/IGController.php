<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IGController extends Controller
{
    public function authenticate(Request $request){
    	if(empty(\Session::get('ig_auth'))){
	    	$curl = curl_init(); 
			curl_setopt($curl, CURLOPT_URL, "https://api.instagram.com/oauth/access_token");
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, [
				'client_id' => ENV('INSTAGRAM_ID'),
				'client_secret' => ENV('INSTAGRAM_KEY'),
				'grant_type' => 'authorization_code',
				'redirect_uri' => 'https://staging11.eternallynocturnal.com/ig/auth',
				'code' => $request->get('code'),
			]);

			$response = curl_exec($curl);

			\Session::put('ig_auth', $response->access_token);
    	}

		return redirect()->route('welcome');

		// $curl_setopt("client_id=ENV('INSTAGRAM_KEY')");
	 //    -F 'client_secret=CLIENT_SECRET' \
	 //    -F 'grant_type=authorization_code' \
	 //    -F 'redirect_uri=AUTHORIZATION_REDIRECT_URI' \
	 //    -F 'code=CODE' \
  //   	dd($request->get('code'));
    }
}
