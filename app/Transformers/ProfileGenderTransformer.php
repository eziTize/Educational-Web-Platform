<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileGender;

class ProfileGenderTransformer extends TransformerAbstract
{
	public function transform(ProfileGender $gender)
	{
	    return [
            'id' => $gender->id,
            'user_id' => $gender->user_id,
			'gender' => $gender->gender,
	    ];
	}
}
