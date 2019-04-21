<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class RoomController extends Controller
{

    protected $image_dir = "roomImage";


    public function store(Request $request)
    {
        $pictureInfo = $request->file('image');

        $picName = $pictureInfo->getClientOriginalName();

        $folder = "roomImage/";

        $pictureInfo->move('roomImage',$picName);

        $picUrl = $folder.$picName;
        if(Room::where('image', '=', $picUrl)->exists()) 
        {
            return redirect('/room')->with('itemNameExists','Please!!insert image with another name');
        }

        else
        {

            $Item = new Room;

            $Item->roomType = $request->roomType;
            $Item->image = $picUrl;
            $Item->price = $request->price;
            $Item->description = $request->description;
            $Item->status = $request->status;

            $Item->save();

            return redirect('roomDetails')->with('success','room added successfully');
        }
    }


    public function index()
    {
    	return view('admin.room');
    }

    //fetch data from rooms table
    public function showRooms()
    {
      $rooms = DB::table('rooms')->get()->toArray();
      return view('admin.roomsDetails', compact('rooms')); 
    }

    // delete a room
    public function destroy($roomNo)
    {
        $booking=DB::table('bookings')
        ->select('bookings.*')
        ->where('bookings.roomId','=',$roomNo)
        ->get();
                    if($booking->isEmpty())
                {

         $room = Room::find($roomNo);
         $image=$room->image;
         $room->delete();
         app('files')->delete($room->image);
         return redirect()->to('roomDetails')->with('success','Data Delete');
                 }
                 else{
              return redirect()->to('roomDetails')->with('success','This room cannot be Deleted due to link in booking');
                }
    }

// fetch and send data to edit
     public function edit($id)
    {
        $room = Room::find($id);
        if (!$room) {
            return redirect()->back();
        }
        return view('admin.roomEdit', [
            'room' => $room
        ]);

    }

    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        if ($request->hasFile('image')) {
            app('files')->delete($room->image);

             $pictureInfo = $request->file('image');

        $picName = $pictureInfo->getClientOriginalName();

        $folder = "roomImage/";

        $pictureInfo->move('roomImage',$picName);

        $picUrl = $folder.$picName;
        if(Room::where('image', '=', $picUrl)->exists()) 
        {
            return redirect('/room')->with('itemNameExists','Please!!insert image with another name');
        }

        else
        { 
            $room->image = $picUrl;
        }

        }

        $form_req = $request->all();

        $room->roomType = $form_req['roomType'];
        $room->price = $form_req['price'];
        /*Image*/
        $room->description = $form_req['description'];
        $room->status = $form_req['status'];
        $room->save();
        return redirect()->to('/roomDetails')->with('Success','room successfully updated');
    }




    public function search(Request $request)
    {
        $checkIn = $request->checkIn;
        $checkOut = $request->checkOut;
        $roomType=$request->roomType;
        $method = $request->method();
        if ($request->isMethod('post')) {
            $booked = DB::table('bookings')
            ->select('bookings.roomId')
            ->where('bookings.time_from','<=',$checkOut)
            ->Where('bookings.time_to','>=',$checkIn)
            ->groupBy('bookings.roomId')
            ->get();

            if(!$booked->isEmpty())
            {
                foreach ($booked as $book) {
                $data[]=$book->roomId;
                }

                $rooms=DB::table('rooms')
                ->select('rooms.*')
                ->Where('rooms.roomType','=',$roomType)
                ->whereNotIn('rooms.id',$data)
                ->get();
                if($rooms->isEmpty())
                {
                $rooms= null;
                return view('system.searchroom', compact('rooms', 'checkIn', 'checkOut'))->with('success','No available room');
                }  
            }

            else
            {
                $rooms=DB::table('rooms')
                ->select('rooms.*')
                ->Where('rooms.roomType','=',$roomType)
                ->get();
                if($rooms->isEmpty())
                {
                $rooms= null;
                return view('system.searchroom', compact('rooms', 'checkIn', 'checkOut'))->with('success','No available room');
                }  
            }


            
        } else {
            $rooms = null;
        }
        return view('system.searchroom', compact('rooms', 'checkIn', 'checkOut'));
    }
}

