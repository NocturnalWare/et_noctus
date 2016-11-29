<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * Description
     *
     * @return void
     */
    public function product()
    {
    	return $this->belongsTo(Product::class);
    }
    
}
