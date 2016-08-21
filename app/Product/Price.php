<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

	protected $fillable = [
		'onesize',
    	'xsmall',
    	'small',
    	'medium',
    	'large',
    	'xlarge',
    	'xxlarge',
    	'xxxlarge',
	];    
}
