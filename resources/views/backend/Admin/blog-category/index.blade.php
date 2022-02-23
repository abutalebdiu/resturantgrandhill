@extends('backend.Admin.layouts.app')
@section('title','Blog-Category ')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Blog Category</h4>
                    <div class="panel-heading-btn"> 



                                <a href="{{ route('blog-category.create') }}" class="btn  btn-primary">
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
                                 <th>Arabic Name</th>
                                 <th>Slug</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($blogs_categories as $item)
                             <tr>
                                 <td>{{ $loop->iteration }}</td>
                                 <td>{{ $item->name }}</td>
                                 <td>{{ $item->name_ar }}</td>
                                 <td>{{ $item->slug }}</td>
                                 <td>
                                     <a href="{{ route('blog-category.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                     <form action="{{ route('blog-category.destroy',$item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</button>
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