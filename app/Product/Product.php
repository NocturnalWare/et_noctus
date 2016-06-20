<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $rules = [];
    protected $fillable = [];
    protected $table = 'products';
    protected $with = ['variants', 'inventories', 'prices'];

    public function variants(){
    	return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

	public function inventories()
	{
		return $this->hasOne(Inventory::class, 'product_id', 'id');
	}

	public function prices(){
		return $this->hasOne(Price::class, 'product_id', 'id');
	}

	public function getMainImage(){
		return 'https://s3-us-west-2.amazonaws.com/etnoc/images/products/'.$this->main_image;
	}
}
