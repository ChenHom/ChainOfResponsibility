<?php

namespace App\Entities;

use App\Entities\Traits\CastEnable;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use CastEnable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'amount_limit', 'enable', 'remark',
    ];

    public function payments()
    {
        return $this->hasManyThrough(
            Payment::class,
            ChannelPayment::class,
            'channel_id',
            'id',
            'id',
            'payment_id'
        );
    }

    public function channelPayments()
    {
        return $this->hasMany(ChannelPayment::class);
    }

    // public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists, $using = null)
    // {
    //     if ($parent instanceof User) {
    //         return ChannelPayment::fromAttributes($parent, $attributes, $table, $exists);
    //     }

    //     return parent::newPivot($parent, $attributes, $table, $exists);
    // }
}
