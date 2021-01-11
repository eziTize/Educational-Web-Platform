<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileHobbies extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'user_id', 'is_approved'
    ];
}
