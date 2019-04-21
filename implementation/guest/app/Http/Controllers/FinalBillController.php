<?php

namespace App\Http\Controllers;

use App\FinalBill;
use App\Booking;
use Illuminate\Http\Request;
use DB;
use redirect;

class FinalBillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bill');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bookingId=$request->bookingId;
        $grandTotal=0;
        $total=0;
                  $orders = DB::table('orderItems')
                      ->join('menuItems','menuItems.id','=','orderItems.menuId')
                      ->select('orderItems.*','menuItems.*')
                      ->Where('orderItems.bookingId','=',$bookingId)
                      ->get(); 
            if(!$orders->isEmpty())
            {
            foreach ($orders as $order) {
                $total=$total + $order->amount;
            }
            } 
            else
            {
                $orders=null;
            }

            $booking=DB::table('bookings')
                    ->join('users','users.id','=','bookings.userId')
                    ->join('rooms','rooms.id','=','bookings.roomId')
                    ->select('bookings.*','users.name','rooms.price','rooms.id as roomNo')
                    ->Where('bookings.id','=',$bookingId)
                    ->get();
                    $roomprice=1;
            foreach ($booking as $book) {
                $roomprice=$request->noOfNights * $book->price;
            }

            $grandTotal=$total + $roomprice;

        
        $bill= new FinalBill;
        $bill->bookingId=$bookingId;
        $bill->noOfNights=$request->noOfNights;
        $bill->roomTotal=$roomprice;
        $bill->orderTotal=$total;
        $bill->grandTotal=$grandTotal;
        $bill->save();

        $Status=Booking::find($bookingId);
        $Status->Status="CheckedOut";
        $Status->save();

        $new=DB::table('finalbills')
            ->select('finalbills.*')
            ->Where('finalbills.bookingId','=',$bookingId)
            ->get();

            foreach ($new as $value) {
                $date=$value->created_at;
                $invoice=$value->id;
            }

        return view('admin.bill', compact('orders','total','booking','roomprice','grandTotal','date','invoice'));


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FinalBill  $finalBill
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         $bookingId=$request->bookingId;
        $grandTotal=0;
        $total=0;
                  $orders = DB::table('orderItems')
                      ->join('menuItems','menuItems.id','=','orderItems.menuId')
                      ->select('orderItems.*','menuItems.*')
                      ->Where('orderItems.bookingId','=',$bookingId)
                      ->get(); 
            if($orders->isEmpty())
            {
                $orders=null;
            } 


            $booking=DB::table('bookings')
                    ->join('users','users.id','=','bookings.userId')
                    ->join('rooms','rooms.id','=','bookings.roomId')
                    ->select('bookings.*','users.name','rooms.price','rooms.id as roomNo')
                    ->Where('bookings.id','=',$bookingId)
                    ->get();
                    $roomprice=1;

                        $bills=DB::table('finalbills')
                    ->select('finalbills.*')
                    ->Where('finalbills.bookingId','=',$bookingId)
                    ->get();

                    foreach ($bills as $bill) {
                        $total=$bill->orderTotal;
                        $roomprice=$bill->roomTotal;
                        $grandTotal=$bill->grandTotal;
                        $invoice=$bill->id;
                        $date=$bill->created_at;

                    }

        

        return view('system.bill', compact('orders','total','booking','roomprice','grandTotal','invoice','date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FinalBill  $finalBill
     * @return \Illuminate\Http\Response
     */
    public function edit(FinalBill $finalBill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FinalBill  $finalBill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FinalBill $finalBill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FinalBill  $finalBill
     * @return \Illuminate\Http\Response
     */
    public function destroy(FinalBill $finalBill)
    {
        //
    }

  // show admin bill of checked out booking
        public function showAdmin(Request $request)
    {
         $bookingId=$request->bookingId;
        $grandTotal=0;
        $total=0;
                  $orders = DB::table('orderItems')
                      ->join('menuItems','menuItems.id','=','orderItems.menuId')
                      ->select('orderItems.*','menuItems.*')
                      ->Where('orderItems.bookingId','=',$bookingId)
                      ->get(); 
            if($orders->isEmpty())
            {
                $orders=null;
            } 


            $booking=DB::table('bookings')
                    ->join('users','users.id','=','bookings.userId')
                    ->join('rooms','rooms.id','=','bookings.roomId')
                    ->select('bookings.*','users.name','rooms.price','rooms.id as roomNo')
                    ->Where('bookings.id','=',$bookingId)
                    ->get();
                    $roomprice=1;

                        $bills=DB::table('finalbills')
                    ->select('finalbills.*')
                    ->Where('finalbills.bookingId','=',$bookingId)
                    ->get();

                    foreach ($bills as $bill) {
                        $total=$bill->orderTotal;
                        $roomprice=$bill->roomTotal;
                        $grandTotal=$bill->grandTotal;
                        $invoice=$bill->id;
                        $date=$bill->created_at;

                    }

        

        return view('admin.bill', compact('orders','total','booking','roomprice','grandTotal','invoice','date'));
    }
}
