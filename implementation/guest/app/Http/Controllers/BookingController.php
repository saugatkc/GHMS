<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use redirect;
use Auth;

class BookingController extends Controller
{


    // Add new booking
    public function newBooking(Request $request)
    {
        $Booked=DB::table('bookings')
        ->select('bookings.*')
        ->Where('bookings.Status','=',"Booked")
        ->Where('bookings.userId','=',Auth::user()->id)
        ->get();

        $checkedIn=DB::table('bookings')
        ->select('bookings.*')
        ->Where('bookings.Status','=',"CheckedIn")
        ->Where('bookings.userId','=',Auth::user()->id)
        ->get();

        if($checkedIn->isEmpty())
            {
            if($Booked->isEmpty())
                {
                 $booking = new Booking;
                 $booking->time_from = $request->checkIn;
                 $booking->time_to = $request->checkOut;
                 $booking->userId = Auth::user()->id;
                 $booking->roomId = $request->roomNo;
                 $booking->Status="Booked";

                 $booking->save();

                return redirect()->to('/MyBookings')->with('success','booking successfully');
                } 
            else{
              return redirect()->to('/MyBookings')->with('success','you are already booked'); 
                }
            }
            else{
              return redirect()->to('/MyBookings')->with('success','you are already CheckedIn'); 
             }
           
    }


    // fetch an users booking data
    public function searchUser()
    {
      $booking = DB::table('bookings')
                ->select('bookings.*')
                ->Where('bookings.userId','=',Auth::user()->id)
                ->Where('bookings.Status','=',"Booked")
                ->get();
      $OldBooking= DB::table('bookings')
                ->select('bookings.*')
                ->Where('bookings.userId','=',Auth::user()->id)
                ->Where('bookings.Status','=',"CheckedOut")
                ->get();
      $staying= DB::table('bookings')
                ->select('bookings.*')
                ->Where('bookings.userId','=',Auth::user()->id)
                ->Where('bookings.Status','=',"CheckedIn")
                ->get();
            if($booking->isEmpty())
            {
                $booking= null;
            }   
            if($OldBooking->isEmpty())
            {
                $OldBooking= null;
            }  
            if($staying->isEmpty())
            {
                $staying= null;
            }         
      return view('system.mystays', compact('booking','OldBooking','staying'));         

    }

    // booking cancelation
    public function destroy($id)
    {
         $booking = Booking::find($id);
         $booking->delete();
         return redirect()->to('/MyBookings')->with('success','booking Canceled');
    }    

    // show all curently staying guests
    public function CurentlyStaying()
    {
      $booking = DB::table('bookings')
                ->join('users','users.id','=','bookings.userId')
                ->select('bookings.*','users.userName')
                ->Where('bookings.Status','=',"CheckedIn")
                ->get();
            if($booking->isEmpty())
            {
                $booking= null;
            }   
         
      return view('admin.stayingGuest', compact('booking'));         

    }
// show admin all curently booked data
    public function CurentlyBooked()
    {
      $booking = DB::table('bookings')
                ->join('users','users.id','=','bookings.userId')
                ->select('bookings.*','users.userName')
                ->Where('bookings.Status','=',"Booked")
                ->get();
            if($booking->isEmpty())
            {
                $booking= null;
            }   
         
      return view('admin.bookings', compact('booking'));         

    }
// check in an guest
        public function checkIn($id)
    {
         $booking = Booking::find($id);
         $booking->Status="CheckedIn";
         $booking->save();
         return redirect()->to('/stayingGuest')->with('success','Guest Checked In');
    }  

    // booking cancel by admin
    public function admindestroy($id)
    {
         $booking = Booking::find($id);
         $booking->delete();
         return redirect()->to('/curentlyBooked')->with('success','booking Canceled');
    }  

    // show admin all curently booked data
    public function CheckedOut()
    {
      $booking = DB::table('bookings')
                ->join('users','users.id','=','bookings.userId')
                ->select('bookings.*','users.userName')
                ->Where('bookings.Status','=',"CheckedOut")
                ->get();
            if($booking->isEmpty())
            {
                $booking= null;
            }   
         
      return view('admin.oldBookings', compact('booking'));         

    }

}
