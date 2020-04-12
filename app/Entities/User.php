<?php

namespace App\Entities;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'alias',
        'password',
        'role',
        'parent_id',
        'co_id',
        'sa_id',
        'a_id',
        'amount_limit',
        'secret_key',
        'enable',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function userChannel()
    {
        return $this->hasMany(UserPayment::class);
    }

    public function channelPayment()
    {
        return $this->hasOneThrough(ChannelPayment::class, UserPayment::class);
    }
}
