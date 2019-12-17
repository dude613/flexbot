<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function stripe(){
        return view('modules.payment.stripe');
    }
}
