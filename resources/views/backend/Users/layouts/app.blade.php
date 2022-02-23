<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ $websetting->site_name }} </title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('backend') }}/assets/css/default/app.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" />
    <link href="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote.css" rel="stylesheet" />
    <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">

    @stack('css')



</head>

 <body>
    <div id="page-loader" class="fade show"> <span class="spinner"></span> </div>
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        <div id="header" class="header navbar-default">
            <div class="navbar-header"> 
                <a href="{{ route('user.dashboard') }}" class="navbar-brand">
                    <span class="navbar-logo"></span> <b> {{ $websetting->site_name }} </b> &nbsp; Users</a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled"> 
                    <span class="icon-bar"></span> <span class="icon-bar"></span> 
                    <span class="icon-bar"></span> 
                </button>
            </div>

            <ul class="navbar-nav navbar-right">
                <li> <a href="{{ route('homepage') }}" target="_blank"> Go Website </a>  </li>
                <li class="navbar-form">
                    <form action="#" method="get" name="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter keyword" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>


                <li class="dropdown navbar-user">
                    
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        @if(Auth::user()->image)
                            <img src="{{ asset(Auth::user()->image) }}" alt="">
                        @else
                            <img src="{{  asset('backend/assets/img/user/user-13.jpg')}}" alt="" />
                        @endif
                        <span class="d-none d-md-inline">{{ Auth::user()->username }}</span>
                        <b class="caret"></b>
                    </a>


                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('user.user.profile') }}" class="dropdown-item"><i class="fa fa-user"></i> Profile</a>
                        <a href="{{ route('user.user.setting') }}" class="dropdown-item"><i class="fa fa-cogs"></i> Setting</a>


                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>


                    </div>
                </li>


            </ul>
        </div>
        <div id="sidebar" class="sidebar">
            <div data-scrollbar="true" data-height="100%">
                <ul class="nav">
                    <li class="nav-profile">
                        <a href="javascript:;">
                            <div class="cover with-shadow"></div>
                            <div class="image">
                                @if(Auth::user()->image)
                                    <img src="{{ asset(Auth::user()->image) }}" alt="">
                                @else
                                    <img src="{{  asset('backend/assets/img/user/user-13.jpg')}}" alt="" />
                                @endif
                            </div>

                            <div class="info"> {{ Auth::user()->username }} </div>
                        </a>
                    </li>

                </ul>
                <ul class="nav">
                    <li class="nav-header">Navigation</li>
                    <li>
                        <a href="{{ route('user.dashboard') }}">  <i class="fa fa-th-large"></i> <span>Dashboard</span> </a>
                    </li>
                
                    <li class="has-sub">
                        <a href="javascript::void(0)"> <b class="caret"></b> <i class="fa fa-cogs"></i> <span>Orders Menagement </span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="{{ route('user.instruments.order') }}">Instruments Order </a></li>
                             
                        </ul>
                    </li>
                    



                    <li class="">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i> {{ __('Logout') }}
                        </a>
  
                    </li>

            



                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                </ul>
            </div>
        </div>



        @yield('content')




   
   </div> {{-- main div close --}}
 

    <script src="{{ asset('backend') }}/assets/js/app.min.js" type="text/javascript"></script>
    
    <script src="{{ asset('backend') }}/assets/js/theme/default.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="{{asset('backend/assets/sweetalert/sweetalert2@9.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('backend') }}/assets/plugins/summernote/dist/summernote.min.js" type="text/javascript"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    
    <script>
            @if(Session::has('message'))

            var type = "{{Session::get('alert-type','info')}}"

            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
    @endif

    $(document).ready(function() {
      $('.summernote').summernote(  

            {
              height: 200,
              focus: true
            }

        );
    });


 </script>
 

<script>
    $(document).on('click', '#delete', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Delete this data!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = link;
                Swal.fire(
                    'Deleted!',
                    'Data has been deleted.',
                    'success'
                )
            }
        })
    });

</script> 


<script>
    $(document).on('click', '#approved', function(e) {
        e.preventDefault();
        var link = $(this).attr("href");
        Swal.fire({
            title: 'Are you sure?',
            text: "Approved this Student!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Comfirm it!'
        }).then((result) => {
            if (result.value) {
                window.location.href = link;
                Swal.fire(
                    'Approved!',
                    'Student has been Approved.',
                    'success'
                )
            }
        })
    });

 

</script>

@yield('customjs')


</body>
</html>
