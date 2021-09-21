<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'companies';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
            'id',
            'name',
            'mc_number',
            'phone_one',
            'phone_two',
            'adress',
            'invoice_last_number',
            'load_last_number',
            'logo'
        ];
}
