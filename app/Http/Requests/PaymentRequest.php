<?php

namespace App\Http\Requests;

use App\Exceptions\PaymentException;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class PaymentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => 'required',
            'slug' => 'required',
            'order_id' => 'required',
            'notify_url' => 'required',
            'amount' => 'required|integer|size:0',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        throw (new ValidationException($validator))
                    ->errorBag($this->errorBag);
        // throw (new PaymentException($validator))
        //             ->errorBag($this->errorBag);
    }

}
