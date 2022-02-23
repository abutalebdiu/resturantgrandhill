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
                            <th>First Name</th>
                            <td>{{ $profile->first_name }}</td>
                        </tr>
                        <tr>
                            <th>Last Name</th>
                            <td>{{ $profile->last_name }}</td>
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
                                @foreach($profile->ArtistModelCategory as $category)

                                {{ $category->Artist_category->name }} ,

                                @endforeach
                            </td>

                        </tr>

 
                    </tbody>
                </table>



                  <table class="table table-hovered table-bordered">
                    <tbody>
                       
                           <thead>
                                <tr>
                                    <th>Country </th>
                                    <th>Language </th>
                                    <th>Gender </th>
                                    <th>Date of Birth </th>
                                    <th>Address </th>
                               </tr>
                           </thead>
                      
                        <tr>
                            <td> {{ $personalinfo->country->name }}</td>
                            <td> {{ $personalinfo->language->name }}</td>
                            <td>
                                @if($personalinfo->gender==1)
                                <p class="text-primary">Male</p>
                                @elseif($personalinfo->gender==2)
                                <p class="text-primary">Female</p>
                                @endif
                            </td>
                            <td>{{ Date('d-m-Y',strtotime($personalinfo->birthday)) }}</td>
                            <td> {{ $personalinfo->address }}</td>
                        </tr>

                        
        
                        
                    </tbody>
                </table>



                 <table class="table table-hovered table-bordered">
                    <thead>
                        <tr>
                            <th>Serial</th>
                            <th>Company Name</th>
                            <th>Designation</th>
                            
                            <th>Years of Experience</th>
                            <th>Continue</th>
                            
                            
                            

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($experienses as $experiense)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $experiense->company_name }}</td>
                            <td>{{ $experiense->designation }}</td>
                            
                            <td>{{ $experiense->experience }} (Month)</td>
                            <td>
                                @if($experiense->to_be_continue==1)
                                <p class="text-primary">YES</p>
                                @elseif($experiense->to_be_continue==2)
                                <p class="text-danger">NO</p>
                                @endif
                        </td>
                          
                        </tr>
                        @endforeach
                    </tbody>
                </table>