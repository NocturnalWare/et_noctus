<?php

namespace App\Bands;

use Illuminate\Database\Eloquent\Model;

class BandMemberPrevious extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'band_member_previous';

    public function member(){
    	return $this->belongsTo(BandMember::class, 'contect_id', 'contact_id');
    }

    public function oldBand(){
    	return Band::find($this->band_id);
    }
}
