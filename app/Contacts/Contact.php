<?php

namespace App\Contacts;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	protected $rules = [];
	protected $fillable = [];
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

    public function getFullNameAttribute(){
    	return $this->f_name.' '.$this->l_name;
    }
}
