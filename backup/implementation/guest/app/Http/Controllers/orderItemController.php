<?php

namespace App\Http\Controllers;
use App\orderItem;
use App\MenuItem;
use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class orderItemController extends Controller
{



  // view specific bookings orders
        public function index(Request $request)
    {
      $bookingId=$request->bookingId;
      $userName=DB::table('bookings')
                ->join('users','users.id','=','bookings.userId')
                ->select('bookings.*','users.userName')
                ->Where('bookings.id','=',$bookingId)
                ->get();
                foreach ($userName as $name) {
                  $uName=$name->userName;
                  $from=$name->time_from;
                  $to=$name->time_to;                }
          $orders = DB::table('orderItems')
                      ->join('menuItems','menuItems.id','=','orderItems.menuId')
                      ->select('orderItems.*','menuItems.*')
                      ->Where('orderItems.bookingId','=',$bookingId)
                      ->get();
                $total=0;
           foreach ($orders as $order) {
                    $total=$total+ $order->amount;
                  }
            if($orders->isEmpty())
            {
                $orders= null;
            }   
         
      return view('admin.orders', compact('orders','uName','total','from','to'));  
    }   



          // add new orders for specific booking
            public function create(Request $request)
    {
      $bookingId = DB::table('bookings')
                ->select('bookings.id')
                ->Where('bookings.userId','=',Auth::user()->id)
                ->Where('bookings.Status','=','CheckedIn')
                ->get();
            if($bookingId->isEmpty())
            {
            return redirect()->to('/MyBookings')->with('success','you are not checked in');
            }   

        else
        {
          foreach ($bookingId as $book) {
          $menuItem = DB::table('menuItems')
                      ->select('menuItems.*')
                      ->Where('menuItems.id','=',$request->id)
                      ->get();
           foreach ($menuItem as $menu) {
            $Item = new orderItem;

            $Item->menuId = $request->id;
            $Item->quantity =$request->quantity ;
            $Item->amount = $menu->unitCost * $request->quantity  ;
            $Item->bookingId = $book->id;

            $Item->save();

            return redirect('myorders')->with('success','item successfully ordred');
                      }
          }

        }
    }    




      // view user their orders
        public function viewOrders()
    {
      $bookingId = DB::table('bookings')
                ->select('bookings.id')
                ->Where('bookings.userId','=',Auth::user()->id)
                ->Where('bookings.Status','=','CheckedIn')
                ->get();
            if($bookingId->isEmpty())
            {
            return redirect()->to('/MyBookings')->with('success','you are not checked in');
            }   

          foreach ($bookingId as $book) {
          $orders = DB::table('orderItems')
                      ->join('menuItems','menuItems.id','=','orderItems.menuId')
                      ->select('orderItems.*','menuItems.*')
                      ->Where('orderItems.bookingId','=',$book->id)
                      ->get(); 
                      $total=0;
            if($orders->isEmpty())
            {
            $orders=null;
            } 
            else
            {
                foreach ($orders as $order) {
                    $total=$total+ $order->amount;
                }              
            }
            return view('system.orders', compact('orders','total'));
                    }
    }  

}
