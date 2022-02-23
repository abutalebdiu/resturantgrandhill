<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data['food_categories'] = FoodCategory::get();
         return view('backend.Admin.food-category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.Admin.food-category.create');
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
            'name' => 'required',
            'image' => 'required',
        ]);


        $data = new FoodCategory();
        $input = $request->except('_token','image');

         $image = $request->image;
            if($image){
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'uploads/foodcategory/';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                 
                $input['image'] = $imagename;
            }
             $data->fill($input)->save();
       
        $notification = array(
            'message' => 'Food Category Create Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.food-category.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function show(FoodCategory $foodCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
   

     public function edit($id)
    {
        $data['food_category'] = FoodCategory::find($id);
        return view('backend.Admin.food-category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name' => 'required',
           
        ]);


        $data = FoodCategory::find($id);
        $input = $request->except('_token','image');

         $image = $request->image;
            if($image){

                @unlink($data->image);
                $uniqname = uniqid();
                $ext = strtolower($image->getClientOriginalExtension());
                $filepath = 'uploads/foodcategory/';
                $imagename = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                 
                $input['image'] = $imagename;
            }
             $data->fill($input)->save();
       
        $notification = array(
            'message' => 'Food Category Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.food-category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoodCategory  $foodCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {

        $image_name = FoodCategory::find($id);
        if($image_name->image) {
        unlink(public_path($image_name->image));
        }
        FoodCategory::find($id)->delete();

        $notification = array(
        'message' => 'Food Category Delete Successfully!',
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
