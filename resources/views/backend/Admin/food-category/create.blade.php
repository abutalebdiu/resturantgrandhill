@extends('backend.Admin.layouts.app')
@section('title','Food Create Category')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Add Food Information</h4>
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
            <form action="{{ route('admin.food-category.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label> Food Name</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Food Name">
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        

                        <div class="form-group">
                            <label> Category Image</label>
                            <input type="file" name="image" class="form-control" placeholder="Food Name">
                            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
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

