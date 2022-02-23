@extends('backend.Admin.layouts.app')
@section('title','All Users ')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">All Users</h4>
                    <div class="panel-heading-btn"> 
                        <a href="{{ route('blog-category.create') }}" class="btn  btn-primary">
                                    <i class="fa fa-plus"></i> Add New User
                                </a>
                                 

                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Username</th>
                                 <th>First Name</th>
                                 <th>last Name</th>
                                 <th>Email</th>
                                 <th>Mobile</th>
                                 <th>Role</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>   {{ $user->username }}</td>
                                <td>  {{ $user->first_name }}</td>
                                <td>  {{ $user->last_name }}</td>
                                <td>  {{ $user->email }}</td>
                                <td>  {{ $user->mobile }}</td>
                                <td>  {{ $user->role->name }}</td>

                                <td>
                                    @if($user->status==1)
                                    <p class="btn btn-primary btn-sm">Active</p>
                                    @else
                                    <p class="btn btn-danger btn-sm">Deactive</p>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>
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