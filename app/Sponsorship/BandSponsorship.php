<?php

namespace App\Sponsorship;

use Illuminate\Database\Eloquent\Model;

class BandSponsorship extends Model
{
    protected $fillable = [
    	'band_name',
    	'url'
    ];

    protected $table = 'band_sponsorships';
}
