<?php

namespace App\Shows;

use Illuminate\Database\Eloquent\Model;

class ShowBand extends Model
{
	protected $with = [
	];

    public function show(){
    	return \App\Shows\Show::where('id', $this->show_id)->first();
    }

    public function band(){
    	return \App\Bands\Band::where('id', $this->band_id)->first();
    }
}
