<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Models\User;
use App\Models\Language;
use App\Models\Country;
use App\Models\District;
use App\Models\Artist\ArtistParsonalInformation;
use App\Models\Artist\ArtistModelCategory;
use App\Models\Artist\Artist_experience;
use App\Models\Agency\AgencyCatagory;
use App\Models\Vendor\VendorRegistation;
use DB;

class AuthController extends Controller
{
   


    /* ============ for all user login =============================*/
    public function login($locale=null)
    {
        return view('frontend.pages.login');
    }


    /* ============End for all user login =============================*/





    public function userlogin( Request $request)
    {

        $input = $request->all();

         $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        else{

            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
            if(auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password'])))
            {
                    if(Auth::user()->status!=1)
                    {
                        $notification = array(
                            'message' => 'Your account Not verified! Please Contact Admin',
                            'alert-type' => 'error'
                        );

                        Auth::logout();
                        return redirect()->route('login')->with($notification); 

                    }
                    else{

                                  $user = Auth::user();

                                    if($user->role_id == 1){
                                        return redirect()->route('admin.dashboard');
                                    }else if($user->role_id == 2){
                                        return redirect()->route('admin.dashboard');
                                    }else if($user->role_id == 3){
                                        return redirect()->route('agency.dashboard');
                                    }
                                    else if($user->role_id == 4){
                                       return redirect()->route('artist.dashboard');
                                    }else if($user->role_id == 5){
                                        return redirect()->route('user.dashboard');
                                    }else if($user->role_id == 6){
                                        return redirect()->route('vendor.dashboard');
                                    }else{
                                        return "/error";
                                    }

                        
                    }

            }
            else{

                $notification = array(
                    'message' => 'Password Donot Match!',
                    'alert-type' => 'error'
                );

                return redirect()->route('login')->with($notification);
                   
            }
     
        }
 

    }


    /* ============End for all user login Auth =============================*/


    public function forgotpassword()
    {
        
        
        
        return view('auth.passwords.email');
    }












    public function user_registration()
    {
        return view('frontend.registrations.registation');
    }




    public function registration_store(Request $request){

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile'=>'required|numeric|unique:users',
            'password'      => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation'=>'required|min:6'
            
        ]);


        $data = new User();
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->password = bcrypt($request->password);
        $data->status = 1;  
        $data->role_id = 5;  


        $image = $request->image;
        if($image){
            $uniqname   = uniqid();
            $ext        = strtolower($image->getClientOriginalExtension());
            $filepath   = 'uploads/';
            $imagename  = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $data->image= $imagename; 
        }


        $data->save();  


        $notification = array(
            'message' => 'Registration Successfully Complete!',
            'alert-type' => 'success'
        );

        return redirect()->route('registration')->with($notification);


    }





    public function artist_registration()
    {

        $data['languages'] = Language::all();
        $data['countries'] = Country::all();

        return view('frontend.registrations.artist-registration',$data);
    }




    public function artist_registration_post(Request $request){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile'=>'required|numeric|unique:users',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
            'talent' => 'required|array|max:2',
            'talent.*' => 'required|max:2',
            'gender' => 'required',
            'language_id' => 'required|numeric',
            'country_id' => 'required|numeric',
            'birthday' => 'required',
            'address' => 'required',
            
        ],
        [
            'talent.required' => 'Maximum 2 Talent Categories must be Checked',
        ]);
        
        $input = $request->all();

        DB::beginTransaction();

        try{
        
        $user = new User();
        $user->username     = $request->username;
        $user->first_name   = $request->first_name;
        $user->last_name    = $request->last_name;
        $user->mobile       = $request->mobile;
        $user->password     =  bcrypt($request->password);
        $user->email        = $request->email;
        $user->role_id      = 4; 
        $user->status       = 1; 

        $image = $request->image;
        if($image){
            $uniqname   = uniqid();
            $ext        = strtolower($image->getClientOriginalExtension());
            $filepath   = 'uploads/';
            $imagename  = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $user->image= $imagename; 
        }

        $user->save();

          
        $parsonal_info = new ArtistParsonalInformation();
        $parsonal_info->user_id     = $user->id;
        $parsonal_info->language_id = $request->language_id;
        $parsonal_info->country_id  = $request->country_id;
        $parsonal_info->birthday    = $request->birthday;
        $parsonal_info->address     = $request->address;
        $parsonal_info->gender      = $request->gender;
        $parsonal_info->save();


    
    
         
        foreach($input['talent'] as $key => $value){
            $Artist_category = new ArtistModelCategory();
            $Artist_category->user_id = $user->id;
            $Artist_category->category_id = $input['talent'][$key];
            $Artist_category->save(); 
        }
        
        
        


        if(!empty($input['to_be_continue'])){
            if($input['to_be_continue'] != ''){

                foreach($input['to_be_continue'] as $key => $value){

                    $experience = new Artist_experience();

                    $experience->user_id = $user->id;
                    $experience->designation  = $input['designation'][$key];
                    $experience->experience  = $input['experience'][$key];
                    $experience->to_be_continue  = $input['to_be_continue'][$key];
                    $experience->company_name  = $input['company_name'][$key];
                    $experience->save();
                }
             }
        }

 

        DB::commit();
        $notification = array(
            'message' => 'Artist Registation Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->route('artist.registration')->with($notification);  
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }




    }


    public function agencyRegistration(){

        $data['countries'] = Country::all();
        return view('frontend.registrations.agency-registation',$data);
    }

    public function agency_registration_post($locale, Request $request){
        
        
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:users',
            'first_name' => 'required',
            'address' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'country_id' => 'required|numeric',
            'mobile'=>'required|numeric|unique:users',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required',
            'website_url' => 'required',
            'about' => 'required',
            'image' => 'required',
            'talent' => 'required|array|max:2',
            'talent.*' => 'required|max:2',
        ],
        [
            'talent.required' => 'Maximum 2 Talent Categories must be Checked',
        ]);
        
        
        $input = $request->all();

        DB::beginTransaction();

        try{
        
        $user = new User();
        $user->username     = $request->username;
        $user->first_name   = $request->first_name;
        $user->name    = $request->name;
        $user->mobile       = $request->mobile;
        $user->password     =  bcrypt($request->password);
        $user->email        = $request->email;
        $user->role_id      = 3; 
        $user->status       = 1;

        $image = $request->image;
        if($image){
            $uniqname   = uniqid();
            $ext        = strtolower($image->getClientOriginalExtension());
            $filepath   = 'uploads/';
            $imagename  = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $user->image= $imagename; 
        }
        
        $user->save();

          
        $parsonal_info = new ArtistParsonalInformation();
        $parsonal_info->user_id     = $user->id;
        $parsonal_info->country_id  = $request->country_id;
        $parsonal_info->address     = $request->address;
        $parsonal_info->about     = $request->about;
        $parsonal_info->website_url     = $request->website_url;
        $parsonal_info->save();



        foreach($input['talent'] as $key => $value){

            $Artist_category = new AgencyCatagory();
            $Artist_category->user_id = $user->id;
            $Artist_category->category_id = $input['talent'][$key];
            $Artist_category->save(); 
        }


 

        DB::commit();
        $notification = array(
            'message' => 'Agency Registation Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->route('agency.registration')->with($notification);  
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }



    }

    public function vendorRegistration($locale){

        $data['countries'] = Country::all();
        $data['district'] = District::all();
        return view('frontend.registrations.vendor-registation',$data);
    }

    public function vendor_registration_post($locale, Request $request){
        $request->validate([
                'username' => 'required|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'mobile'=>'required|unique:users',
                'password' => 'min:6|required_with:confirm_password|same:confirm_password',
                'confirm_password' => 'required',
                'image' => 'required',
                'name' => 'required',
                'address' => 'required',
                'liceance' => 'required',
                'established' => 'required',
                'country_id' => 'required|numeric',
                'district_id' => 'required|numeric',
                'about' => 'required',
                
        ]);
            
            
        DB::beginTransaction();
        try{
        $user = new User();
        $user->username     = $request->username;
        $user->name     = $request->name;
        $user->name_ar     = $request->name_ar;
        $user->mobile       = $request->mobile;
        $user->password     =  bcrypt($request->password);
        $user->email        = $request->email;
        $user->role_id      = 6; 
        $user->status       = 1;

        $image = $request->image;
        if($image){
            $uniqname   = uniqid();
            $ext        = strtolower($image->getClientOriginalExtension());
            $filepath   = 'uploads/';
            $imagename  = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $user->image= $imagename; 
        }
        $user->save();
       
       
        $data = new VendorRegistation();
        $data->address= $request->address;

        $image = $request->liceance;
        if($image){
            $uniqname   = uniqid();
            $ext        = strtolower($image->getClientOriginalExtension());
            $filepath   = 'uploads/';
            $imagename  = $filepath.$uniqname.'.'.$ext;
            $image->move($filepath,$imagename);
            $data->liceance= $imagename; 
        }

        $data->country_id= $request->country_id;
        $data->district_id= $request->district_id;
        $data->established= $request->established;
        $data->about= $request->about;
        $data->user_id = $user->id;
        $data->save();

        DB::commit();
        $notification = array(
            'message' => 'Vendor Registation Successfully !',
            'alert-type' => 'success'
        );
        return redirect()->route('vendor.registration')->with($notification);  
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }






}
