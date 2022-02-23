<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Room;
use App\Models\RoomFloor;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['room']       = Room::where('status', 1)->get();
        $data['roomfloors'] = RoomFloor::get();
        return view('backend.Admin.room.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::get();
        $data['roomfloors'] = RoomFloor::get();
        return view('backend.Admin.room.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id' => 'required',
            'bed' => 'required',
            'room_size' => 'required',
            'price' => 'required',
        ]);



        $data = new Room();
        $data->name         = $request->name;
        $data->room_no      = $request->room_no;
        $data->room_floor_id= $request->room_floor_id;
        $data->category_id  = $request->category_id;
        $data->bed          = $request->bed;
        $data->room_size    = $request->room_size;
        $data->bathroom     = $request->bathroom;
        $data->price        = $request->price;
        $data->description  = $request->description;
        $data->discount_price= $request->discount_price;
        $data->is_offer     = $request->is_offer;

        $image = $request->photo;
        if($image){
        // @unlink($blogs->image);
        $uniqname = uniqid();
        $ext = strtolower($image->getClientOriginalExtension());
        $filepath = 'public/images/room/';
        $imagename = $filepath.$uniqname.'.'.$ext;
        $image->move($filepath,$imagename);
        $data->photo = $imagename;
        }
        $data->save();

        $notification = array(
            'message' => 'Room Create Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Room $room)
    {
        if ($request->ajax()) {
            return $room;
        }

        return view('backend.Admin.room.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories'] = Category::get();
        $data['room'] = Room::find($id);
        $data['roomfloors'] = RoomFloor::get();
        return view('backend.Admin.room.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'bed' => 'required',
            'room_size' => 'required',
            'price' => 'required',
        ]);



        $data = Room::find($id);
        $data->name         = $request->name;
        $data->room_no      = $request->room_no;
        $data->room_floor_id= $request->room_floor_id;
        $data->category_id  = $request->category_id;
        $data->bed          = $request->bed;
        $data->room_size    = $request->room_size;
        $data->bathroom     = $request->bathroom;
        $data->price        = $request->price;
        $data->description  = $request->description;
        $data->discount_price= $request->discount_price;
        $data->is_offer     = $request->is_offer;

        $image = $request->photo;
        if($image){
        @unlink($data->photo);
        $uniqname = uniqid();
        $ext = strtolower($image->getClientOriginalExtension());
        $filepath = 'public/images/room/';
        $imagename = $filepath.$uniqname.'.'.$ext;
        $image->move($filepath,$imagename);
        $data->photo = $imagename;
        }
        $data->save();
        $notification = array(
            'message' => 'Room Update Successfully!',
            'alert-type' => 'success'
            );

            return redirect()->route('admin.room.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Room::find($id)->delete();


        $notification = array(
            'message' => 'Room Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.room.index')->with($notification);
    }
}
