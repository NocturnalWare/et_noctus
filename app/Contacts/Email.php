<?php

namespace App\Contacts;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $rules = [];
	protected $fillable = [
		'label',
		'email'
	];
    protected $table = 'contact_emails';
}
