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
    	'shows',
    ];

    public function members(){
    	return $this->hasMany(BandMember::class, 'band_id', 'id');
    }

    public function shows(){
    	return $this->hasMany(\App\Shows\ShowBand::class, 'band_id', 'id');
    }
}
