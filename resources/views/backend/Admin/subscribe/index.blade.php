@extends('backend.Admin.layouts.app')
@section('title','Subscribe')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Subscribe</h4>
                    <div class="panel-heading-btn"> 



    {{-- <a href="#" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Job
    </a> --}}
                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Email</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($subscribe as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->subscribe }}</td>
                                 <td>
                                    @if($item->status==1)
                                    <p class="text-primary">Active</p>
                                    @elseif($item->status==2)
                                    <p class="text-danger">Dactive</p>
                                    @endif
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