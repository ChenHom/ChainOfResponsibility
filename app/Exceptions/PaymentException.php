<?php

namespace App\Exceptions;

use Exception;

class PaymentException extends Exception
{
    /**
     * The validator instance.
     *
     * @var \Illuminate\Contracts\Validation\Validator
     */
    public $validator;

    public $apiErrorCode;

    /**
     * The name of the error bag.
     *
     * @var string
     */
    public $errorBag;

    public function __construct($validator,string $apiErrorCode, $errorBag = 'default')
    {
        $this->apiErrorCode = $apiErrorCode;
        $this->errorBag = $errorBag;
        $this->validator = $validator;
    }

    /**
     * Get all of the validation error messages.
     *
     * @return array
     */
    public function errors()
    {
        if (is_string($this->validator)) {
            return $this->validator;
        }
        return $this->validator->errors()->messages();
    }

    /**
     * Set the HTTP status code to be used for the response.
     *
     * @param  int  $status
     * @return $this
     */
    public function status($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Set the error bag on the exception.
     *
     * @param  string  $errorBag
     * @return $this
     */
    public function errorBag($errorBag)
    {
        $this->errorBag = $errorBag;

        return $this;
    }

    /**
     * Get the underlying response instance.
     *
     * @return \Symfony\Component\HttpFoundation\Response|null
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function render($request)
    {
        return [
            'code' => $this->apiErrorCode,
            'message' => $this->errors()
        ];
    }
}
