<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subscribe;
use App\Models\Artist\ArtistModelCategory;
use App\Models\Artist\ArtistParsonalInformation;
use App\Models\Artist\Artist_experience;
use Auth;



class UserController extends Controller
{
    
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('en/login');
        }
    }
    
    
    public function admin()
    {

        $data['users'] = User::where('role_id',1)->where('status',1)->get();
        return view('backend.Admin.users.admin',$data);
    }

    public function adminCreate(){
        return view('backend.Admin.users.create');
    }

    public function adminCreatePost(Request $request){

      
        $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
        ]);

        $data = new User();
        $input = $request->except('_token');
        $input['password'] = bcrypt($request->new_password);
        $data->fill($input)->save();

        $notification = array(
            'message' => 'Admin Create Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.admin')->with($notification);
    }

    public function adminDelete(Request $request, $id){
        User::find($id)->delete();
        $notification = array(
            'message' => 'Admin Delete successfully',
            'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
    }



    /* =========================================================== Admin End  =============================================*/

    public function agency()
    {

        $data['users'] = User::where('role_id',3)->get();
        return view('backend.Admin.users.agency',$data);
    }

    public function agencyshow($locale,Request $request)
    {
        $user_id  = $request->user_id;
         
        $data['profile'] = User::find($user_id);
        $data['personalinfo'] = ArtistParsonalInformation::where('user_id',$user_id )->first();
        
        
        return view('backend.Admin.users.agencyshow',$data);
    } 
















    /* =========================================================== Agency End  =============================================*/


    public function artists()
    {
        $data['users'] = User::where('role_id',4)->whereIn('status', array(1,2))->get();
        return view('backend.Admin.users.artists',$data);
    }


    


    public function artistsshow($locale,Request $request)
    {
        $user_id  = $request->user_id;
         
        $data['profile'] = User::find($user_id);
        $data['personalinfo'] = ArtistParsonalInformation::where('user_id',$user_id )->first();
        $data['experienses'] = Artist_experience::where('user_id',$user_id)->get();
 

        return view('backend.Admin.users.artistsshow',$data);
    }

    public function artistssDelete($locale, $id) {
        $data = User::find($id);
        $data->status = 0;
        $data->save();
        $notification = array(
            'message' => 'Artist Delete successfully',
            'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
    }

    public function artistssActive($locale, $id) {
        $data = User::find($id);
        $data->status = 2;
        $data->save();
        $notification = array(
            'message' => 'Artist Active successfully',
            'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
    }

    public function artistssPanding($locale, $id) {
        $data = User::find($id);
        $data->status = 1;
        $data->save();
        $notification = array(
            'message' => 'Artist Panding successfully',
            'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
    }




     /* =========================================================== Artist End  =============================================*/



    public function users()
    {
        $data['users'] = User::where('role_id',5)->get();
        return view('backend.Admin.users.users',$data);
    }


    public function adminSubscribe(){
        $data['subscribe'] = Subscribe::where('status',1)->get();
        return view('backend.Admin.subscribe.index',$data);
    }










}
