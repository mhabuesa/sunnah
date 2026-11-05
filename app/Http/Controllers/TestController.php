<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Raziul\Sslcommerz\Facades\Sslcommerz;

class TestController extends Controller
{

    public function index()
    {
        return view('test');
    }

    public function test()
    {
        $amount = 1200;
        $invoiceId = 1280;
        $name = 'Abu Esa';
        $email = 'mhabuesa@gmail.com';
        $phone = '01712345678';
        $address = 'Dhaka, Bangladesh';

        $response = Sslcommerz::setOrder($amount, $invoiceId, 'Order #' . $invoiceId)
            ->setCustomer($name, $email, $phone, $address)
            ->setShippingInfo(1, $address)
            ->makePayment();

        if ($response->success()) {
            return redirect($response->gatewayPageURL());
        }
    }
}