<?php

return [
    'middleware' => [
        App\Http\Middleware\Api\ClientValidator::class,
        App\Http\Middleware\Api\ClientLimiter::class,
        App\Http\Middleware\Api\ChannelDirector::class,
    ]
];
