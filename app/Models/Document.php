<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'documents';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'company_id',
        'load_id',
        'customer_id',
        'carrier_id',
        'name',
        'type',
        'description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
