<?php

namespace App\Entities;

use App\Entities\Traits\CastEnable;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use CastEnable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'enable',
    ];
}
