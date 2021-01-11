<?php

namespace App\Http\Controllers;

use Redirect;
use App\Payout;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class PayoutController extends Controller
{
    /*
    |------------------------------------------------------------------
    |   Get Profile
    |------------------------------------------------------------------
    */
    public function getProfile(Request $request)
    {
        //$user_id = auth('api')->user()->id;

     /* $data = [
            'cart_count' => $count,
            'cart_total' => number_format($cart_total, 2),
        ]; */
             
            
                $response = Http::withToken('a908cc02-5061-4554-b9ac-64b5203d8b48')->withHeaders([
                    'content-type' => 'application/json',
                ])->get('https://api.sandbox.transferwise.tech/v1/profiles');

                //$res = json_decode($response->getBody()->getContents());
                $res =  json_decode($response->body());

                return response ($res);

    }


    /*
    |------------------------------------------------------------------
    |   Payout List Page
    |------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        

        $data = [
            'data' => Payout::orderBy('created_at', 'desc')->get(),
        ];

        return View('p_index',$data);

    }


    /*
    |------------------------------------------------------------------
    |   Payout Create page
    |------------------------------------------------------------------
    */

    public function create()
    {
        $data = [
            'data' => new Payout,
        ];

        return View('test',$data);
    }

    /*
    |------------------------------------------------------------------
    |   Payout Store
    |------------------------------------------------------------------
    */

    public function store(Request $request, $id)
    {


        $data = new Payout;
        $data->name = $request->input('name');
        $data->ac_no = $request->input('ac_no');
        $data->ac_type = $request->input('ac_type');
        $data->amount = $request->input('amount');
        $data->save();


        return Redirect('/payout-demo')->with('message','Recepient Added Successfully.');

    }


    /*
    |------------------------------------------------------------------
    |   Make Payout
    |------------------------------------------------------------------
    */
    public function Payout(Request $request, $id)
    {
        

        $payout = Payout::findOrFail($id);
            // Quote Request
            $response1 = Http::withToken('a908cc02-5061-4554-b9ac-64b5203d8b48')->withHeaders([
                    'content-type' => 'application/json',
                ])->post('https://api.sandbox.transferwise.tech/v1/quotes',[

                    "profile" => 16012767,
                    "source" => "USD",
                    "target" => "USD",
                    "rateType" => "FIXED",
                    "targetAmount" => $payout->amount,
                    "type" => "BALANCE_PAYOUT"
                ]);
                
                $quote =  json_decode($response1->body());
                
                $quote_id = $quote->id;


            // Recepient Request
            $response2 = Http::withToken('a908cc02-5061-4554-b9ac-64b5203d8b48')->withHeaders([
                    'content-type' => 'application/json',
                ])->post('https://api.sandbox.transferwise.tech/v1/accounts',[

                    "currency" => "USD", 
                    "type" => "aba", 
                    "profile" => 16012767,
                    "accountHolderName" => $payout->name, //Recepient Name
                    "legalType" => "PRIVATE", //Private Or Business
                    "details" => [
                           "legalType" => "PRIVATE",
                           "abartn" => "111000025",
                           "accountNumber" => $payout->ac_no,
                           "accountType" => $payout->ac_type,
                           "address"  => [
                              "country" => "GB",
                              "city" => "London",
                              "postCode" => "10025",
                              "firstLine" => "50 Branson Ave"
                            ]
                        ]
                ]);
                
                $recepient =  json_decode($response2->body());
                
                $recepient_id = $recepient->id;


            // Transfer Request
            $response3 = Http::withToken('a908cc02-5061-4554-b9ac-64b5203d8b48')->withHeaders([
                    'content-type' => 'application/json',
                ])->post('https://api.sandbox.transferwise.tech/v1/transfers',[

                    "targetAccount" => $recepient_id,   
                    "quote" => $quote_id,
                    "customerTransactionId" => Str::uuid(),
                        "details"  => [
                        "reference"  => "to Coach",
                        "transferPurpose" => "Monthly Payout",
                        "sourceOfFunds" => "Couch Tribe"
                        ]
                ]);
                
                $transfer =  json_decode($response3->body());
                
                $transfer_id = $transfer->id;


                //Fund Transfer
                $response4 = Http::withToken('a908cc02-5061-4554-b9ac-64b5203d8b48')->withHeaders([
                    'content-type' => 'application/json',
                ])->post('https://api.sandbox.transferwise.tech/v3/profiles/16012767/transfers/'.$transfer_id.'/payments',[
                    "type" => "BALANCE" //Funded from TW Account
                ]);

              $ft =  json_decode($response4->body());

                
                if($ft->status == 'COMPLETED'){

                    return Redirect('/payout-demo')->with('message','Payout Sent Successfully.');

                }

                else{

                     return Redirect('/payout-demo')->with('error','Some Error Occured, Please try again later.');


                }


        }

}
