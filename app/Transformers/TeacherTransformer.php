<?php
namespace App\Transformers;
use League\Fractal;
use League\Fractal\TransformerAbstract;
use App\Transformers\{
    ProfileVisibilityTransformer,
    ProfileGenderTransformer,
    ProfileLanguageTransformer,
    ProfileCategoryTransformer,
    ProfileAccomplishmentTransformer,
    ProfileTransformationTransformer,
    ProfileHobbiesTransformer,
    ProfileDescriptionTransformer,
    ProfileExtraTransformer,
    TeacherSkillTransformer,
    TeacherServiceTransformer,
    ProfileCertificationTransformer,
};

use App\User;

class TeacherTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'description'
    ];

	/**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        'visibility','languages','categories','accomplishments','description','extras','skills', 'certification', 'hobbies', 'gender', 'services', 'transformations'
	];
	
	public function transform(User $user)
	{
	    return [
			'id' => (int) $user->id,
			'first_name' => $user->name,
			'email' => $user->email,
            'last_name' => $user->last_name,
            'full_name' => $user->full_name,
			'contact_number' => $user->contact_number,
			'zone_id' => $user->zone_id,
            'country' => $user->country,
            'city' => $user->city,
            'address' => $user->address,
            'profile_image' => $user->profile_image,
            'profile_video' => $user->profile_video,
            'banner_image' => $user->banner_image,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
	    ];
	}

	/**
     * Include Profile Visibility
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeVisibility(User $user)
    {
        $profile_visibility = $user->profile_visibility;
		
        return $this->item($profile_visibility, new ProfileVisibilityTransformer());
    }

    /**
     * Include User Gender
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeGender(User $user)
    {
        $profile_gender = $user->profile_gender;
        
        return $this->item($profile_gender, new ProfileGenderTransformer());
    }

    /**
     * Include Profile Languages
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeLanguages(User $user)
    {
        $profile_languages = $user->profile_languages;

        return $this->collection($profile_languages, new ProfileLanguageTransformer());
	}

	/**
     * Include Profile Categories
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCategories(User $user)
    {
        $profile_categories = $user->profile_categories;

        return $this->collection($profile_categories, new ProfileCategoryTransformer());
	}
	
	/**
     * Include Profile Accomplishments
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeAccomplishments(User $user)
    {
        $profile_accomplishments = $user->profile_accomplishments;

        return $this->collection($profile_accomplishments, new ProfileAccomplishmentTransformer());
    }


    /**
     * Include Profile Transformations
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeTransformations(User $user)
    {
        $profile_transformations = $user->profile_transformations;

        return $this->collection($profile_transformations, new ProfileTransformationTransformer());
    }


    /**
     * Include Profile Description
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeDescription(User $user)
    {
        $profile_description = $user->profile_description;

        return $this->item($profile_description, new ProfileDescriptionTransformer());
    }

    /**
     * Include Profile Extras
     *
     * @return \League\Fractal\Resource\Item
     */
    public function includeExtras(User $user)
    {
        $profile_extras = $user->profile_extras;

        return $this->item($profile_extras, new ProfileExtraTransformer());
    }

    /**
     * Include Teacher Skills
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeSkills(User $user)
    {
        $skills = $user->skills;

        return $this->collection($skills, new TeacherSkillTransformer());
    }

    /**
     * Include Teacher Services
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeServices(User $user)
    {
        $services = $user->services;

        return $this->collection($services, new TeacherServiceTransformer());
    }

    /**
     * Include Teacher Certification
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeCertification(User $user)
    {
        $certification = $user->certification;

        return $this->collection($certification, new ProfileCertificationTransformer());
    }

    /**
     * Include Teacher Hobbies
     *
     * @return \League\Fractal\Resource\Collection
     */
    public function includeHobbies(User $user)
    {

        $profile_hobbies = $user->profile_hobbies;

        return $this->collection($profile_hobbies, new ProfileHobbiesTransformer());

    }
}
