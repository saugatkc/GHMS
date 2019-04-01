<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    

     protected $table = "bookings";

    protected $fillable = ['time_from', 'time_to', 'userId', 'roomId'];



}


