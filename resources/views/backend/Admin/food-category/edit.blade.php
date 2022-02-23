@extends('backend.Admin.layouts.app')
@section('title','Update Category')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Update Food Information</h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.food-category.index') }}" class="btn  btn-primary">
                    Back To Category
                </a>


            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
            <form action="{{ route('admin.food-category.update',$food_category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label> Food Name</label>
                            <input type="text" name="name" value="{{$food_category->name}}" class="form-control" placeholder="Food Name">
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        

                        <div class="form-group">
                            <label> Category Image  <img style="width:100px;" src="{{ asset($food_category->image) }}" alt=""></label>
                            <input type="file" name="image" class="form-control" placeholder="Food Name">
                            
                        </div>
                    </div>
                </div>
                
                 <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </table>
        </div>
    </div>
</div>



@section('customjs')

@endsection
@endsection

