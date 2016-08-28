<?php

namespace App\Shows;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{

	protected $with = [
		'bands',
	];

	public function bands(){
		return $this->hasMany(\App\Shows\ShowBand::class, 'show_id', 'id');
	}

	public function venue(){
		return $this->hasOne(\App\Venues\Venue::class, 'id', 'venue_id');
	}
}
