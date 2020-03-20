<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lodging_name', 'lodging_max', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function statuses()
    {
        return $this->hasMany('App\Status');
    }

    /**
     * Returns true if the user is allowed to add a new statuses. This is controlled by a timout
     *
     * @return bool
     * @noinspection PhpUnused
     */
    public function getCanAddNewStatusAttribute()
    {
        return $this->statuses()->count()==0 ||
            Carbon::now()->diffInDays($this->last_status_update) > env('TIMEOUT_INTERVAL_DAYS', 1);
    }

    public function getLastStatusUpdateAttribute()
    {
        return $this->statuses()->max('created_at');
    }
}
