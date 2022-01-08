<?php

namespace App\Billing;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BankPaymentGateway implements PaymentGatewayContract
{

    /**
     * currency for the payment.
     *
     * @var string
     */
    private $currency;

    /**
     * Total discount that would be applied.
     *
     * @var float
     */
    private $discount;

    /**
     * Constructor function
     *
     * @param string $currency
     */
    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    /**
     * serDiscount function to set the discount.
     *
     * @param float $amount
     * @return void
     */
    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    /**
     * charge function for charging amount from the bank.
     *
     * @param float $amount
     * @return void
     */
    public function charge($amount)
    {
        // Charge the bank
        return [
            'amount' => $amount - $this->discount,
            'discount' => $this->discount,
            'confirmation_number' => Str::random(10),
            'currency' => $this->currency,
        ];
    }
}
