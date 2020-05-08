<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EncryptableDbAttribute;
    use LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'kvk_number', 'organisation', 'accommodation' , 'max_capacity', 'email', 'password',
    ];

    protected $encryptable = [
        'kvk_number',
        'password',
        'name',
        'organisation',
        'accommodation',
    ];

    protected static $logAttributes = [
        'name', 'kvk_number', 'organisation', 'accommodation' , 'max_capacity'
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


    /**
     * The statuses associated with this user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function statuses()
    {
        return $this->hasMany('App\Status');
    }


    /**
     * Returns the max allowed capacity by the government.
     *
     * @return int
     */
    public function getMaxAllowedAttribute(){

        $result = 0.01 * $this->max_capacity *
            env('MAX_ALLOWED_CAPACITY', 15);

        return round($result, 0);
    }

    /**
     * Returns a help message string for the count form field
     * @return string
     */
    public function guestCountHelpMessage()
    {
        return __('Currently, there is a maximum of :max_count guests (:max_percentage%) allowed', [
            'max_count' => $this->max_allowed,
            'max_percentage' => env('MAX_ALLOWED_CAPACITY', 15)
        ]);
    }


    /**
     * Scope a query to only include verified users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeVerified($query)
    {
        return $query->whereNotNull('email_verified_at');
    }

    /**
     * Scope a query to only include unverified users.
     *
     * @param  Builder  $query
     * @return Builder
     */
    public function scopeUnverified($query)
    {
        return $query->whereNull('email_verified_at');
    }

}
