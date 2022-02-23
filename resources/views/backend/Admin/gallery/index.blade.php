@extends('backend.Admin.layouts.app')
@section('title','Gallery')
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
                                 <th>Image</th>
                                 <th>Status</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($gallery as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td><img src="{{ asset($item->image) }}" alt="" style="width:100px;"></td>
                                <td>
                                    <form action="{{ route('admin.gallery.destroy',$item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-primary btn-sm">Delete</button>
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