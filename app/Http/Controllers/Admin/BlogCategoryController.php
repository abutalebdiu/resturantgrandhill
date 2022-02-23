<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\BlogCategory;
use Auth;

class BlogCategoryController extends Controller
{
    
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('en/login');
        }
    }

    
    public function index($locale)
    {
        $data['blogs_categories'] = BlogCategory::all();
        return view('backend.Admin.blog-category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('backend.Admin.blog-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($locale, Request $request)
    {
        $request->validate([
            "name" => "required",
            "name_ar" => "",
            "slug" => "required",
            
        ]);
        
        $data = new BlogCategory();
        $input = $request->except('_token');
        $data->fill($input)->save(); 

        $notification = array(
            'message' => 'Blog Category Create Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('blog-category.index')->with($notification);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        $data['categories'] = BlogCategory::find($id);
        return view('backend.Admin.blog-category.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($locale, Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "name_ar" => "",
            "slug" => "required",
            
        ]);
        
        $data = BlogCategory::find($id);
        $input = $request->except('_token');
        $data->fill($input)->save(); 

        $notification = array(
            'message' => 'Blog Category Update Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('blog-category.index')->with($notification);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {

        BlogCategory::find($id)->delete();
        $notification = array(
        'message' => 'Blog Category Delete Successfully!',
        'alert-type' => 'warning'
        );
        return redirect()->route('blog-category.index')->with($notification);
    }
}
