@extends('backend.Admin.layouts.app')
@section('title','All Role ')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">All Role</h4>
            <div class="panel-heading-btn">
                <a href="{{ route('admin.role.create') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Add New Role
                </a>


            </div>
        </div>
        <div class="panel-body">
            <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">

                <thead>
                    <tr>
                        <th>Serial</th>
                        <th>Role Id</th>
                        <th>Role Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td> {{ $role->role_id }}</td>
                        <td> {{ $role->name }}</td>
                        <td>
                            <a href="#" class="btn btn-danger btn-sm" onclick="event.preventDefault();document.getElementById('deleteMethod').submit()"> <i class="fa fa-trash"></i> Delete</a>
                            <form action="{{route('admin.role.destroy', $role->id)}}" id="deleteMethod" method="post">
                                @csrf
                                @method('delete')
                            </form>
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