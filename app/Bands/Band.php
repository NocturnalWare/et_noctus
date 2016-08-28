<?php

namespace App\Bands;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'bands';
    protected $with = [
    	'members',
    ];

    public function members(){
    	return $this->hasMany(BandMember::class, 'band_id', 'id');
    }

    public function shows(){
    	return $this->hasManyThrough(\App\Shows\Show::class, \App\Shows\ShowBand::class, 'show_id', 'id', 'show_id');
    }
}
