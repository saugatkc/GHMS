<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Auth;

class BookingController extends Controller
{
    public function create()
    {
    	return view('system.reservation');
    }

    
    public function newBooking(Request $request)
    {
        $booking = new Booking;
        

            $booking->time_from = $request->checkIn;
            $booking->time_to = $request->checkOut;
            $booking->userId = Auth::user()->id;
            $booking->roomId = $request->roomNo;

            $booking->save();

            return redirect('roomDetails')->with('success','booking successfully');
    }

    

}
