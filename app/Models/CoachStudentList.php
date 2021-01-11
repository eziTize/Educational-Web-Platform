<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CoachStudentList extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "coach_student_listing";
    protected $fillable = [
        'student_id', 
        'coach_id'
    ];
}