<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ChannelPayment extends Pivot
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'channel_id',
        'payment_id',
        'min_limit',
        'max_limit',
        'amount_limit',
        'fee',
        'cost',
        'fee_type',
        'deposit_fee',
        'deposit_cost',
        'deposit_fee_type',
        'delivery_type',
        'delivery_day',
        'enable',
        'remark',
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
