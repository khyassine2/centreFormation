<?php

namespace App\Http\Controllers;
use Session;
use Stripe;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('payment');
    }

    public function payment()
    {
        return view('payment_v');
    }
    public function pay($obj)
    {
        return view('paym',['form'=>$obj]);
    }

    public function stripePost(Request $request)
    {
        $request->validate([
            'cvc' => 'required|max:3',
            'number' => 'required|max:20|min:14',
            'year' => 'required|max:4',
            'month' => 'required|max:2'
        ]);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => 100*100,
                "currency" => "MAD",
                "source" => $request->stripeToken,
                "description" => "This payment is testing purpose of websolutionstuff",
        ]);
   
        Session::flash('success', 'Payment Successfull!');
           
        return back();
    }
}
