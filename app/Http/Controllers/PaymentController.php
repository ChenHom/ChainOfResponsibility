<?php

namespace App\Http\Controllers;

// use App\Http\Requests\PaymentRequest as Request;
use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    public function __invoke(Request $paymentRequest, PaymentService $paymentService)
    {
        return $paymentService->process($paymentRequest);
    }
}
