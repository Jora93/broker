<?php

namespace App\Models;

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
        'company_id',
        'carrier_id',
        'customer_id',
        'dispatcher_id',
        "status",
        "voided_reason",
        "product",
        "purchase_order_number",
        "trailer_size",
        "customer_costs_rate_per_unit",
        "carrier_costs_rate_per_unit",
        "carrier_equipment_id",
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
        'shipper_pickup_time_from',
        'shipper_pickup_time_to',
        'shipper_pickup_time_appt',
        'shipper_pickup_time_fcfs',
        'shipper_payment_method',
        'shipper_notes',
        'truck_number',
        'trailer_number',
        'driver',
        'driver_number',
        'pro_number',
        'driver_email',
        'changed',
        'load_number',
        'invoice_number',
        'invoice_date',
        'invoice_past_due_date',
        'shipper_quick_pay_percent',
        'shipper_factoring',
        'has_noa',
        'shipper_factoring_ach_account_number',
        'shipper_factoring_ach_routing_number',
        'shipper_factoring_zelle_phone',
        'shipper_factoring_zelle_email',
        'customer_units_id',
        'carrier_units_id',
        'note'
    ];

    public function getShipperPickupDateAttribute() {
        if (isset($this->attributes['shipper_pickup_date'])) {
            return date("m-d-Y", strtotime($this->attributes['shipper_pickup_date']));
        }
        return null;
    }

    public function getInvoiceDateAttribute() {
        if (isset($this->attributes['invoice_date'])) {
            return date("m-d-Y", strtotime($this->attributes['invoice_date']));
        }
        return null;
    }

    public function getInvoicePastDueDateAttribute() {
        if (isset($this->attributes['invoice_past_due_date'])) {
            return date("m-d-Y", strtotime($this->attributes['invoice_past_due_date']));
        }
        return null;
    }

    public function getCustomerCostsRatePerUnitAttribute(): int
    {
        if (isset($this->attributes['customer_costs_rate_per_unit'])) {
            return intval(str_replace(',', '', $this->attributes['customer_costs_rate_per_unit']));
        }
        return 0;
    }

    public function getCarrierCostsRatePerUnitAttribute(): int
    {
        if (isset($this->attributes['carrier_costs_rate_per_unit'])) {
            return intval(str_replace(',', '', $this->attributes['carrier_costs_rate_per_unit']));
        }
        return 0;
    }

//    public function setShipperPickupDateAttribute($value) {
//        if (isset($this->attributes['shipper_pickup_date'])) {
////            $this->attributes['shipper_pickup_date'] = date("Y-m-d", strtotime($value));
//            $this->attributes['shipper_pickup_date'] = date("Y-m-d", strtotime(str_replace('-', '/', $value)));
//        }
//    }

    /**
     * Get the customer for the load.
     */
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    /**
     * Get the carrier for the load.
     */
    public function carrier()
    {
        return $this->belongsTo('App\Models\Carrier');
    }

    /**
     * Get the dispatcher for the load.
     */
    public function dispatcher()
    {
        return $this->belongsTo('App\Models\Dispatcher');
    }

    /**
     * Get the drops for the load.
     */
    public function drops()
    {
        return $this->hasMany('App\Models\Drop');
    }

    /**
     * Get the history for the Load.
     */
    public function histories()
    {
        return $this->hasMany('App\Models\LoadHistory');
    }

    /**
     * Get the documents for the Load.
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
