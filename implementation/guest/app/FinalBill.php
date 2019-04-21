<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FinalBill extends Model
{
                protected $table = "FinalBills";

    protected $fillable = ['id', 'bookingId', 'noOfNights','roomTotal', 'orderTotal', 'grandTotal'];
}
