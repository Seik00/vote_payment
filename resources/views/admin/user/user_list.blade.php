@extends('admin.layouts.header')

@section('content')

<?php
$f_trust = request('f_trust');

if ($f_trust == '') {
    $f_trust = '-1';
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action='user_list' method='GET'>
					<div class="row">
						<div class="col-6 mb-2">
						{{ __('site.Username') }}
							<input class="form-control" type="text" name="f_username" value="{{ request('f_username') }}" />
						</div>
						<div class="col-6 mb-2">
							Mobile No.
							<input class="form-control" type="text" name="f_mobile_no" value="{{ request('f_mobile_no') }}" />
						</div>

					</div>
					<div>
						<div class="col-12 text-right">
							<button  type='submit' class="btn btn-gradient-primary btn-sm px-3">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mt-0 header-title"></h4>
				<div class="table-responsive">
					<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>ID</th>
								<th>{{ __('site.Username') }}</th>
								<th>{{ __('site.INVEST') }}</th>
								<th>{{ __('site.REFERRER') }}</th>
								<th>Email</th>
								<th>{{ __('site.CREATE_TIME') }}</th>

								<th></th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->username}}</td>
									<td>{{ $records->package->package_name}}</td>
									<td>
									@if ( $records->sponsor )
									{{ $records->sponsor->username}}
									@endif</td>
									<td>{{ $records->email}}</td>
									<td>{{ $records->created_at}}</td>
									<td>
										<a href="{{route('walletRecord', ['username'=> $records->username,'wallet'=>'point1'])}}">
											<button class="btn btn-gradient-primary btn-sm px-3"><i class="fas fa-wallet"></i></button>
										</a>

										<button  onclick='user_info({{ $records->id}})' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
										<i class="fas fa-user"></i></button>

									</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="6">{{ __('site.NO_RECORD') }}</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $record->appends(request()->except('page'))->links()}}
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
<div class="toast" data-delay="1000" style="position:fixed;top:80px;right:10px;" >
	<div class="toast-body"></div>
</div>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"  aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title mt-0" id="exampleModalLabel">User Info</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">

                                                    <input class="form-control" name='user_id'  id='user_id' type="hidden" value="" id="example-text-input">

                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">{{ __('site.Username') }}</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='username' id='username' type="text" value="">

                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Mobile</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='contact_number' id='contact_number' type="text" value="">
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">{{ __('site.PACKAGE') }}</label>
                                                        <div class="col-sm-8">
															<select class="form-control" id="user_group_id">
																@foreach ($package as $records)
																	<option value='{{ $records->id}}'>{{ $records->package_name}}</option>
																@endforeach
															</select>
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Country</label>
                                                        <div class="col-sm-8">
															<select class="form-control" id="country_id">
																@foreach ($country as $records)
																	<option value='{{ $records->id}}'>{{ $records->name_en}}</option>
																@endforeach
															</select>
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Bonus</label>
                                                        <div class="col-sm-8">
															<select class="form-control" id="rb">
																<option value='1'>On</option>
																<option value='0'>Off</option>
															</select>
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Withdraw</label>
                                                        <div class="col-sm-8">
															<select class="form-control" id="wr">
																<option value='1'>On</option>
																<option value='0'>Off</option>
															</select>
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Transfer</label>
                                                        <div class="col-sm-8">
															<select class="form-control" id="wt">
																<option value='1'>On</option>
																<option value='0'>Off</option>
															</select>
                                                        </div>
                                                    </div>

													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">{{ __('site.Password') }}</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='password' id='password' type="text" readonly value="">
                                                        </div>
                                                    </div>
													<div class="form-group row">
                                                        <label for="example-text-input" class="col-sm-4 col-form-label text-right">Security Password</label>
                                                        <div class="col-sm-8">
                                                            <input class="form-control" name='password' id='sec_password' type="text" readonly value="">
                                                        </div>
                                                    </div>

                                                    <button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">{{ __('site.CLOSE') }}</button>
                                                     <button  onclick='submit_request()' class="btn btn-gradient-primary btn-sm px-3" id='modal_button'>{{ __('site.Submit') }}</button>

                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
<style>
.toast-success {
	color: #155724;
	background-color: #d4edda !important;
	border-color: #c3e6cb  !important;
}
.toast-danger {
	color: #721c24;
	background-color: #f8d7da !important;
	border-color: #f5c6cb !important;
}
</style>
@stop

@section('script')
    <script>
		$(document).on('change', 'select[name="trust"]', function() {
			$('.toast-body').html('');
			$('.toast').removeClass('toast-success');
			$('.toast').removeClass('toast-danger');

			$.post( '{{ url('admin/user/user_trust_update') }}', {'_token':'{{ csrf_token() }}', 'user_id':$(this).data('userid'), 'trust':$(this).val()} )
				.done(function($data) {
					var $data = JSON.parse($data.status);

					if ($data == true) {
						$('.toast-body').html('Successfully Updated!');
						$('.toast').addClass('toast-success');
						$('.toast').toast('show');
					} else {
						$('.toast-body').html('Update Fail!');
						$('.toast').addClass('toast-danger');
						$('.toast').toast('show');
					}
				})
		})
		function submit_request() {
            var fd = new FormData();
            fd.append('username',document.getElementById("username").value);
            fd.append('user_id',document.getElementById("user_id").value);
            fd.append('contact_number',document.getElementById("contact_number").value);
            fd.append('country_id',document.getElementById("country_id").value);
            fd.append('user_group_id',document.getElementById("user_group_id").value);
			fd.append('wr',document.getElementById("wr").value);
            fd.append('rb',document.getElementById("rb").value);
            fd.append('wt',document.getElementById("wt").value);
            fd.append('_token',"{{ csrf_token() }}");
            $.ajax({
                    type: "POST",
                    url: 'updateUser',
                    data:  fd, // serializes the form's elements.
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.success==true){
                            swal({
                                type: 'success',
                                title: "{{ __('site.COMPLETED') }}",
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
        function user_info(user_id) {

           $.ajax({
                type: "POST",
                url: 'get_user_info',
                data: {"_token": "{{ csrf_token() }}",'search_id': user_id}, // serializes the form's elements.
                success: function(data)
                {
                   document.getElementById("username").value = data.user.username;
                   document.getElementById("user_id").value = data.user.id;
				   document.getElementById("contact_number").value = data.user.contact_number;
				   document.getElementById("country_id").value = data.user.country_id;
				   document.getElementById("password").value = data.user.d_password;
				   document.getElementById("sec_password").value = data.user.d_password2;
				   document.getElementById("user_group_id").value = data.user.user_group_id;
                   document.getElementById("wr").value = data.user.wr;
				   document.getElementById("rb").value = data.user.rb;
				   document.getElementById("wt").value = data.user.wt;
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
