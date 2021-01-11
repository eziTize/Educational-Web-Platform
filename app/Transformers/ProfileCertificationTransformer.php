<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileCertification;

class ProfileCertificationTransformer extends TransformerAbstract
{
	public function transform(ProfileCertification $certification)
	{
	    return [
            'id' => $certification->id,
            'user_id' => $certification->user_id,
            'certificate' => $certification->certificate,
	    ];
	}
}