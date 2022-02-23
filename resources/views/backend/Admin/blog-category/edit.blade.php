@extends('backend.Admin.layouts.app')
@section('title','Edit Blog category')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Edit Blog Category</h4>
            <div class="panel-heading-btn">

                <a href="{{ route('blog-category.index') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i>Blog Category
                </a>


            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('blog-category.update', $categories->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Name</label>
                    <input type="Text" name="name" id="slug_input" value="{{ $categories->name }}" class="form-control" placeholder="name">
                    <small class="form-text text-muted">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group">
                    <label>Name Arabic</label>
                    <input type="Text" name="name_ar" value="{{ $categories->name_ar }}" class="form-control" placeholder="name arabic">
                    <small class="form-text text-muted">{{ $errors->first('name_ar') }}</small>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" value="{{ $categories->slug }}" id="slug_output" class="form-control" placeholder="slug">
                    <small class="form-text text-muted">{{ $errors->first('slug') }}</small>
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
