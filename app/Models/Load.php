<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'loads';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'carrier_id',
        'customer_id',
        'dispatcher_id',
        'shipper_company',
        'shipper_phone',
        'shipper_phone_extension',
        'shipper_location_POS',
        'shipper_customer_POS',
        'shipper_address1',
        'shipper_fax',
        'shipper_address2',
        'shipper_quantity',
        'shipper_type',
        'shipper_city',
        'shipper_weight',
        'shipper_state',
        'shipper_value',
        'shipper_zip_code',
        'shipper_pickup_date',
        'shipper_pickup_number',
        'shipper_pickup_time',
        'shipper_notes',
//        'consignee_company',
//        'consignee_phone',
//        'consignee_phone_extension',
//        'consignee_contact_name',
//        'consignee_fax',
//        'consignee_address1',
//        'consignee_delivered_number',
//        'consignee_address2',
//        'consignee_delivery_date',
//        'consignee_city',
//        'consignee_delivery_time',
//        'consignee_delivery_state',
//        'consignee_BOL_payment_term',
//        'consignee_delivery_location_bol_number',
//        'consignee_delivery_location_zip_code',
//        'consignee_freight_class',
//        'consignee_national_motor_freight_class',
//        'consignee_bol_product',
//        'consignee_delivery_location_quantity',
//        'consignee_item_type',
//        'consignee_length',
//        'consignee_width',
//        'consignee_height',
//        'consignee_delivery_location_weight',
//        'consignee_haz_mat',
//        'consignee_bol_notes',
//        'consignee_delivery_location_notes',
        'truck_number',
        'trailer_number',
        'driver',
        'driver_number',
        'pro_number',
        'driver_email',
        'carrier_costs_units_id',
        'carrier_costs_rate_per_unit',
        'stops',
        'cost_per_stop',
        'miles',
        'fuel_surcharge_type',
        'driver_advance_gross'
    ];

    /**
     * Get the customer for the load.
     */
    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the carrier for the load.
     */
    public function carrier()
    {
        return $this->belongsTo('App\Carrier');
    }

    /**
     * Get the dispatcher for the load.
     */
    public function dispatcher()
    {
        return $this->belongsTo('App\Dispatcher');
    }

    /**
     * Get the drops for the load.
     */
    public function drops()
    {
        return $this->hasMany('App\Drop');
    }
}
