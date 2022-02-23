@extends('backend.Admin.layouts.app')
@section('title','Edit Profile')
@section('content')



<div id="content" class="content">
    <div class="row">
        <div class="col-xl-6">
            <div class="panel panel-inverse" data-sortable-id="form-stuff-10">
                <div class="panel-heading">
                    <h4 class="panel-title">Edit Profile</h4>
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand">
                                <i class="fa fa-expand"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload">
                                <i class="fa fa-redo"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse">
                                <i class="fa fa-minus"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.user.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                             
                        <div class="form-group">
                            <label for="url">Username</label>
                            <input type="text" name="username" value="{{ $profile->username }}" class="form-control" placeholder="Enter User Name" />
                            <div class="text-danger">{{ $errors->first('username') }}</div>
                        </div>

                        <div class="form-group">
                            <label for="url">First Name</label>
                            <input type="text" name="first_name" value="{{ $profile->first_name }}" class="form-control" placeholder="Enter First Name" />
                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                        </div>  

                        <div class="form-group">
                            <label for="url">Last Name</label>
                            <input type="text" name="last_name" value="{{ $profile->last_name }}" class="form-control" placeholder="Enter Last Name" />
                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                        </div>
                           
                        <div class="form-group">
                            <label for="details">Email</label>
                            <input type="text" name="email" value="{{ $profile->email }}" class="form-control" placeholder="Enter Email Address" />
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                        </div>
                           
                        <div class="form-group">
                            <label for="name">Mobile Number</label>
                            <input type="text" name="mobile" value="{{ $profile->mobile }}" class="form-control" placeholder="Enter mobile number" />
                            <div class="text-danger">{{ $errors->first('mobile') }}</div>
                        </div>
                           
                        

                        <div class="form-group">
                            <label for="">Image</label>
                            <br>
                            <img src="{{ asset($profile->image) }}" alt="" width="200">
                            <br>

                            <br>
                            <input type="file" name="image" value="" class="form-control" placeholder="Enter Password" />
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                        </div>

 
                         
                        <button type="submit" class="btn btn-sm btn-primary m-r-5">Update</button>
                        <a class="btn btn-sm btn-default" href="{{ route('admin.user.profile') }}">Back Profile</a>

                    </form>
                </div>

            </div>
        </div>

    </div>
</div>


@section('customjs')


@endsection
@endsection
