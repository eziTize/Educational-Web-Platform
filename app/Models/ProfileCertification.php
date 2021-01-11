<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfileCertification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "profile_certificates";
    protected $fillable = [
        'user_id', 'certificate'
    ];
}
