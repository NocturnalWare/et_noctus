<?php

namespace App\Contacts;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'contact_phone_numbers';
}
