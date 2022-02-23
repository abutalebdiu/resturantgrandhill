@extends('backend.Admin.layouts.app')
@section('title','Create-Blog')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Create Blog</h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin-blog.create') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Blog
                </a>


            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin-blog.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Title</label>
                    <input type="Text" name="title" id="slug_input" value="{{ old('title') }}" class="form-control" placeholder="Enter Blog Title">
                    <small class="form-text text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group">
                    <label>Arabic Title</label>
                    <input type="Text" name="title_ar" id="slug_input" value="{{ old('title_ar') }}" class="form-control" placeholder="Enter Blog Arabic Title">
                    <small class="form-text text-danger">{{ $errors->first('title_ar') }}</small>
                </div>

                 <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" id="slug_output" value="{{ old('slug') }}"  class="form-control" placeholder="slug">
                    <small class="form-text text-danger">{{ $errors->first('slug') }}</small>
                </div>

                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" class="form-control">
                    <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                </div>
               
                <div class="form-group">
                    <label>Category</label>
                    <select name="category_id" id="" class="form-control">
                        <option value="">--select--</option>
                        @foreach($blog_categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach

                    </select>
                    <small class="form-text text-danger">{{ $errors->first('category_id') }}</small>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control summernote" >{{ old('description') }}</textarea>
                    <small class="form-text text-danger">{{ $errors->first('description') }}</small>
                </div> 


                <div class="form-group">
                    <label>Arabic Description</label>
                    <textarea name="description_ar" class="form-control summernote" >{{ old('description_ar') }}</textarea>
                    <small class="form-text text-danger">{{ $errors->first('description_ar') }}</small>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                    <small class="form-text text-danger">{{ $errors->first('status') }}</small>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </table>
        </div>
    </div>
</div>



@section('customjs')

<script>

    $("#slug_input").keyup(function(){
        var Text = $(this).val();
        Text = Text.toLowerCase();
        Text = Text.replace(/\s+/g,'-').trim();
        $("#slug_output").val(Text);
    });
</script> 

@endsection
@endsection
