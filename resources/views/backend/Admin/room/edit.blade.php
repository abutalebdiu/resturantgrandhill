@extends('backend.Admin.layouts.app')
@section('title','Edit Room')
@section('content')
<div id="content" class="content">
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Edit Room</h4>
            <div class="panel-heading-btn">

                <a href="{{ route('admin.room.index') }}" class="btn  btn-primary">
                    <i class="fa fa-plus"></i> Back
                </a>


            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        @endif
            <form action="{{ route('admin.room.update',$room->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $room->name}}" class="form-control" placeholder="Room Name">
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Room No</label>
                            <input type="text" name="room_no" value="{{ $room->room_no }}" class="form-control" placeholder="Room No">
                            <small class="form-text text-danger">{{ $errors->first('room_no') }}</small>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label>Room Floor</label>
                            <select name="room_floor_id" class="form-control">
                                @foreach($roomfloors as $roomfloor)
                                <option {{ $roomfloor->id == $room->room_floor_id ? 'selected' : '' }} value="{{ $roomfloor->id }}">{{ $roomfloor->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{{ $errors->first('room_floor_id') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                @foreach($categories as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $room->category_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="photo"  class="form-control">
                            <small class="form-text text-danger">{{ $errors->first('photo') }}</small>
                        </div>
                    </div>


                    <div class="col-6">
                        <div class="form-group">
                            <label>Bed</label>
                            <input type="text" name="bed" value="{{ $room->bed }}" class="form-control" placeholder="Bed">
                            <small class="form-text text-danger">{{ $errors->first('bed') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Area Size (Sq Ft)</label>
                            <input type="text" name="room_size" value="{{ $room->room_size }}" class="form-control" placeholder="Room Size">
                            <small class="form-text text-danger">{{ $errors->first('room_size') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Price</label>
                            <input type="number" name="price" value="{{$room->price}}" class="form-control" placeholder="Room Price">
                            <small class="form-text text-danger">{{ $errors->first('price') }}</small>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>Descount Price</label>
                            <input type="number" name="discount_price" value="{{ $room->discount_price }}" class="form-control" placeholder="Descount Price">
                            <small class="form-text text-danger">{{ $errors->first('discount_price') }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="summernote">{{ $room->description }}</textarea>
                            <small class="form-text text-danger">{{ $errors->first('description') }}</small>
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="checkbox" name="is_offer" value="1" id="discount" {{ $room->is_offer == 1 ? 'checked' : '' }}>
                        <label for="discount">Discount</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
            </table>
        </div>
    </div>
</div>



@section('customjs')

@endsection
@endsection

