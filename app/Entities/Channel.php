<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'amount_limit', 'enable', 'remark',
    ];

    public function newPivot(\Illuminate\Database\Eloquent\Model $parent, array $attributes, $table, $exists, $using = null)
    {
        if ($parent instanceof User) {
            return ChannelPayment::fromAttributes($parent, $attributes, $table, $exists);
        }

        return parent::newPivot($parent, $attributes, $table, $exists);
    }
}
