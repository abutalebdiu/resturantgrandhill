<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Auth;

class BlogController extends Controller
{
   
   
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('en/login');
        }
    }
   
   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($locale)
    {

        $data['blogs'] = Blog::all();
        return view('backend.Admin.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($locale)
    {
        $data['blog_categories'] = BlogCategory::all();

        return view('backend.Admin.blog.create',$data);
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
           "title" => "required",
           "image" => "required",
           "slug" => "required",
           "category_id" => "required",
           "description" => "required",
       ]);

 

        $data = New Blog();
        $input = $request->except('_token');
        
        $image = $request->image;
        if($image){
            $uniqname = uniqid();
            $ext = strtolower($image->getClientOriginalExtension());
            $filepath = 'images/blogs/';
            $imagename = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
             
            $input['image'] = $imagename;
        }

        $input['publish_date'] =  Date('Y-m-d');
        $input['is_admin'] = Auth::user()->id;


    

        $data->fill($input)->save();

 

        $notification = array(
            'message' => 'Blog Create Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin-blog.index')->with($notification);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale, $id)
    {
        $data['blogs'] = Blog::find($id);
        $data['blog_categories'] = BlogCategory::all();
        return view('backend.Admin.blog.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, $id)
    {
        $data['blog_categories'] = BlogCategory::all();
        $data['blogs'] =Blog::find($id);
        return view('backend.Admin.blog.edit',$data);
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
            "title" => "required",

            "slug" => "required",
            "category_id" => "required",
            "description" => "required",
        ]);
 
  
 
         $data = Blog::find($id);
         $input  = $request->except('_token');
         
         $image = $request->image;
         if($image){
             @unlink($data->image);
             $uniqname = uniqid();
             $ext = strtolower($image->getClientOriginalExtension());
             $filepath = 'images/blogs/';
             $imagename = $filepath.$uniqname.'.'.$ext;
             $image->move($filepath,$imagename);
              
             $input['image'] = $imagename;
         }
 
         $input['publish_date'] =  Date('Y-m-d');
         $input['is_admin'] = Auth::user()->id;
 
 
     
 
         $data->fill($input)->save();
 
  
 
         $notification = array(
             'message' => 'Blog Update Successfully!',
             'alert-type' => 'success'
         );
         return redirect()->route('admin-blog.index')->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, $id)
    {
        Blog::find($id)->delete();
        $notification = array(
        'message' => 'Blog  Delete Successfully!',
        'alert-type' => 'success'
        );
        return redirect()->route('admin-blog.index')->with($notification);
    }
}
