<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\District;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Country;
use App\Models\Gender;
use App\Models\booking;
use App\Models\Religion;
use App\Models\UsersSubscribe;
use App\Models\Admin\Room;
use App\Models\Admin\Gallery;
use Carbon\Carbon;
use App\Models\Admin\Category;
use DB;
use Validator;
use Auth;
use App\Models\Website\Slider;

class FrontendController extends Controller
{
    public function index(){
        
        $data['categories'] = Category::all();
        $data['rooms'] = Room::where('status',1)->get();
        $data['sliders'] = Slider::where('status',1)->get();
        
        
        return view('frontend.pages.index',$data);
    }


    public function search(Request $request)
    {
        $query      = Room::query();
        $newquery   = Room::query();

        if($request->category_id)
        {
            $query->where('category_id',$request->category_id);
            $newquery->whereNotIn('category_id',[$request->category_id]);
        }
        else{

            $query->where('category_id',1);
            $newquery->whereNotIn('category_id',[0]); 
        }


        $data['rooms'] = $query->get();
        $data['newsrooms'] = $newquery->get();

        $data['categories'] = Category::all();

        return view('frontend.pages.search',$data);
    }


    public function about(){
        return view('frontend.pages.about');
    }


    public function room(){
        $data['categories'] = Category::all();
        $data['rooms'] = Room::where('status', 1)->get();
        $data['room_offer'] = Room::where('is_offer',1)->where('status',1)->get();
        return view('frontend.pages.room',$data);
    }


    public function gallery(){
        $data['galleries'] = Gallery::get();
        return view('frontend.pages.gallery',$data);
    }


    public function offer(){

        $data['room_offer'] = Room::where('is_offer',1)->where('status',1)->get();
        return view('frontend.pages.offer',$data);
    }


    public function contact(){
        return view('frontend.pages.contact');
    }


    public function RoomBooking($id){
        $id = $id;
        return view('frontend.pages.booking',compact('id'));
    }


    public function RoomBookingPost(Request $request){
        $request->validate([
            'room_id' => 'required',
            'name' => 'required',
            'mobile' => 'required',
        ]);

        $data = new booking();
        $data->room_id = $request->room_id;
        $data->name = $request->name;
        $data->mobile = $request->mobile;
        $data->remarks = $request->remarks;
        $data->is_confirm = 0;
        $data->save();
        $notification = array(
            'message' => 'Booking Request Successfully!',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function RoomBookingIndex(){
        $data['booking_room'] = Booking::get();
        return view('backend.Admin.booking.index',$data);
    }

    public function bookingStatus(Request $request, $id){

        $data = Booking::find($id);
        $data->is_confirm = $request->is_confirm;
        $data->save();
        $notification = array(
            'message' => 'Booking Status Change Successfully!',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    
    
    
    
    public function bookingdelete($id)
    {
         $data = Booking::find($id);
         $data->delete();
         
        $notification = array(
            'message' => 'Booking Delete Successfully!',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }
    
    
    
    
    


    public function contactPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
            'message' => 'required',
        ]);

        $data = new Contact();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->message = $request->message;
        $data->save();

        $notification = array(
            'message' => 'Submit Successfully!',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

    public function subscribePost(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);

        $data = new UsersSubscribe();
        $data->email = $request->email;
        $data->save();
        $notification = array(
            'message' => 'Subscribe Successfully!',
            'alert-type' => 'success'
            );
        return redirect()->back()->with($notification);
    }

 

    
}
