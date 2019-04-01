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


    public function search()
    {
            return view('system.searchroom');
     
    }

    public function found(Request $request)
    {
            $time_from = $request->checkIn;
            $time_to = $request->checkOut;
            $roomType=$request->roomType
            $rooms = DB::select('select * from rooms where id not in (select roomId from bookings where time_from >= {{ $time_from }} OR time_to <= {{ $time_to group by roomId}}) ')
        return view('system.avilabelRooms', compact('rooms', 'time_from', 'time_to'));
    }
}

