<?php
namespace App\Http\Middleware\Api;

use App\Entities\User;
use App\Tools\TraderDTO;

class ChannelDirector
{
    /**
     * Handle an incoming request.
     *
     * @param  TraderDTO  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($dto, \Closure $next)
    {

        return $next($dto);
    }
}
