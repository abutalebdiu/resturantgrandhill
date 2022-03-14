@extends('backend.Admin.layouts.app')
@section('title','Create User')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Create User</h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.admin') }}" class="btn  btn-primary">
                    User List
                </a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.create.post') }}" method="post" class="w-75 m-auto p-3 border">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-12">
                        <label>Name</label>
                        <input type="Text" name="name" value="{{ old('name') }}" class="form-control" placeholder="name">
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
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
                    <div class="form-group col-12 col-lg-12">
                        <label>Role</label>
                        <select name="role_id" id="role_id" class="form-control">
                            @foreach($roles as $role)
                            <option value="{{$role->role_id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                        <button type="submit" class="btn btn-primary mt-2">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@section('customjs')


@endsection
@endsection