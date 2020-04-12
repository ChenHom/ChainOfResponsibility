<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Validator;

class RequestValidator
{
    /**
     * @var array
     */
    protected static $rules = [
        'client_id' => 'required',
        'slug' => 'required',
        'order_id' => 'required',
        'notify_url' => 'required|url',
        'amount' => 'required|min:1',
    ];

    /**
     * @var array
     */
    protected static $messages = [
        'required' => ':attribute 必須有值',
        'url' => ':attribute 必須是網址',
        'numeric' => ':attribute 必須是數字',
        'min' => ':attribute 必須大於 0'
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fails = Validator::make($request->all(), static::$rules, static::$messages);
        if ($fails->fails()) {
            dd($fails->getMessageBag()->all());
            //     $fails->failed();
            //     return ;
        }
        return $next($request);
    }
}
