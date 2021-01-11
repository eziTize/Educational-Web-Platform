<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "students_profile";
    protected $fillable = [
        'user_id',
		'dob',
		'job',
        'gender',
		'describe',
		'motivates',
		'hobbies',
		'profile_img',
    ];
}
