@extends('backend.Admin.layouts.app')
@section('title','All Artists ')
@section('content')
 <div id="content" class="content">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <h4 class="panel-title">All Artists</h4>
                    <div class="panel-heading-btn"> 
                        <a href="{{ route('blog-category.create') }}" class="btn  btn-primary">
                                    <i class="fa fa-plus"></i> Add New Artists
                                </a>
                                 

                    </div>
                </div>
                <div class="panel-body">
                    <table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
                         
                         <thead>
                             <tr>
                                 <th>Serial</th>
                                 <th>Username</th>
                                 <th>First Name</th>
                                 <th>last Name</th>
                                 <th>Email</th>
                                 <th>Mobile</th>
                                 <th>Role</th>
                                 <th>Status</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>   {{ $user->username }}</td>
                                <td>  {{ $user->first_name }}</td>
                                <td>  {{ $user->last_name }}</td>
                                <td>  {{ $user->email }}</td>
                                <td>  {{ $user->mobile }}</td>
                                <td>  {{ $user->role->name }}</td>

                                <td>
                                    @if($user->status==1)
                                        <a href="{{ route('admin.artists.active',$user->id) }}" class="btn btn-danger">Panding</a>
                                    @else
                                    <a href="{{ route('admin.artists.panding',$user->id) }}" class="btn btn-warning">Active</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="" class="btn btn-primary btn-sm artistsmodel" data-id={{ $user->id }}  > <i class="fa fa-eye"></i> Show</a>
                                    

                                    <a href="{{ route('admin.artists.delete',$user->id) }}}" class="btn btn-danger btn-sm" id="delete"> <i class="fa fa-trash"></i> Delete</a>
                                </td>
                                
                            </tr>


                            @endforeach
                           
                         </tbody>
                    </table>
                </div>
            </div>
        </div>
        

          <!-- Modal -->
        <div class="modal  fade bd-example-modal-lg" id="showModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Artists Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                   <div id="resultshow"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                 
              </div>
            </div>
          </div>
        </div> 


@section('customjs')


    <script>
        
         //=====================================================================================
            $(document).on('click','.artistsmodel',function(e){
                e.preventDefault();
                $('#showModel').modal('show');

                var user_id = $(this).data('id');

                $.ajax({
                        type: "get",
                        url: "{{ route('admin.artists.show') }}",
                        data: {user_id:user_id},
                        success: function (data) {
                            $('#resultshow').html(data);
                            $('#showModel').modal('show');
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                    

                
            });
        //==================================================================================




    </script>

@endsection
@endsection