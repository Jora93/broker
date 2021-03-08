<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dispatcher extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'dispatchers';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'company_id',
        'full_name',
        'email'
    ];


    /**
     * Get the loads for the dispatcher.
     */
    public function loads()
    {
        return $this->hasMany('App\Load');
    }
}
