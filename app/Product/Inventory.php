<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

	public function inventories(){
    	return $this->belongsTo(Product::class, 'id', 'product_id');
    }

    public function checkStock(){
    	return $this->xsmall + $this->small + $this->medium + $this->large + $this->xlarge + $this->xxlarge + $this->xxxlarge + $this->onesize;
    }
}
