<?php
namespace App\Services;

use App\Tools\TraderDTO;
use Illuminate\Pipeline\Pipeline;

class PaymentService
{
    private $postMan;

    public function process(TraderDTO $dto)
    {
        return (new Pipeline(app()))
            ->send($dto)
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
        return function (TraderDTO $dto) {
            return [$dto->request->toArray(), $dto->user];
        };
    }
}
