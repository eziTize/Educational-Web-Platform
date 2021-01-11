<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileAccomplishment;

class ProfileAccomplishmentTransformer extends TransformerAbstract
{
	public function transform(ProfileAccomplishment $accomplishment)
	{
	    return [
            'id' => $accomplishment->id,
            'title' => $accomplishment->title,
            'slug' => $accomplishment->slug,
            'is_approved' => $accomplishment->is_approved
	    ];
	}
}
