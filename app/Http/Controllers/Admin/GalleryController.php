<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['gallery'] = Gallery::get();
        return view('backend.Admin.gallery.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Admin.gallery.create');
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
            'image' => 'required:image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = new Gallery();
        $image = $request->image;
        if($image){
        // @unlink($blogs->image);
        $uniqname = uniqid();
        $ext = strtolower($image->getClientOriginalExtension());
        $filepath = 'public/images/Gallery/';
        $imagename = $filepath.$uniqname.'.'.$ext;
        $image->move($filepath,$imagename);
        $data->image = $imagename;

        $data->save();
        $notification = array(
            'message' => 'Gallery Create Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gallery::find($id)->delete();
        $notification = array(
        'message' => 'Gallery Delete Successfully!',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
