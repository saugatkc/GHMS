<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class orderItem extends Model
{
        protected $table = "OrderItems";

    protected $fillable = ['items', 'quantity', 'amount', 'bookingId'];
}
