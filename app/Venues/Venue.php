<?php

namespace App\Venues;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
	protected $with = [
		'mainContact',
	];

    public function shows(){
    	return $this->belongsToMany(\App\Shows\Show::class, 'venue_id', 'venue');
    }

    public function mainContact(){
    	return $this->hasOne(\App\Contacts\Contact::class, 'id', 'main_contact_id');
    }
}
