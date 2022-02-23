@extends('backend.Admin.layouts.app')
@section('title','Create Gallery')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Create Gallery</h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.gallery.index') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Back
                </a>


            </div>
        </div>
        <div class="panel-body">
            <form action="{{ route('admin.gallery.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="image" id="slug_input" class="form-control">
                    <small class="form-text text-danger">{{ $errors->first('image') }}</small>
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

