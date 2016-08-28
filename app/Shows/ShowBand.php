<?php

namespace App\Shows;

use Illuminate\Database\Eloquent\Model;

class ShowBand extends Model
{
	protected $with = [
		'band',
	];

    public function show(){
    	return \App\Shows\Show::where('id', $this->show_id)->first();
    }

    public function band(){
    	return $this->hasOne(\App\Bands\Band::class, 'id', 'band_id');
    	// return \App\Bands\Band::where('id', $this->band_id)->first();
    }
}
