<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileHobbies;

class ProfileHobbiesTransformer extends TransformerAbstract
{
	public function transform(ProfileHobbies $hobbies)
	{
	    return [
            'id' => $hobbies->id,
            'title' => $hobbies->title,
            'slug' => $hobbies->slug,
            'is_approved' => $hobbies->is_approved
	    ];
	}
}