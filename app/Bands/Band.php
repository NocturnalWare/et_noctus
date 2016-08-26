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
    	return $this->hasMany(\App\Bands\BandMember::class, 'band_id', 'id');
    }
}
