<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contacts\Contact;

class ContactsController extends Controller
{
    public function index(){
    	$contacts = Contact::all();
    	$names = [];
    	foreach($contacts as $contact){
    		$names[] = $contact->f_name.' '.$contact->l_name;
    	}
    	\JavaScript::put([
    		'contacts' => $contacts,
    		'names' => $names,
    	]);

    	return view('contacts.index', compact('contacts'));
    }

    public function edit(Contact $contact){
    	return view('contacts.edit', compact('contact'));
    }
}
