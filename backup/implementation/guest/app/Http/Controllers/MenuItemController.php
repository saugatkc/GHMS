<?php

namespace App\Http\Controllers;

use App\MenuItem;
use Illuminate\Http\Request;
use DB;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    // show all menu items to the user
    public function index()
    {
      $items = DB::table('menuitems')
                ->select('menuitems.*')
                ->get();
            if($items->isEmpty())
            {
                $items= null;
            } 
      return view('system.menu', compact('items')); 

    }


    // show all menu items to the admin
        public function adminMenu()
    {
      $items = DB::table('menuitems')
                ->select('menuitems.*')
                ->get();
            if($items->isEmpty())
            {
                $items= null;
            } 
      return view('admin.menuItems', compact('items')); 

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    // open add menu form
    public function create()
    {
        return view('admin.addMenuItem');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // add new item in the menu
    public function store(Request $request)
    {
        $item= new MenuItem;
        $item->items=$request->item;
        $item->unitCost=$request->unitCost;
        $item->itemType=$request->ItemType;
        $item->save();
        return redirect('adminMenu')->with('success','Item added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function show(MenuItem $menuItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */


    // update price of item in menu
    public function edit(Request $request, $id)
    {
        $price=$request->price;
        $Item = MenuItem::find($id);
        $Item->unitCost=$price;
        $Item->save();
        return redirect()->to('/adminMenu')->with('success','Item sucessfully updated');


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MenuItem $menuItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MenuItem  $menuItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                 $Item = MenuItem::find($id);
         $Item->delete();
         return redirect()->to('/adminMenu')->with('success','Item sucessfully removed');
    }
}
