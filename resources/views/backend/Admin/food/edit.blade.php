@extends('backend.Admin.layouts.app')
@section('title','Edit Food ')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Edit Food </h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.food.index') }}" class="btn  btn-primary">
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

       
            <form action="{{ route('admin.food.update',$foods->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                 @method('PUT')
                <div class="row">
                    <div class="col-6">

                        <div class="form-group">
                            <label> Food Name</label>
                            <input type="text" name="name" value="{{ $foods->name }}" class="form-control" placeholder="Food Name">
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        </div>


                         <div class="form-group">
                            <label> Food Category</label>
                            <select name="food_category_id" class="form-control">
                                <option value="">select</option>
                                @foreach($food_categories as $item)
                                    <option value="{{ $item->id }}" {{ $item->id == $foods->food_category_id ? 'selected' : '' }}>{{ $item->name }}</option><q>1</q>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{{ $errors->first('foot_category_id') }}</small>
                         </div>
                        
                        

                        <div class="form-group">
                            <label> Category Image</label>
                            <img style="width:100px;" src="{{ asset($foods->image) }}" alt=""></label>
                            <input type="file" name="image"  class="form-control" placeholder="Food Name">
                            <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                        </div>


                        <div class="form-group">
                            <label> Food Price</label>
                            <input type="text" name="price" value="{{ $foods->price}}" class="form-control" placeholder="Food Name">
                            <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                        </div>



                         <div class="form-group">
                            <label> Status</label>
                            <select name="status" class="form-control">
                                <option value="Active" {{ $foods->status == 'Active' ? 'selected' : '' }}>Active</option>
                                <option value="Deactive" {{ $foods->status == 'Deactive' ? 'selected' : '' }}>Dective</option>
                                
                            </select>
                            <small class="form-text text-danger">{{ $errors->first('foot_category_id') }}</small>
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

