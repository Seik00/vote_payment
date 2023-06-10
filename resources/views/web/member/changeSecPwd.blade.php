<!-- <h1>{{ $user->username }}</h1> -->
@extends('layouts.header')

@section('content')

<?php
$f_trust = request('f_trust');

if ($f_trust == '') {
    $f_trust = '-1';
}
?>
		<div class="main-container">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="box-widget widget-module">
							<div class="widget-container">
								<div class=" widget-block">
									<div class="page-header">
										<h2>Update Password</h2>
									</div>
									<div class="full-tab-container">
										<ul class="main-tab nav nav-tabs">
											<li class="active"><a href="#home" data-toggle="tab">{{ __('site.Change Password') }} </a>
											</li>
											<li style="padding-left:15px"><a href="#profile" data-toggle="tab"><i class="fa icon-faces-users-04"></i> {{ __('site.Change_Sec_Pwd') }} </a>
											</li>
										</ul>

										<div class="main-tab-content tab-content" style="margin: 0px 0px">
											<div class="tab-pane active" id="home">
											<form class="form-horizontal">
												{{ csrf_field() }}
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.Current_Pwd') }}</label>
														<div class="col-md-10">
															<input type="password" name="old_password" id="old_password" placeholder="" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.New_Pwd') }}</label>
														<div class="col-md-10">
															<input type="password" name="password" id="password" placeholder="" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.Confirm_New_Pwd') }}</label>
														<div class="col-md-10">
															<input type="password" name="password_confirmation" id="password_confirmation" placeholder="" class="form-control">
														</div>
													</div>
												
													<div class="form-group">
														<label class="col-md-2 control-label">&nbsp;</label>
														<div class="col-md-8">
															<div class="form-actions">
																<button type="button" onclick='submit_password()' class="btn btn-primary">{{ __('site.Submit') }}</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane" id="profile">
											<form class="form-horizontal">
												{{ csrf_field() }}
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.Current_Sec_Pwd') }}</label>
														<div class="col-md-10">
															<input type="password" name="sec_password" id="sec_password" placeholder="" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.New_Sec_Pwd') }}</label>
														<div class="col-md-10">
															<input type="password" name="new_sec_password" id="new_sec_password" placeholder="" class="form-control">
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.Confirm_New_Sec_Pwd') }}</label>
														<div class="col-md-10">
															<input type="password" name="new_sec_password_confirmation" id="new_sec_password_confirmation" placeholder="" class="form-control">
														</div>
													</div>
												
													<div class="form-group">
														<label class="col-md-2 control-label">&nbsp;</label>
														<div class="col-md-8">
															<div class="form-actions">
																<button type="button" onclick='submit_request()' class="btn btn-primary">{{ __('site.Submit') }}</button>
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		@stop
		
 @section('script')
 <script>

function submit_password() {
	
	var fd = new FormData();
	
	fd.append('old_password',document.getElementById("old_password").value);
	fd.append('password',document.getElementById("password").value);
	fd.append('password_confirmation',document.getElementById("password_confirmation").value);
	fd.append('_token',"{{ csrf_token() }}");
	console.log(fd);
	jQuery.ajax({ 
			type: "POST",
			url: 'doChgPwd',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
                console.log(data);
				if(data.code==0){
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
<script>

function submit_request() {
	
	var fd = new FormData();
	
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('password',document.getElementById("new_sec_password").value);
	fd.append('password_confirmation',document.getElementById("new_sec_password_confirmation").value);
	fd.append('_token',"{{ csrf_token() }}");
	console.log(fd);
	jQuery.ajax({ 
			type: "POST",
			url: 'dochgSecPwd',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
                console.log(data);
				if(data.code==0){
					swal({title: "Operation Success", type: "success"},
						function(){ 
							location.reload();
						}
					);   
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