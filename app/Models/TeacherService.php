<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherService extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'title', 'description', 'price', 'is_approved', 'type', 'freq_sess'
    ];
}