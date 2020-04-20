<?php
namespace App\Entities\Traits;

/**
 * Enable integer to bool
 */
trait CastEnable
{
    public function initializeCastEnable()
    {
        $this->casts = array_merge($this->casts, ['enable' => 'bool']);
    }

    public function setEnableAttribute($value)
    {
        $this->attributes['enable'] = strval($value);
    }
}
