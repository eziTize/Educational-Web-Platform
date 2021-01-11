<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\TeacherSkill;

class TeacherSkillTransformer extends TransformerAbstract
{
	public function transform(TeacherSkill $skill)
	{
	    return [
            'id' => $skill->id,
            'user_id' => $skill->user_id,
            'title' => $skill->title,
            'description' => $skill->description,
            'price' => intval($skill->price),
            'database_price' => $skill->price,
            'is_approved'=>$skill->is_approved
	    ];
	}
}
