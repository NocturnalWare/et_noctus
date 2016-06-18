<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'products';
    protected $with = ['variants'];

    public function variants(){
    	return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }
}
