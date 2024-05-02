<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showGateway()
    {
        // You can pass data to the view, if needed
        return view('payment_gateway');
    }
}