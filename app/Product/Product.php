<?php

namespace App\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	
    protected $rules = [];
    protected $fillable = [
		'name',
		'sort_order',
		'cost',
		'description',
		'category',
		'display_price_min',
		'display_price_max',
		'active',
		'onsale',
		'upcomming',
		'preorder',
		'onesize',
		'xsmall',
		'small',
		'medium',
		'large',
		'xlarge',
		'xxlarge',
		'xxxlarge',
    ];
    protected $table = 'products';
    protected $with = ['inventories', 'prices', 'images'];
    protected $appends = [
    	'show_table',
    	'updated',
    ];

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
	public function getShowTableAttribute(){
		return $this->attributes['show_table'] = false;
	}
	public function getUpdatedAttribute(){
		return $this->attributes['updated'] = false;
	}

	/**
	 * Description
	 *
	 * @return void
	 */
	public function images()
	{
		return $this->hasMany(ProductImage::class);
	}
	
}
