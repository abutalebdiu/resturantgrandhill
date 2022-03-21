@extends('backend.Admin.layouts.app')
@section('title','Create Food ')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Add Foods </h4>
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
            <form action="{{ route('admin.food.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-6">
                        <label> Food Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Food Name">
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                    </div>

                    <div class="form-group col-6" data-select2-id="90">
                        <label> Food Category</label>
                        <select name="food_category_id[]" class="form-control" id="category" multiple="multiple">
                            <option value="">select</option>
                            @foreach($food_categories as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        <small class="form-text text-danger">{{ $errors->first('foot_category_id') }}</small>
                    </div>



                    <div class="form-group col-6">
                        <label> Category Image</label>
                        <input type="file" name="image" class="form-control" placeholder="Food Name">
                        <small class="form-text text-danger">{{ $errors->first('image') }}</small>
                    </div>


                    <div class="form-group col-6">
                        <label> Food Price</label>
                        <input type="text" name="price" value="{{old('price')}}" class="form-control" placeholder="Food Name">
                        <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                    </div>
                    <div class="form-group col-6">
                        <label> Food Vat</label>
                        <input type="text" name="vat" value="{{old('vat')}}" class="form-control" placeholder="Food Vat">
                        <small class="form-text text-danger">{{ $errors->first('vat') }}</small>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </table>
        </div>
    </div>
</div>



@section('customjs')
<script>
    $(document).ready(function() {
        $('#category').select2({
            theme: 'classic',
            width: '100%',
        }).on('change', function() {});
    });
</script>
@endsection
@endsection