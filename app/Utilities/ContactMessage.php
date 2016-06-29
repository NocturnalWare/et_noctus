<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{

	protected $table = 'contact_messages';
	
    protected $fillable = [
    	'reason',
    	'name',
    	'email',
    	'message',
    ];
}
