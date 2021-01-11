<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingSlots extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "booking_slots";
    protected $fillable = [
        'coach_id', 
        'bookingtime', 
        'bookingdate',
        'b_id'
    ];
}