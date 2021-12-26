<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'status',
        'company',
        'phone',
        'address1',
        'address2',
        'phone_extension',
        'fax',
        'city',
        'email',
        'state',
        'zip_code',
        'credit_limit',
        'currency',
        'note',
        'billing_company',
        'billing_phone',
        'billing_address1',
        'billing_address2',
        'billing_phone_extension',
        'billing_fax',
        'billing_city',
        'billing_state',
        'billing_zip_code',
    ];

    /**
     * Get the loads for the customer.
     */
    public function loads()
    {
        return $this->hasMany('App\Models\Load');
    }

    /**
     * Get the documents for the Customer.
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
