<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileVisibility;

class ProfileVisibilityTransformer extends TransformerAbstract
{
	public function transform(ProfileVisibility $visibility)
	{
	    return [
            'id' => $visibility->id,
			'visibility_type' => $visibility->visibility_type,
	    ];
	}
}
