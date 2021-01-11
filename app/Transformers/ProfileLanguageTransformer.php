<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;

use App\Models\ProfileLanguage;

class ProfileLanguageTransformer extends TransformerAbstract
{
	public function transform(ProfileLanguage $language)
	{
	    return [
            'id' => $language->id,
            'name' => $language->name,
            'slug' => $language->slug,
            'is_approved'=>$language->is_approved
	    ];
	}
}
