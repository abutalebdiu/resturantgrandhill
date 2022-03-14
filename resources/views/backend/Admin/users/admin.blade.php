@extends('backend.Admin.layouts.app')
@section('title','All User ')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">All User</h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.create') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Add New User
                </a>


            </div>
        </div>
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">

                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{ $user->name }}</td>
                        <td> {{ $user->email }}</td>
                        <td>
                            <form action="{{route('admin.updaterole')}}" id="updaterole" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <select name="role_id" onChange="event.preventDefault(); document.getElementById('updaterole').submit();" class="form-control">
                                    @foreach($roles as $role)
                                    <option {{$user->role_id == $role->role_id ? 'selected' : '' }} value="{{$role->role_id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>

                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.delete',$user->id) }}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>
                        </td>

                    </tr>


                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@section('customjs')


@endsection
@endsection