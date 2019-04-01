<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = "rooms";

   	    protected $fillable = ['roomType', 'price',
        'image', 'description', 'status'
    	];

    	public function booking()
    {
        return $this->HasOne(Booking::class, 'roomId')->withTrashed();
    }
}
