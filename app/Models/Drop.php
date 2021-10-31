<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Drop extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'drops';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'load_id',
        'company',
        'phone',
        'phone_extension',
        'contact_name',
        'fax',
        'address1',
        'delivered_number',
        'address2',
        'delivery_date',
        'city',
        'delivery_time',
        'delivery_state',
        'BOL_payment_term',
        'delivery_location_bol_number',
        'delivery_location_zip_code',
        'freight_class',
        'national_motor_freight_class',
        'bol_product',
        'delivery_location_quantity',
        'item_type',
        'length',
        'width',
        'height',
        'delivery_location_weight',
        'haz_mat',
        'bol_notes',
        'delivery_location_notes',
    ];

    public function getDeliveryDateAttribute() {
        return date("m-d-Y", strtotime($this->attributes['delivery_date']));
    }

    public function setDeliveryDateAttribute($value) {
        $this->attributes['delivery_date'] = date("Y-m-d", strtotime($value));
    }

    /**
     * Get the load for the drop.
     */
//    public function load()
//    {
//        return $this->belongsTo('App\Models\Load');
//    }
}
