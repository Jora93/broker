<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoadHistory extends Model
{
    /**
     * The table associated with the model.
     * @var string
     */
    protected $table = 'load_history';

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'load_id',
        'user_id',
        'info',
        'confirmed',
        'reviewer_id'
    ];

    public function parent()
    {
        return $this->belongsTo('App\Load', 'load_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function reviewer()
    {
        return $this->belongsTo('App\User', 'reviewer_id');
    }
}
