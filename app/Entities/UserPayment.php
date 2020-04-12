<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPayment extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'users_id',
        'channel_payment_id',
        'co_p',
        'sa_p',
        'a_p',
        'fee',
        'cost',
        'fee_type',
        'amount_limit',
        'min_limit',
        'max_limit',
        'enable',
    ];
}
