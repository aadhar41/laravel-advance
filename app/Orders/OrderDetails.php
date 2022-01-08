<?php

namespace App\Orders;

use App\Billing\PaymentGatewayContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class OrderDetails extends Controller
{

    /**
     * paymentgateway variable
     *
     * @var \App\Billing\PaymentGateway
     */
    private $paymentGateway;

    /**
     * constructor function
     *
     * @param PaymentGateway $paymentGateway
     */
    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    /**
     * Charge the bank
     *
     * @param float $amount
     * @return void
     */
    public function all($amount = null)
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Aadhar',
            'address' => '123 Stone Street',
        ];
    }
}
