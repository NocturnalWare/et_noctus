<?php

namespace App\Shipping;

use Illuminate\Database\Eloquent\Model;

class ShippingLabel extends Model
{
	protected $rules = [];
	protected $fillable = [
		'cart_id',
		'easypost_id',
		'tracking_code',
		'easypost_tracking',
		'label_url',
		'label_pdf_url',
		'label_epl2_url',
		'label_zpl_url',
		'created',
		'rate',
		'carrier',
		'shipment_id',
		'label_url'
	];
	
	protected $table = 'shipping_labels';

	public function shippingLabel(){
		return $this->belongsTo('\App\Sale', 'cart_id', 'cart_id');
	}
}
