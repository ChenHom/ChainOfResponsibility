<?php
namespace App\Http\Middleware\Api;

class ClientValidator
{
    /**
     * 驗證使用者的請求限制
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        return $next($request);
    }
}
