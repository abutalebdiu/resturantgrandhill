<?php

namespace App\Http\Controllers\Admin;

use App\Models\Food;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['foods'] = Food::get();
        return view('backend.Admin.food.index', $data);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['food_categories'] = FoodCategory::get();
        return view('backend.Admin.food.create', $data);
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
            'price' => 'required',
            'food_category_id' => 'required',
            'vat' => 'nullable',
        ]);

        $imagename = '';
        $image = $request->image;
        if ($image) {
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'uploads/food/';
            $imagename = $filepath . $uniqname . '.' . $ext;
            $image->move($filepath, $imagename);
        }
        foreach ($request['food_category_id'] as $catid) {
            Food::create([
                'name' => $request['name'],
                'image' => $imagename,
                'price' => $request['price'],
                'vat' => $request['vat'],
                'food_category_id' => $catid,
            ]);
        }

        $notification = array(
            'message' => 'Food Add Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.food.index')->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show($food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $data['foods'] = Food::find($id);
        $data['food_categories'] = FoodCategory::get();
        return view('backend.Admin.food.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'food_category_id' => 'required',


        ]);


        $data = FoodCategory::find($id);
        $data = Food::find($id);
        $input = $request->except('_token', 'image');

        $image = $request->image;
        if ($image) {

            @unlink($data->image);
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'uploads/food/';
            $imagename = $filepath . $uniqname . '.' . $ext;
            $image->move($filepath, $imagename);

            $input['image'] = $imagename;
        }
        $data->fill($input)->save();

        $notification = array(
            'message' => 'Food Category Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.food.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image_name = Food::find($id);
        if ($image_name->image && File::exists(asset('uploads/food/' . $image_name->image))) {
            unlink(public_path($image_name->image));
        }
        Food::find($id)->delete();

        $notification = array(
            'message' => 'Food Delete Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
