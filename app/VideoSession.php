<?php

namespace App;

use Validator;
use Illuminate\Database\Eloquent\Model;

class VideoSession extends Model
{
    protected $table = "video_sessions";
    protected $fillable = [
            'user_id', 'session_name', 'session_pass', 'desc', 'ended_at'
        ];

    /*
	|----------------------------------------------------------------
	|	Validation rules
	|----------------------------------------------------------------
	*/
	public $rules = array(

		'session_name'		=> 'required|max:191',
        'session_pass'		=> 'required|max:191',

    );

    /*
	|----------------------------------------------------------------
	|	Validate data records
	|----------------------------------------------------------------

    public function validate($data){
       
        $ruleType = $this->rules;

        $validator = Validator::make($data,$ruleType);

        if($validator->fails()){
            return $validator;
        }
	} */
}
