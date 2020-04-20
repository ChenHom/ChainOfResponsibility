<?php

namespace App\Entities;

use App\Entities\Traits\CastEnable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use CastEnable;

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
        'password', 'secret_key'
    ];

    /**
     * API 交易帳號欄位
     *
     * @var string
     */
    protected $apiAccount = 'name';

    public function ApiTradeAccount()
    {
        return $this->apiAccount;
    }

    public function userPayment()
    {
        return $this->hasMany(UserPayment::class);
    }

    public function cashBook()
    {
        return $this->hasOne(CashBook::class);
    }

    /**
     * get sign
     *
     * @param array $request
     * @return string
     */
    public function getSign(array $request)
    {
        $request['key'] = $this->secret_key;
        ksort($request);

        $str = '';
        foreach ($request as $key => $value) {
            if($value) {
                $str .= "{$key}={$value}&";
            }
        }

        return md5($str);
    }
}
