@extends('backend.Admin.layouts.app')
@section('title','Room Booking')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Gallery</h4>
                    <div class="panel-heading-btn"> 



    <a href="{{ route('admin.gallery.create') }}" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Gallery
    </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Room Id</th>
                                 <th>Name</th>
                                 <th>Mobile</th>
                                 <th>Remarks</th>
                                 <th>Date</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($booking_room as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->id }}</td>
                                 <td>{{ $item->name }}</td>
                                 <td>{{ $item->mobile }}</td>
                                 <td>{{ $item->remarks }}</td>
                                 <td> {{ $item->created_at->format('d-M-Y') }} </td>
                                 <td>
                                     @if($item->is_confirm == 0)
                                        <a href="#" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal_{{$item->id}}">
                                            <i class="fa fa-eye"></i> Pending
                                        </a>
                                    @elseif($item->is_confirm == 1)
                                        <a href="#" class="btn btn-xs btn-success" data-toggle="modal" data-target="#exampleModal_{{$item->id}}">
                                            <i class="fa fa-eye"></i> Confirm
                                        </a>
                                    @elseif($item->is_confirm == 2)
                                        <a href="#" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#exampleModal_{{$item->id}}">
                                            <i class="fa fa-eye"></i> Rejected
                                        </a>
                                     @endif
                                   
                                 </td>
                                <td>
                                    <a href="{{ route('room.booking.delete',$item->id) }}" class="btn btn-danger" id="delete"> <i class="fa fa-trash"></i>  Delete</a>
                                </td>
                             </tr>




                             <div class="modal fade" id="exampleModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{route('change.update',$item->id)}}" method="post">
                                                @csrf
                                                <div>
                                                    <label for="verify"><b>verify</b></label>
                                                    <select name="is_confirm" id="" class="form-control">
                                                        <option value="0" selected>Panding</option>
                                                        <option value="1" selected>Booking</option>
                                                        <option value="2" selected>Rejected</option>
                                                    </select>
                                                </div>
                                                <div class="pt-2 text-right">
                                                    <button type="submit" class="btn btn-aqua">save change</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endforeach
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        


@section('customjs')


@endsection
@endsection