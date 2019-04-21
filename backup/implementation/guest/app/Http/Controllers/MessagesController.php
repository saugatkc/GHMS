<?php

namespace App\Http\Controllers;

use App\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use redirect;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // open contactus page
    public function index()
    {
        return view('system.contactus');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // add new message in the database
    public function store(Request $request)
    {
        $data= new Messages;
        $data->senderName=$request->name;
        $data->email=$request->email;
        $data->message=$request->message;
        $data->status="unread";
        $data->save();
        return redirect('contactUs')->with('success','message sucesfully sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */

    // show unread messages to the admin
    public function show()
    {
        $messages=DB::table('messages')
                ->select('messages.*')
                ->where('messages.status','=',"unread")
                ->get();
                if($messages->isEmpty())
            {
                $messages= null;
            }  
                return view('admin.newmessages',compact('messages'));
    }

    // show read messages to admin
        public function showOld()
    {
        $messages=DB::table('messages')
                ->select('messages.*')
                ->where('messages.status','=',"read")
                ->get();
                if($messages->isEmpty())
            {
                $messages= null;
            }  
                return view('admin.oldMessage',compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */

    // change message status to read
    public function edit($id)
    {
        $mes=Messages::find($id);
        $mes->status="read";
        $mes->save();
        return redirect('newMessages')->with('success','message marked read');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mes = Messages::find($id);
         $mes->delete();
         return redirect()->to('/newMessages')->with('success','Message deleted');
    }
}
