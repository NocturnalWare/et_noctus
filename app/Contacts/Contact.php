<?php

namespace App\Contacts;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $rules = [];
	protected $fillable = [
        'f_name',
        'l_name',
        'city',
        'state',
        'zip',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'snapchat',
        'website',
        'notes',
    ];
    protected $table = 'contacts';

    protected $with = [
    	'phones',
    	'emails'
    ];

    public function phones(){
    	return $this->hasMany(\App\Contacts\Phone::class, 'contact_id', 'id');
    }

    public function emails(){
    	return $this->hasMany(\App\Contacts\Email::class, 'contact_id', 'id');
    }

    public function bandMember(){
        return $this->belongsTo(\App\Bands\BandMember::class, 'contact_id', 'id');
    }

    public function getFullNameAttribute(){
    	return $this->f_name.' '.$this->l_name;
    }

    public function attachPhones($phones){
        foreach($phones as $phone){
            $this->phones()->save(new \App\Contacts\Phone($phone));
        }
    }

    public function attachEmails($emails){
        foreach($emails as $email){
            $this->emails()->save(new \App\Contacts\Email($email));
        }
    }
}
