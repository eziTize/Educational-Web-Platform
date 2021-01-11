<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileExtra;

class ProfileExtraTransformer extends TransformerAbstract
{
	public function transform(ProfileExtra $extra)
	{
	    return [
			'travel_willingness' => $extra->travel_willingness,
			'average_price' => $extra->average_price,
			'average_price_original' => $extra->average_price_original,
			'dob' => $extra->dob,
			'facebook' => $extra->facebook,
			'insta' => $extra->insta,
			'linkedin' => $extra->linkedin,
			'twitter' => $extra->twitter,
			'pinterest' => $extra->pinterest,
	    ];
	}
}
