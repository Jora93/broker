<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'carriers';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'company',
        'status',
        'phone',
        'fax',
        'address',
        'currency',
        'preferredCarrierStatus',
        'smartwayCertified',
        'payeeCompany',
        'payeePhone',
        'payeeAddress',
        'mcNumber',
        'dotNumber'
    ];
}
