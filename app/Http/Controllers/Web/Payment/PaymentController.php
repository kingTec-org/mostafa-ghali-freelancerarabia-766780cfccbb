<?php

namespace App\Http\Controllers\Web\Payment;

use App\Helpers\TelrPayment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PaymentController extends Controller
{
    use TelrPayment;
    public function showForm(){
        return view('web.payment.payment');
    }
    public function CreatePayment(){
        dd($this->createTelrPayment());
    }
}
