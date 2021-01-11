<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileTransformation;

class ProfileTransformationTransformer extends TransformerAbstract
{
	public function transform(ProfileTransformation $transformation)
	{
	    return [
            'id' => $transformation->id,
            'title' => $transformation->title,
            'slug' => $transformation->slug,
            'is_approved' => $transformation->is_approved
	    ];
	}
}