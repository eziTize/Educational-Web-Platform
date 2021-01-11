<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentProf extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['students_profile'];
}

public function user()
{
  return $this->belongsTo(User::class);
}