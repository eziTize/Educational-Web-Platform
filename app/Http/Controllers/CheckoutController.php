<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
//use Stripe;
//use App\Http\Requests\CheckoutRequest;

use Cartalyst\Stripe\Exception\CardErrorException;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CheckoutController extends Controller
{
    public function index()
    {
        return view('checkout.checkout-wrapper');
    }

    public function store(Request $request)
    {
        try {
            $charge = Stripe::charges()->create([
                'amount' => '2000',
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'Couch Tribe Order',
                //'receipt_email' => $request->email,
                'metadata' => [
                    //change to Order ID after we start using DB
                  //  'contents' => $contents,
                   // 'quantity' => '10',
                ],
            ]);
            // SUCCESSFUL
             return back()->with('success_message', 'Thank you! Your payment was successful!');
           } catch (CardErrorException $e) {


           }
    }
}
