<?php
namespace App\Guards;

use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;

class TradeGuard implements Guard
{
    use GuardHelpers;

    /**
     * @var string $clientId
     */
    protected $clientId;

    public function __construct(UserProvider $userProvider, $clientId)
    {
        $this->setProvider($userProvider);
        $this->clientId = $clientId;
    }

    public function user()
    {
        if ($this->hasUser()) {
            return $this->user;
        }
        $model = $this->getProvider()->createModel();

        return $this->user = $model->newQuery()
            ->where($model->ApiTradeAccount(), $this->clientId)
            ->first();
    }

    public function validate(array $credentials = [])
    {
    }
}
