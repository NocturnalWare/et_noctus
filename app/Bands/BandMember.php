<?php

namespace App\Bands;

use Illuminate\Database\Eloquent\Model;

class BandMember extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'band_members';
    protected $with = [
    	// 'instruments',
    	'contact',
    	'mainInstrument',
    	// 'previousBands'
    ];

    public function contact(){
    	return $this->hasOne(\App\Contacts\Contact::class, 'id', 'contact_id');
    }

    public function band(){
    	return $this->belongsTo(Band::class, 'id', 'band_id');
    }

    public function currentBand(){
    	return $this->hasOne(Band::class, 'id', 'band_id');
    }
    
    public function mainInstrument(){
    	return $this->hasOne(BandMemberInstrument::class, 'id', 'main_instrument_id');
    }

    public function instruments(){
    	return $this->hasMany(BandMemberInstrument::class, 'contact_id', 'contact_id');
    }
    
    public function previousBands(){
    	return $this->hasMany(BandMemberPrevious::class, 'contact_id', 'contact_id');
    }
}
