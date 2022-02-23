<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle" style="margin-bottom:50px;">

                    <tbody>
                        <tr>
                            <th width="15%">Image</th>
                            <td><img src="{{ asset($profile->image) }}" alt="Profile Photo" style="width: 150px"></td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ $profile->username }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $profile->first_name }}</td>
                        </tr>
                       
                        <tr>
                            <th>Mobile</th>
                            <td>{{ $profile->mobile }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $profile->email }}</td>
                        </tr>
                        <tr>
                            <th>Role</th>
                            <td>{{ $profile->role?$profile->role->name:'' }}</td>
                        </tr>
                        <tr>
                            <th>Account Created Date</th>
                            <td>{{ $profile->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Account Update Date</th>
                            <td>{{ $profile->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>
                                @if($profile->status==1)
                                <p class="btn btn-primary btn-xs">Active</p>
                                @elseif($profile->status==2)
                                <p class="btn btn-danger btn-xs">Deactive</p>
                                @endif
                            </td>
                        </tr>



                    </tbody>
                </table>


                <table class="table table-hovered table-bordered">
                    <tbody>
                        <tr>
                        	<th>Categories</th>
                            <td>
                                @foreach($profile->AgencyCatagory as $category)
                                {{ $category->category?$category->category->name:'' }} ,
                                @endforeach
                            </td>

                        </tr>

 
                    </tbody>
                </table>



                 