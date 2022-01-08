<?php

namespace App\Http\Controllers;

use App\Billing\PaymentGatewayContract;
use App\Orders\OrderDetails;
use Illuminate\Http\Request;

class PayOrderController extends Controller
{
    public function store(PaymentGatewayContract $paymentGateway, OrderDetails $orderDetails)
    {
        $order = $orderDetails->all();
        dd($paymentGateway->charge(2500));
    }
}
