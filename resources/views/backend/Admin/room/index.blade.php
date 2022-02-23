@extends('backend.Admin.layouts.app')
@section('title','Room')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Room</h4>
                    <div class="panel-heading-btn"> 



    <a href="{{ route('admin.room.create') }}" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Room
    </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="datatable" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Room No</th>
                                 <th>Name</th>
                                 <th>Category</th>
                                 <th>Bed</th>
                                 <th>Size</th>
                                 <th>Price</th>
                                 <th>Discount Price</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($room as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->room_no }}</td>
                                 <td>{{ $item->name }}</td>
                                 <td>{{ $item->category?$item->category->name:''}}</td>
                                 <td>{{ $item->bed}}</td>
                                 <td>{{ $item->room_size}}</td>
                                 <td>{{ $item->price}}</td>
                                 <td>{{ $item->discount_price}}</td>
                                <td>
                                    <a href="{{ route('admin.room.show',$item->id) }}" class="btn btn-primary btn-sm">Show</a>
                                    <a href="{{ route('admin.room.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.room.destroy',$item->id) }}" method="post" style="display:inline-block;">
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