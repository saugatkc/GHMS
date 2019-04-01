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
         $room = Room::find($roomNo);
         app('files')->delete($room->image);
         $room->delete();
         return redirect()->to('roomDetails')->with('success','Data Delete');
    }

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


    // public function search(Request $request)
    // {
    //     $method = $request->method();
    //     if ($request->isMethod('post')) {
    //         $time_from = $request->checkIn;
    //         $time_to = $request->checkOut;
    //         $roomType=$request->roomType
    //         $rooms = Room::with('booking')->whereHas('booking', function ($q) use ($time_from, $time_to) {
    //             $q->where(function ($q2) use ($time_from, $time_to) {
    //                 $q2->where('time_from', '>=', $time_to)
    //                    ->orWhere('time_to', '<=', $time_from);
    //             });
    //         })->orWhereDoesntHave('booking')->get();
    //     } else {
    //         $rooms = null;
    //     }
    //     return view('system.searchroom', compact('rooms', 'time_from', 'time_to'));
    // }


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
                ->whereNotIn('rooms.id',$data)
                ->get();
            }

            else
            {
                $rooms=DB::table('rooms')
                ->select('rooms.*')
                ->get();
            }


            
        } else {
            $rooms = null;
        }
        return view('system.searchroom', compact('rooms', 'checkIn', 'checkOut'));
    }
}

