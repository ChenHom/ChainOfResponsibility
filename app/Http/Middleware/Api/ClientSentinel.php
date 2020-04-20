<?php
namespace App\Http\Middleware\Api;

use App\Exceptions\PaymentException;
use App\Tools\TraderDTO;

class ClientSentinel
{
    /**
     * Handle an incoming request.
     *
     * @param  TraderDTO  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(TraderDTO $dto, \Closure $next)
    {
        /**
         * sign validate
         */
        if ($dto->request->sign !== $dto->user->getSign(
            $dto->request->except('sign')
        )) {
            throw new PaymentException('sign error', 'A002');
        }

        /**
         * other validate
         */

        return $next($dto);
    }
}
