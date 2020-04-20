<?php

return [
    'middleware' => [
        // App\Http\Middleware\Api\ClientValidator::class,
        App\Http\Middleware\Api\ClientSentinel::class,
        App\Http\Middleware\Api\ChannelDirector::class . ':User',
    ]
];
