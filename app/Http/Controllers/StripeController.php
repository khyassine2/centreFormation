<?php

namespace App\Http\Controllers;
use Session;
use Stripe;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*100,
                "currency" => "MAD",
                "source" => $request->stripeToken,
                "description" => "payment success !",
        ]);
   
        Session::flash('success', 'Payment Successfull!');
           
        return back();
    }
}