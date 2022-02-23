@extends('backend.Admin.layouts.app')
@section('title','Show Room')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Show Room</h4>
                    <div class="panel-heading-btn"> 



                                <a href="{{ route('admin.room.index') }}" class="btn  btn-primary">
                                    <i class="fa fa-plus"></i> Back To Room
                                </a>
                                <a href="{{ route('admin.room.edit',$room->id) }}" class="btn btn-success btn-sm">  <i class="fa fa-edit"></i> Edit </a>
                                 

                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             
                         </thead>
                         <tbody>
                            <tr>
                               
                                <th>Name</th>
                                <td>{{ $room->name }}</td>
                                
                            </tr> 

                            <tr>
                               
                                <th>Category</th>
                                <td>{{ $room->category->name }}</td>
                                
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ asset($room->photo) }}" alt="" style="width:150px">
                                </td>
                               
                            </tr>
                           
                            <tr>
                                <th>Bed Quentity</th>
                                <td>{{ $room->bed }}</td>
                            </tr> 

                            <tr>
                                <th>Room Area (Squery F)</th>
                                <td>{{ $room->room_size }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $room->description !!}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $room->price }}</td>
                            </tr>
                            <tr>
                                <th>Descount Price Status</th>
                                <td>@if($room->is_offer == 0)
                                    <button class="btn btn-danger btn-sm">No Descount</button>
                                    @elseif($room->is_offer == 1)
                                    <button class="btn btn-success btn-sm">Descount</button>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Descount Price</th>
                                <td>{{ $room->discount_price }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    @if($room->status==1)
                                    <p class="text-primary">Active</p>
                                    @elseif($room->status==2)
                                    <p class="text-danger">inactive</p>
                                    @endif
                                </td>
                            </tr>
                           
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        


@section('customjs')


@endsection
@endsection