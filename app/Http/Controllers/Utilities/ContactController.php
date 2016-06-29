<?php

namespace App\Http\Controllers\Utilities;

use Illuminate\Http\Request;

use App\Utilities\SlackHandler;
use App\Utilities\ContactMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index(){
    	return view('contact');
    }

    public function store(Request $request){
    	\Session::put('feedbackname', $request->input('name'));
        \Session::put('feedbackemail', $request->input('email'));
        \Session::put('feedbackmessage', $request->input('message'));
        $name = "From: ".$request->input('name')." ".$request->input('email').' | reason - '.$request->get('reason');
        $message = "Msg: ".$request->input('message');
        if($request->input('name') !== 'RonaldKa'){
            SlackHandler::sendMessageToSlack($name);
            sleep(2);
            SlackHandler::sendMessageToSlack($message);
        }else{
            SlackHandler::sendMessageToSlack('RonaldKa got sent to Meatspin.com');
            return view('meatspin');
        }

    	ContactMessage::create($request->except('_token'));

    	return redirect()->route('products.index');
    }
}
