<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\Zone;

class ZoneTransformer extends TransformerAbstract
{
	public function transform(Zone $zone)
	{
	    return [
			'zone_id' => $zone->zone_id,
			'country_code' => $zone->country_code,
            'zone_name' => $zone->zone_name,
	    ];
	}
}
