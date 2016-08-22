<?php

namespace App\Contacts;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
	protected $rules = [];
	protected $fillable = [];
    protected $table = 'contact_emails';
}
