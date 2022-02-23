 @extends('backend.Admin.layouts.app')
@section('title','Food ')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Foods </h4>
                    <div class="panel-heading-btn"> 



    <a href="{{ route('admin.food.create') }}" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Foods
    </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>

                             <tr>
                                 <th>Serial</th>
                                 <th>Name</th>
                                 <th>Category</th>
                                 <th>Image</th>
                                 <th>Price</th>
                                 <th>Status</th>
                                 <th>Action</th>
                                                                 
                                 </tr>
                         </thead>

                         <tbody>

                            @foreach($foods as $item)

                            <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->name }}</td>
                                   <td>{{ $item->foodcategory ? $item->foodcategory->name :'' }}</td>


                                  <td>
                                      <img src="{{ asset($item->image) }}" alt="" style="width: 100px;">
                                  </td>
                                  <td>{{ $item->price }}</td>
                                  <td>{{ $item->status }}</td>
                                  <td><a class="btn btn-primary btn-sm" href="{{ route('admin.food.edit',$item->id) }}">Edit</a>

                                   <form action="{{ route('admin.food.destroy',$item->id) }}" method="post" style="display:inline-block;">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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