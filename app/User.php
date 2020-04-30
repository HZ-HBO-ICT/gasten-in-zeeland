<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use betterapp\LaravelDbEncrypter\Traits\EncryptableDbAttribute;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use EncryptableDbAttribute;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','kvk_number' ,'organisation','accomodation' ,'max_capacity', 'email', 'password',
    ];

    protected $encryptable = [
        'kvk_number',
        'password',
        'name',
        'organisation',
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

    public function getMaxAllowedAttribute(){

        $allowed_percentage = 15;
        $result = 0.01 * $this->max_capacity * $allowed_percentage;

        $num = $result;
        $guestSentence = 'Aantal gasten (op dit moment zijn maximaal %d gasten (15%%) toegestaan. ';
        return sprintf($guestSentence, $num);
    }

}
