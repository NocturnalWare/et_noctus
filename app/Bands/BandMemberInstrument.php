<?php

namespace App\Bands;

use Illuminate\Database\Eloquent\Model;

class BandMemberInstrument extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'band_member_instruments';

    public function member(){
    	return $this->belongsTo(App\Bands\BandMember::class, 'contact_id', 'contact_id');
    }
}
