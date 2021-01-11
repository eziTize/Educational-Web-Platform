<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\TraitsAttributes\ProfileExtraAttributes;

class ProfileExtra extends Model
{
    use ProfileExtraAttributes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 
        'travel_willingness',
        'average_price', 
        'dob', 
        'linkedin',
        'facebook',
        'insta',
        'twitter',
        'pinterest',
    ];
}
