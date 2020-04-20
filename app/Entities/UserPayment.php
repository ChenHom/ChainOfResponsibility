<?php

namespace App\Entities;

use App\Entities\Traits\CastEnable;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UserPayment extends Pivot
{
    use CastEnable;

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

    public function channel()
    {
        return $this->hasManyThrough(
            Channel::class, ChannelPayment::class,
            'id',
            'id',
            'channel_payment_id',
            'channel_id'
        );
    }

    public function payment()
    {
        return $this->hasManyThrough(
            Payment::class, ChannelPayment::class,
            'id',
            'id',
            'channel_payment_id',
            'payment_id'
        );
    }
}
