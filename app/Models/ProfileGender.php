<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileGender extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "profile_genders";
    protected $fillable = [
        'user_id','gender'
    ];
}
