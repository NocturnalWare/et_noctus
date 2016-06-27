<?php

namespace App\Shipping;

use Illuminate\Database\Eloquent\Model;
use EasyPost\EasyPost;
use App\Carts\Cart;

class Shipping extends Model
{
    protected $table = 'shippings';

    protected $fillable = [
    	'email',
    	'ship_f_name',
    	'ship_l_name',
    	'ship_address1',
    	'ship_address2',
    	'ship_city',
    	'ship_state',
    	'ship_zip',
    	'phone',
    	'cart_amt',
    	'cart_id',
    	'payment_status',
    	'shipped_status',
    	'tracking_number'
    ];

    public static function checkRate($zip, $weight){
        EasyPost::setApiKey(env('EASYPOST'));

        $to_address = \EasyPost\Address::create(
            array(
                "zip"     => "$zip",
            )
        );
        $from_address = \EasyPost\Address::create(
            array(
                "company" => "Eternally Nocturnal",
                "street1" => "31121 Westfield",
                "city"    => "Livonia",
                "state"   => "MI",
                "zip"     => "48150",
                "phone"   => "313-515-5094"
            )
        );
        $parcel = \EasyPost\Parcel::create(
            array(
                "weight" => "$weight"
            )
        );
        $shipment = \EasyPost\Shipment::create(
            array(
                "to_address"   => $to_address,
                "from_address" => $from_address,
                "parcel"       => $parcel
            )
        );

        return $shipment->lowest_rate();
    }
}
