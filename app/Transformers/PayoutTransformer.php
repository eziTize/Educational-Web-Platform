<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Payout;

class PayoutTransformer extends TransformerAbstract
{
	public function transform(Payout $payout)
	{
	    return [
			'user_id' => $payout->user_id,
			'ac_holder' => $payout->ac_holder,
            'ac_no' => $payout->ac_no,
            'tax_no' => $payout->tax_no,
			'rnib' => $payout->rnib,
            'ac_type' => $payout->ac_type,
            'country' => $payout->country,
			'city' => $payout->city,
            'postcode' => $payout->postcode,
            'st_addr' => $payout->st_addr,
	    ];
	}
}
