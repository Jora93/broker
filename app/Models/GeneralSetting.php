<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'general_settings';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        "name",
        "time_zone",
        "first_name",
        "last_name",
        "address1",
        "address2",
        "city",
        "toll_free_phone",
        "state",
        "fax",
        "zip_code",
        "email",
        "website",
        "default_currency",
        "fed_id",
        "scac",
        "confirmation_note",
        "rate_quote_terms_conditions",
        "bill_of_lading_terms_conditions",
        "invoice_terms_conditions"
    ];
}
