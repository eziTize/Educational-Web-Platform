<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentSchedule extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id', 'start_time', 'end_time', 'title','status'
    ];
}
