<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentQA extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "student_qa";
    protected $fillable = [
        'user_id',
		'ans_1',
		'ans_2',
		'ans_3',
		'ans_4',
		'ans_5',
		'ans_6',
        'ans_7',
        'ans_8',
        'ans_9',
    ];
}
