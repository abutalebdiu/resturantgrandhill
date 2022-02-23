@extends('backend.Admin.layouts.app')
@section('title','Create Admin')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Create Admin</h4>
                    <div class="panel-heading-btn">
                        <a href="{{ route('admin.admin') }}" class="btn  btn-primary">
                            Admin List
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <form action="{{ route('admin.create.post') }}" method="post">
                        @csrf
                        <div class="row">
                        <div class="form-group col-12 col-lg-12">
                            <label>User Name</label>
                            <input type="Text" name="username" value="{{ old('username') }}" class="form-control" placeholder="username">
                            <small class="form-text text-danger">{{ $errors->first('username') }}</small>
                        </div>
                       
                        <div class="form-group col-12 col-lg-12">
                            <label>Email</label>
                            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="email">
                            <small class="form-text text-danger">{{ $errors->first('email') }}</small>
                        </div>
                        <div class="form-group col-12 col-lg-12">
                            <label>Pssword</label>
                            <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="password">
                            <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
        


@section('customjs')


@endsection
@endsection