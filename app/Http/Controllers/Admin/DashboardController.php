<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Booking;
use App\Models\Admin\Room;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        if(!Auth::check()){
            return redirect('en/login');
        }
    }

    public function index()
    {

        $data['admins'] =  User::whereIn('role_id',[1,2])->count();

        $data['users'] =  User::where('role_id',5)->count();
        $data['booking_request'] =  Booking::count();
        $data['booking'] =  Booking::count();
        $data['booking_reject'] =  Booking::count();
        $data['rooms'] =  Room::where('status',1)->count();

        return view('backend.Admin.dashboard',$data);
    }





}
