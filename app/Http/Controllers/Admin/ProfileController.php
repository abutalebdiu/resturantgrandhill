<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Validator;

class ProfileController extends Controller
{
     
    public function __construct()
    {
        if(!Auth::check()){
            return redirect('en/login');
        }
    }

    public function index()
    {
        $data['profile'] = User::find(Auth::user()->id);
        return view('backend.Admin.profile.profile',$data);
    }

     
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

     
    public function show($id)
    {
        //
    }

    
    public function edit()
    {
        $data['profile'] = User::find(Auth::user()->id);
       return view('backend.Admin.profile.edit',$data);
    }

     
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'mobile' => 'required|unique:users,mobile,'.Auth::user()->id,
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $admin = User::find(Auth::user()->id);

            $admin->username   = $request->username;
            $admin->first_name = $request->first_name;
            $admin->last_name  = $request->last_name;
            $admin->email      = $request->email;
            $admin->mobile     = $request->mobile;
             
            $image = $request->image;


            if($image){
                $uniqname   = uniqid();
                $ext        = strtolower($image->getClientOriginalExtension());
                $filepath   = 'uploads/';
                $imagename  = $filepath.$uniqname.'.'.$ext;
                $image->move($filepath,$imagename);
                $admin->image= $imagename; 
            }

            $admin->save();


            $notification = array(
                'message' => 'Profile Update Successfully!',
                'alert-type' => 'success'
            );

            return redirect()->route('admin.user.profile')->with($notification);
        }

    }
     
    public function destroy($id)
    {
        //
    }


    public function setting()
    {
        return view('backend.Admin.profile.setting');
    }

 

    public function changepassword(Request $request)
    {
        $this->validate($request,[
            'current_password'  => 'required',
            'new_password'      => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'min:6'
        ]);
        if(Auth::attempt(['id' => Auth::user()->id, 'password' => $request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            $notification = array(
            'message' => 'Successfully password changed.',
            'alert-type' => 'success'
             );
            return redirect()->route('admin.user.setting')->with($notification);
        }else{
            $notification = array(
            'message' => 'Sorry! Your current password dost not match.',
            'alert-type' => 'error'
             );
            return redirect()->back()->with($notification);
        }
    }


    
   
}
