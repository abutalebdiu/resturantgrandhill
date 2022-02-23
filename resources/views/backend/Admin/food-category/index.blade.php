 @extends('backend.Admin.layouts.app')
@section('title','Index Category')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">Food Category</h4>
                    <div class="panel-heading-btn"> 



    <a href="{{ route('admin.food-category.create') }}" class="btn  btn-primary">
        <i class="fa fa-plus"></i> Add New Category
    </a>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>

                             <tr>
                                 <th>Serial</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Action</th>
                                 
                             </tr>
                         </thead>

                         <tbody>
                          @foreach($food_categories as $item)

                            <tr>
                                  <td>{{ $loop->iteration }}</td>
                                  <td>{{ $item->name }}</td>
                                  <td>
                                      <img src="{{ asset($item->image) }}" alt="" style="width: 100px;">
                                  </td>
                                  <td><a class="btn btn-primary btn-sm" href="{{ route('admin.food-category.edit',$item->id) }}">Edit</a>

                                   <form action="{{ route('admin.food-category.destroy',$item->id) }}" method="post" style="display:inline-block;">
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