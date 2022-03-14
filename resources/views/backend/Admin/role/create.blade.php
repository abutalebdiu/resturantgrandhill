@extends('backend.Admin.layouts.app')
@section('title','Create Role')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Create Role</h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.role.index') }}" class="btn  btn-primary">
                    Role List
                </a>
            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.role.store') }}" method="post" class="w-50 p-5 border m-auto">
                @csrf
                <div class="row">
                    <div class="form-group col-12 col-lg-12">
                        <label>Role Id</label>
                        <input type="number" name="role_id" value="{{ old('role_id') }}" class="form-control" placeholder="Role Id">
                        <small class="form-text text-danger">{{ $errors->first('role_id') }}</small>
                    </div>
                    <div class="form-group col-12 col-lg-12">
                        <label>Role Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Role Name">
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        <input type="submit" class="btn btn-primary mt-3" value="Create">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@section('customjs')


@endsection
@endsection