<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileCategory;

class ProfileCategoryTransformer extends TransformerAbstract
{
	public function transform(ProfileCategory $category)
	{
	    return [
            'id' => $category->id,
            'name' => $category->name,
            'slug' => $category->slug,
            'is_approved'=>$category->is_approved
	    ];
	}
}
