<?php

namespace App\Http\Controllers;

use App\Entities\User;
use App\Tools\TraderDTO;
use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function __invoke(Request $paymentRequest, PaymentService $paymentService)
    {
        return $paymentService->process(new TraderDTO($paymentRequest));
    }

    public function test()
    {
        $user = User::find(4);
        $user->userPayment->first()->load(['channel', 'payment']);
        dump($user->toArray());
    }
}
