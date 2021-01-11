<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\ChatGrant;

class TokenController extends Controller
{

	public function __construct()
	{
	   $this->sid = config('services.twilio.sid');
       $this->token = config('services.twilio.token');
       $this->key = config('services.twilio.key');
       $this->secret = config('services.twilio.secret');
       $this->chat_service = config('services.twilio.chat_service');
	}

    public function generate(Request $request)
        {
                $token = new AccessToken(
                        $this->sid,
                        $this->key,
                        $this->secret,
                        3600,
                        $request->email
                );

                $chatGrant = new ChatGrant();
                $chatGrant->setServiceSid($this->chat_service);
                $token->addGrant($chatGrant);

                return response()->json([
                        'token' => $token->toJWT()
                ]);
        }
}