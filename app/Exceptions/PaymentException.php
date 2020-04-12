<?php

namespace App\Exceptions;

use Exception;

class PaymentException extends Exception
{
    public function __construct($failCode, $message)
    {

    }
}
