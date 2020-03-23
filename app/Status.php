<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = [ 'measured_at', 'count' ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'measured_at' => 'date'
    ];


    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
