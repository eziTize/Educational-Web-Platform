<?php
namespace App\Models\TraitsRelationships;

trait UserRelationships{
    
    /**
     * Get the visibility status
     */
    public function profile_visibility()
    {
        return $this->hasOne('App\Models\ProfileVisibility');
    }

    /**
     * Get user gender
     */
    public function profile_gender()
    {
        return $this->hasOne('App\Models\ProfileGender');
    }
    /**
     * Get student pic
     */
     public function student_prof()
    {
        return $this->hasOne('App\Models\StudentProfile');
    }

    /**
     * Get the categories associated with user profile.
     */
    public function profile_languages()
    {
        return $this->belongsToMany('App\Models\ProfileLanguage');
    }

    /**
     * Get the users profile description
     */
    public function profile_description()
    {
        return $this->hasOne('App\Models\ProfileDescription');
    }

    /**
     * Get the categories associated with user profile.
     */
    public function profile_categories()
    {
        return $this->belongsToMany('App\Models\ProfileCategory');
    }

    /**
     * Get the accomplishments associated with user profile.
     */
    public function profile_accomplishments()
    {
        return $this->hasMany('App\Models\ProfileAccomplishment');
    }

    /**
     * Get the transformations associated with user profile.
     */
    public function profile_transformations()
    {
        return $this->hasMany('App\Models\ProfileTransformation');
    }

    /**
     * Get the hobbies associated with user profile.
     */
    public function profile_hobbies()
    {
        return $this->hasMany('App\Models\ProfileHobbies');
    }

    /**
     * Get the accomplishments associated with user profile.
     */
    public function profile_extras()
    {
        return $this->hasOne('App\Models\ProfileExtra');
    }

    /**
     * Get the skills associated with user profile.
     */
    public function skills()
    {
        return $this->hasMany('App\Models\TeacherSkill');
    }

    /**
     * Get the skills associated with user profile.
     */
    public function services()
    {
        return $this->hasMany('App\Models\TeacherService');
    }

    /**
     * Get the certificate(s) associated with user profile.
     */

    public function certification()
    {
        return $this->hasMany('App\Models\ProfileCertification');
    }
}