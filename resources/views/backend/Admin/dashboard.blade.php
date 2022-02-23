@extends('backend.Admin.layouts.app')
@section('title','Dashboard')
@section('content')

<div id="content" class="content">

     <div class="row">
         <div class="col-xs-12">
             <ol class="breadcrumb float-xl-left">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item">Admin</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </div>
     </div>

     <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4><b>Total Admins</b></h4>
                        <p>
                            {{ $admins }}
                        </p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ route('admin.admin') }}">View Detail</a>  
                    </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4><b>Total Booking Request</b></h4>
                        <p>
                            {{ $booking_request }}
                        </p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ route('room.booking.index') }}">View Detail</a>  
                    </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4><b>Total Booking</b></h4>
                        <p>
                            {{ $booking }}
                        </p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ route('room.booking.index') }}">View Detail</a>  
                    </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4><b>Total Booking Reject</b></h4>
                        <p>
                            {{ $booking_reject }}
                        </p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ route('room.booking.index') }}">View Detail</a>  
                    </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4><b>Total Rooms</b></h4>
                        <p>
                            {{ $rooms }}
                        </p>
                    </div>
                    <div class="stats-link">
                        <a href="{{ route('admin.room.index') }}">View Detail</a>  
                    </div>
            </div>
        </div>
       
 
    </div>



 </div>

@endsection