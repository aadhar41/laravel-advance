<?php

namespace App\Billing;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CreditPaymentGateway implements PaymentGatewayContract
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
        // fee for the credit card.
        $fees = $amount * 0.03;

        // Charge the bank
        return [
            'confirmation_number' => Str::random(10),
            'currency' => $this->currency,
            'amount' => ($amount - $this->discount) + $fees,
            'discount' => $this->discount,
            'fees' => $amount * 0.03,
        ];
    }
}
