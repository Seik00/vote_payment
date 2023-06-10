@extends('admin.layouts.header')

@section('content')
                <div class="row">
                        
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Admin Management
                                        <button class="btn btn-gradient-primary btn-sm px-3" onclick="openModel()">New</button>
									</h4>
                                    <div class="table-responsive">
                                     <table  class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Mobile</th>
                                            <th>Role</th>
                                            <th>Join time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($record as $records)
                                            <tr>  
                                                <td>{{ $records->id}}</td>
                                                <td>{{ $records->name}}</td>
                                                <td>{{ $records->mobile_no}}</td>
                                                
                                                <td>{{ $records->role_info->display_name}}</td>
                                                <td>{{ $records->created_at}}</>
                                                <td>
                                                    <button  onclick='user_info({{ $records->id}})' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">Info</button>
                                                    <!-- <button onclick="delete_user({{ $records->id}})" class="btn btn-danger btn-sm px-3">Offline</button> -->
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
                                    </table>
                                    {{ $record->links() }}
</div>
                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="exampleModalLabel">Admin Info</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    
                                                    <input class="form-control" name='user_id'  id='user_id' type="hidden" value="" id="example-text-input">
                                                        
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Admin Name</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='name' id='name' type="text" value="">
															<input name='update_id' id='update_id' type="hidden" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Mobile</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='mobile_no' id='mobile_no' type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Admin Roles</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name='role_id'  id='role_id' >
                                                                @foreach ($role as $roles)
                                                                <option value='{{ $roles->id}}' >{{ $roles->display_name}}</option>
                                                                @endforeach
                                                              
                                                            </select>
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Password</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='password' id='update_password' type="password" value="">
                                                        </div>
                                                    </div>
                                                    
                                                    <button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">Close</button>
                                                     <button  onclick='submit_request()' class="btn btn-gradient-primary btn-sm px-3" id='modal_button'>Add</button>
                                              
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <div class="modal fade bs-example-modal-center model1" id="newadmin" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="modal-title_new">New Admin</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">    
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Admin Name</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='name'  id='new_name' type="text" value="" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Mobile</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='mobile_no' id='new_mobile_no' type="text" value="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Admin Roles</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control" name='role_id'  id='new_role_id' >
                                                                @foreach ($role as $roles)
                                                                <option value='{{ $roles->id}}' >{{ $roles->display_name}}</option>
                                                                @endforeach
                                                              
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Password</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='password'  id='password' type="password" value="" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Confirm Password</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='c_pass'  id='c_pass' type="password" value="" id="example-text-input">
                                                        </div>
                                                    </div>
                                                    <button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">Close</button>
                                                     <button  onclick='add_admin()' class="btn btn-gradient-primary btn-sm px-3" id='modal_button'>Add</button>
                                              
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
@stop
                                
@section('script')
    <script>
		function openModel() {
			$('#newadmin').modal('show');
		}
        function delete_user(id) {
           $.ajax({
                type: "POST",
                url: 'delete_admin',
                data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
                success: function(data)
                {
                    swal({
                        type: 'success',
                        title: 'Operation Success',
                        type: "success"
                    }).then(function() {
                        location.reload();
                    });
                },error:function(error)
                    {
                        if(error.status === 401){
                        if(!alert('Unauthorized action.')){window.location.reload()};
                       }
                    }
            });
        }
       function user_info(user_id) {
           $.ajax({
                type: "POST",
                url: 'get_user_info',
                data: {"_token": "{{ csrf_token() }}",'search_id': user_id}, // serializes the form's elements.
                success: function(data)
                {
                   // $('#role_id').val(data.user.role_id);
                    document.getElementById("role_id").value = data.user.role_id;
                    document.getElementById("name").value = data.user.name;
                    document.getElementById("mobile_no").value = data.user.mobile_no;
                    document.getElementById("update_id").value = data.user.id;
                    document.getElementById("modal_button").innerHTML = 'Edit';
                },error:function(error)
                    {
                        if(error.status === 401){
                        if(!alert('Unauthorized action.')){window.location.reload()};
                       }
                    }
            });
        }
        function add_admin() {
            if(document.getElementById("password").value!=document.getElementById("c_pass").value){
                return alert('Password not match');
            }

            var fd = new FormData();
			fd.append('password',document.getElementById("password").value);
            fd.append('username',document.getElementById("new_name").value);
            fd.append('mobile_no',document.getElementById("new_mobile_no").value);
            fd.append('role_id',document.getElementById("new_role_id").value);
            fd.append('_token',"{{ csrf_token() }}");
            $.ajax({
                    type: "POST",
                    url: 'create_admin',
                    data:  fd, // serializes the form's elements.
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.success==true){
                            swal({
                                type: 'success',
                                title: 'Operation Success',
                                type: "success"
                            }).then(function() {
                                location.reload();
                            });     
                        }else{
                            swal({
                                title: data.message,
                                timer: 1500,
                                type: "error",
                                showConfirmButton: false
                            });
                        }
                    },error:function(error)
                    {
                        if(error.status === 401){
                        if(!alert('Unauthorized action.')){window.location.reload()};
                       }
                    }
                }); 
          
        }
        function submit_request() {
            
            var fd = new FormData();
            fd.append('id',document.getElementById("update_id").value);
            fd.append('name',document.getElementById("name").value);
            fd.append('mobile_no',document.getElementById("mobile_no").value);
            fd.append('role_id',document.getElementById("role_id").value);
            fd.append('password',document.getElementById("update_password").value);
            fd.append('_token',"{{ csrf_token() }}");
            $.ajax({
                    type: "POST",
                    url: 'update_admin',
                    data:  fd, // serializes the form's elements.
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.success==true){
                            swal({
                                type: 'success',
                                title: 'Operation Success',
                                type: "success"
                            }).then(function() {
                                location.reload();
                            });     
                        }else{
                            swal({
                                title: data.message,
                                timer: 1500,
                                type: "error",
                                showConfirmButton: false
                            });
                        }
                    },error:function(error)
                    {
                        if(error.status === 401){
                        if(!alert('Unauthorized action.')){window.location.reload()};
                       }
                    }
                }); 
          
        }
    </script>
@stop

