@extends('backend.Admin.layouts.app')
@section('title','All Admin ')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">All Admin</h4>
                    <div class="panel-heading-btn"> 
                        <a href="{{ route('admin.create') }}" class="btn  btn-primary">
                                    <i class="fa fa-plus"></i> Add New Admin
                                </a>
                                 

                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>   {{ $user->username }}</td>
                                <td>  {{ $user->email }}</td>
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