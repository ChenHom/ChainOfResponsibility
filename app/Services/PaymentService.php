<?php
namespace App\Services;

use Illuminate\Pipeline\Pipeline;
use Symfony\Component\HttpFoundation\Request;

class PaymentService
{
    private $postMan;

    public function process(Request $request)
    {
        return (new Pipeline(app()))
            ->send($request)
            ->through(config('trade.middleware'))
            ->then($this->sender());
    }

    /**
     * Get the route dispatcher callback.
     *
     * @return \Closure
     */
    protected function sender()
    {
        return function ($request) {
            return $request;
        };
    }
}
