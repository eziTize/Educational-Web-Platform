<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\TeacherService;

class TeacherServiceTransformer extends TransformerAbstract
{
	public function transform(TeacherService $service)
	{
	    return [
            'id' => $service->id,
            'user_id' => $service->user_id,
            'title' => $service->title,
            'description' => $service->description,
            'price' => intval($service->price),
            'database_price' => $service->price,
            'type' => $service->type,
            'is_approved'=>$service->is_approved,
            'freq_sess'=>$service->freq_sess
	    ];
	}
}
