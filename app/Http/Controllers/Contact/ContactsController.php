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

    public function create(){
        return view('contacts.create');
    }

    public function store(Request $request){
        $contact = new Contact($request->get('contact'));
        $contact->save();
        if(count($request->get('emails')) > 0){
            $contact->attachEmails($request->get('emails'));
        }
        if(count($request->get('phones')) > 0){
            $contact->attachPhones($request->get('phones'));
        }
    }

    public function update(Request $request, Contact $contact){
        $contact->update($request->get('contact'));
        $contact->phonesupdate($request->get('contact'));
        return $contact;
    }

    public function edit(Contact $contact){

        \JavaScript::put([
            'contact' => $contact,
        ]);
    	return view('contacts.edit', compact('contact'));
    }
}
