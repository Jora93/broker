<?php

namespace App\Models;

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
        'company_id',
        "contracted_on",
        "status",
        "company",
        "phone",
        "dba_name",
        "phone_extension",
        "address1",
        "cell_phone",
        "address2",
        "fax",
        "city",
        "state",
        "email",
        "zip_code",
        "carrier_fee",
        "preferred_carrier_status",
        "smart_way_certified",
        "carb_compliant",
        "use_dba_name",
        "require_carrier_agreement",
        "flagged",
        "flag",
        "note",

        "payee_company",
        "payee_phone",
        "payee_dba_name",
        "payee_phone_extension",
        "payee_address1",
        "payee_cell_phone",
        "payee_address2",
        "payee_fax",
        "payee_city",
        "payee_state",
        "payee_fed_id",
        "payee_zip_code",

        "factoring_company_name",
        "factoring_phone",
        "factoring_remit_address",
        "factoring_remit_email",
        "factoring_remit_address2",
        "factoring_remit_city",
        "factoring_remit_zipcode",
        "factoring_state",

        "mc_number",
        "dot_number",

        "insurance1_type",
        "insurance1_insurer",
        "insurance1_amount",
        "insurance1_policy_number",
        "insurance1_effective_on",
        "insurance1_expires_on",
        "insurance1_phone",
        "insurance1_email",

        "insurance2_type",
        "insurance2_insurer",
        "insurance2_amount",
        "insurance2_policy_number",
        "insurance2_effective_on",
        "insurance2_expires_on",
        "insurance2_phone",
        "insurance2_email"
    ];

    /**
     * Get the loads for the carrier.
     */
    public function loads()
    {
        return $this->hasMany('App\Models\Load');
    }

    public function getContractedOnAttribute() {
        return date("m-d-Y", strtotime($this->attributes['contracted_on']));
    }

    public function setContractedOnAttribute($value) {
        $this->attributes['contracted_on'] = date("Y-m-d", strtotime($value));
    }

    public function getInsurance1EffectiveOnAttribute() {
        return date("m-d-Y", strtotime($this->attributes['insurance1_effective_on']));
    }

    public function setInsurance1EffectiveOnAttribute($value) {
        $this->attributes['insurance1_effective_on'] = date("Y-m-d", strtotime($value));
    }

    public function getInsurance1ExpiresOnAttribute() {
        return date("m-d-Y", strtotime($this->attributes['insurance1_expires_on']));
    }

    public function setInsurance1ExpiresOnAttribute($value) {
        $this->attributes['insurance1_expires_on'] = date("Y-m-d", strtotime($value));
    }

    public function getInsurance2EffectiveOnAttribute() {
        return date("m-d-Y", strtotime($this->attributes['insurance2_effective_on']));
    }

    public function setInsurance2EffectiveOnAttribute($value) {
        $this->attributes['insurance2_effective_on'] = date("Y-m-d", strtotime($value));
    }

    public function getInsurance2ExpiresOnAttribute() {
        return date("m-d-Y", strtotime($this->attributes['insurance2_expires_on']));
    }

    public function setInsurance2ExpiresOnAttribute($value) {
        $this->attributes['insurance2_expires_on'] = date("Y-m-d", strtotime($value));
    }

    /**
     * Get the documents for the Carrier.
     */
    public function documents()
    {
        return $this->hasMany('App\Models\Document');
    }
}
