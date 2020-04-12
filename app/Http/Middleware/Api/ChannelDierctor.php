<?php
namespace App\Http\Middleware\Api;

class ChannelDirector
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param User $client
     * @return mixed
     */
    public function handle($request, \Closure $next, $client = null)
    {

        return $next($request);
    }
}
