@extends('backend.Admin.layouts.app')
@section('title','Blogs')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Blogs</h4>
                    <div class="panel-heading-btn"> 



                                <a href="{{ route('admin-blog.create') }}" class="btn  btn-primary">
                                    <i class="fa fa-plus"></i> Add New Blog
                                </a>
                                 

                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Title</th>
                                 <th>Image</th>
                                 <th>Category</th>
                                 <th>Atatus</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($blogs as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->title }}</td>
                                 <td> <img src="{{ asset($item->image) }} " alt="" style="width:80px"></td>
                                 <td>{{ $item->blogCategory ? $item->blogCategory->name :'no user' }}</td>
                                 <td>
                                    @if($item->status==1)
                                    <p class="text-primary">Active</p>
                                    @elseif($item->status==2)
                                    <p class="text-danger">inactive</p>
                                    @endif
                                 </td>
                                 <td style="width:230px; text-align:center">
                                    <a href="{{ route('admin-blog.show',$item->id) }}" class="btn btn-secondary btn-sm"><i class="fa fa-eye"></i> View</a>
                                     <a href="{{ route('admin-blog.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                     <form action="{{ route('admin-blog.destroy',$item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" id=""><i class="fa fa-trash"></i> Delete</button>
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