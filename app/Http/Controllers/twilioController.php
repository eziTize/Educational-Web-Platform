<?php
   namespace App\Http\Controllers;

   use Illuminate\Http\Request;

   use Auth;
   use App\VideoSession;
   use Twilio\Rest\Client;
   use Twilio\Jwt\AccessToken;
   use Illuminate\Support\Str;
   use Twilio\Jwt\Grants\VideoGrant; 

class twilioController extends Controller
{
	protected $sid;
	protected $token;
	protected $key;
	protected $secret;


	public function __construct()
	{
	   $this->sid = config('services.twilio.sid');
       $this->token = config('services.twilio.token');
       $this->key = config('services.twilio.key');
       $this->secret = config('services.twilio.secret');
	}


	/*
    |------------------------------------------------------------------
    |   Video Rooms Index
    |------------------------------------------------------------------
    */

	public function index()
	{
	   
	   $rooms = VideoSession::where('user_id', auth()->user()->id)->get();

	   /*$rooms = [];
	   try {
	       $client = new Client($this->sid, $this->token);
	       $allRooms = $client->video->rooms->read([]);

	        $rooms = array_map(function($room) {
	           return $room->uniqueName;
	        }, $allRooms);

	   } catch (Exception $e) {
	       echo "Error: " . $e->getMessage();
	   }*/

	   return view('twilio.index', ['rooms' => $rooms]);
	}


	/*
    |------------------------------------------------------------------
    |   Video Rooms Create
    |------------------------------------------------------------------
    */
	public function createRoom($roomName)
	{
	   $client = new Client($this->sid, $this->token);


	   //if($v_session->validate($request->all())){
         //   return back()->withErrors($v_session->validate($request->all()))->withInput();
       // }
	   if(VideoSession::where('session_name', $roomName)->count() == 0){
		 	   $v_session = new VideoSession;
			   $v_session->user_id =  auth()->user()->id;
			   $v_session->session_name = $roomName;
			   $v_session->session_pass =  Str::uuid();
			   $v_session->save();
	   }


	    $exists = $client->video->rooms->read([ 'uniqueName' => $roomName]);

	    if (empty($exists)) {
	       $client->video->rooms->create([
	           'uniqueName' => $roomName,
	           'type' => 'group',
	           'recordParticipantsOnConnect' => true
	       ]);

	       \Log::debug("Session Created: ".$roomName);
	    }

		  return redirect()->action('twilioController@joinRoom', [
		      'roomName' => $roomName,
		      'exists' => $exists
		  ]);

	      /*return redirect()->action('twilioController@index')->with('room_session_created',[
	       'roomLink' => url('/').'/video-session/join/'.$v_session->session_name,
	       'roomPass' => $v_session->session_pass,
	   	]);*/
	}


	/*
    |------------------------------------------------------------------
    |   Join Video Session
    |------------------------------------------------------------------
    */
	public function joinRoom($roomName)
	{

	   $identity = 'ct_'.auth()->user()->id.'_'.uniqid();
	   $user_name = auth()->user()->name;
	   //$v_session = VideoSession::where('session_name', $roomName)->firstOrFail();
	   //$exists = $client->video->rooms->read([ 'uniqueName' => $roomName]);

	    if(VideoSession::where('session_name', $roomName)->count() == 0){
	    	return back()->with('error_message', 'Coach has not started the session yet.');
	    }
	   	
	   	\Log::debug("joined with identity: $identity");
		$token = new AccessToken($this->sid, $this->key, $this->secret, 3600, $identity);
		$videoGrant = new VideoGrant();
		$videoGrant->setRoom($roomName);
		$token->addGrant($videoGrant);
		return view('twilio.room', [ 'accessToken' => $token->toJWT(), 'roomName' => $roomName, 'user_name' => $user_name ])->with('action_success','Session Joined Successfully.');
	   
	}

}