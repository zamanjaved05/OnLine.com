<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe;
use Session;
class StripeController extends Controller
{

    public function index()
    {
        return view('welcome');
    }

    public function makePayment(Request $request)
    {
        Stripe\Stripe::setApiKey('sk_test_51J7ZcUEmlMSPD9MKO5Al77O8IjzkeydlIVGIwCQjNkucHogihaghHVsrwRAn8JmCREPrQhplXM55IXlKIPTPvmar005tEVublJ');
        Stripe\Charge::create ([
            "amount" => 120 * 100,
            "currency" => "inr",
            "source" => $request->stripeToken,
            "description" => "Make payment and chill."
        ]);

        Session::flash('success', 'Payment successfully made.');

        return back();
    }}

