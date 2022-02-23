@extends('backend.Users.layouts.app')
@section('title','Dashboard')
@section('content')

<div id="content" class="content">

     <div class="row">
         <div class="col-xs-12">
             <ol class="breadcrumb float-xl-left">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
         </div>
     </div>


     <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                    <div class="stats-info">
                        <h4><b>Order</b></h4>
                        <p>
                            0
                        </p>
                    </div>
                    <div class="stats-link">
                        <a href="">View Detail</a>  
                    </div>
            </div>
        </div>

      
        

    </div>



 </div>

@endsection