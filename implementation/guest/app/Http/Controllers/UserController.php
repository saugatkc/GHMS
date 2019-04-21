<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Users;
use DB;

class UserController extends Controller
{

	// display all users to admin
        public function index()
    {
      $users = DB::table('users')
                ->select('users.*')
                ->where('users.userType','=','customer')
                ->get();
            if($users->isEmpty())
            {
                $users= null;
            } 
      return view('admin.Users', compact('users')); 

    }
}
