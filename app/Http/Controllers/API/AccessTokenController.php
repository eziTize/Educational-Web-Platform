<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Twilio\Jwt\AccessToken;
use Twilio\Jwt\Grants\VideoGrant;
//use twilio\Services\Twilio;

class AccessTokenController extends Controller
{
   /* public function generate_token($user)
    {
        // TWILIO CREDENTIALS
        $TWILIO_ACCOUNT_SID = env('TWILIO_ACCOUNT_SID');
        //$TWILIO_CONFIGURATION_SID = "61723bba016c0cf52be0789bd3cb37b7";
        $TWILIO_API_KEY = env('TWILIO_API_KEY_SID');
        $TWILIO_API_SECRET = env('TWILIO_API_KEY_SECRET');

        // CREATE TWILIO TOKEN
        // $id will be the user name used to join the chat
       // $id = $request->get('id');

        $token = new AccessToken(
            $TWILIO_ACCOUNT_SID,
            $TWILIO_API_KEY,
            $TWILIO_API_SECRET,
            3600,
            $user
        );

        // GRANT ACCESS TO CONVERSTATION
        $grant = new VideoGrant();
        //$grant->setRoom('Test 1 Room');
        $token->addGrant($grant);

        // JSON ENCODE RESPONSE
        echo json_encode(array(
            //'id'    => $id,
            'identity' => $user,
            'token' => $token->toJWT(),
        ));
    }

*/

// ADD TWILIO REQURIED LIBRARIES
//require_once('twilio/Services/Twilio.php');


public function generate_token()
    {
        // Substitute your Twilio Account SID and API Key details
        $accountSid = env('TWILIO_ACCOUNT_SID');
        $apiKeySid = env('TWILIO_API_KEY_SID');
        $apiKeySecret = env('TWILIO_API_KEY_SECRET');

        $identity = rand(3,1000);

        // Create an Access Token
        $token = new AccessToken(
            $accountSid,
            $apiKeySid,
            $apiKeySecret,
            3600,
            $identity
        );

        // Grant access to Video
        $grant = new VideoGrant();
        $grant->setRoom('cool room');
        $token->addGrant($grant);

        // Serialize the token as a JWT
        echo $token->toJWT();
    }
}
