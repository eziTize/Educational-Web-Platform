<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "booking";
    protected $fillable = [
        'student_id', 
        'coach_id', 
        'subject_id', 
        'subject_name', 
        'bookingtime', 
        'bookingdate', 
        'bookinghrs', 
        'price', 
        'txn_id', 
        'joined', 
        'session_id', 
        'payment',
        'type',
        'bookingend'
    ];
}