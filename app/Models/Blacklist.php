<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blacklist extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'black_list';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'company_id',
        'note',
        'mc_number'
    ];
}
