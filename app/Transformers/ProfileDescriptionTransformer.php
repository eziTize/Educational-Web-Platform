<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileDescription;

class ProfileDescriptionTransformer extends TransformerAbstract
{
	public function transform(ProfileDescription $description)
	{
	    return [
            'id' => $description->id,
			'description' => $description->description,
	    ];
	}
}
