<?php

namespace App\Shows;

use Illuminate\Database\Eloquent\Model;

class ShowBand extends Model
{
    public function show(){
    	return $this->hasOne(Show::class, 'id', 'show_id');
    }
}
