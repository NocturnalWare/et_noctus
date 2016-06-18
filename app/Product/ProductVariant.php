<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'product_product_variants';
    protected $with = ['variant'];

    public function variant(){
    	return $this->hasOne(\App\Product\Variant::class, 'id', 'variant_id');
    }
}
