@extends('backend.Admin.layouts.app')
@section('title','Category')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Category</h4>
                    <div class="panel-heading-btn"> 



    <a href="{{ route('admin.category.create') }}" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Category
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
                            @foreach($categories as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->name }}</td>
                                
                                <td>
                                    <a href="{{ route('admin.category.edit',$item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('admin.category.destroy',$item->id) }}" method="post" style="display:inline-block;">
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