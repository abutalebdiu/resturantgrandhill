@extends('backend.Admin.layouts.app')
@section('title','Room floors')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Room Floors</h4>
                    <div class="panel-heading-btn"> 



    <a href="{{ route('admin.roomfloors.create') }}" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Room Floors
    </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Name</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($roomfloors as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->name }}</td>
                                
                                <td style="display: none;">
                                    <a href="{{ route('admin.roomfloors.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.roomfloors.destroy',$item->id) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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