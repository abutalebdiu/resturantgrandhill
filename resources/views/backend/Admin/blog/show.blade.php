@extends('backend.Admin.layouts.app')
@section('title','Show Blogs')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Show Blogs</h4>
                    <div class="panel-heading-btn"> 



                                <a href="{{ route('admin-blog.index') }}" class="btn  btn-primary">
                                    <i class="fa fa-plus"></i> Blog
                                </a>
                                 

                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             
                         </thead>
                         <tbody>
                            <tr>
                               
                                <th>Title</th>
                                <td>{{ $blogs->title }}</td>
                                
                            </tr> 

                            <tr>
                               
                                <th>Arabic Title</th>
                                <td>{{ $blogs->title_ar }}</td>
                                
                            </tr>
                            <tr>
                                <th>Image</th>
                                <td>
                                    <img src="{{ asset($blogs->image) }}" alt="" style="width:100px">
                                </td>
                               
                            </tr>
                            <tr>
                                <th>Category</th>
                                <td>
                                    {{ $blogs->blogCategory?$blogs->blogCategory->name:'' }}
                                </td>
                               
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{!! $blogs->description !!}</td>
                            </tr> 

                            <tr>
                                <th>Arabic Description</th>
                                <td>{!! $blogs->description_ar !!}</td>
                            </tr>
                            <tr>
                                <th>Publish Date</th>
                                <td>{{ $blogs->publish_date }}</td>
                            </tr>
                            <tr>
                                <th>Atatus</th>
                                <td>
                                    @if($blogs->status==1)
                                    <p class="text-primary">Active</p>
                                    @elseif($blogs->status==2)
                                    <p class="text-danger">inactive</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th> Action </th>
                                <td> 
                                     <a href="{{ route('admin-blog.index') }}" class="btn btn-primary btn-sm">  <i class="fa fa-arraw-left"></i> Back </a>
                                     <a href="{{ route('admin-blog.edit',$blogs->id) }}" class="btn btn-success btn-sm">  <i class="fa fa-edit"></i> Edit </a>
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