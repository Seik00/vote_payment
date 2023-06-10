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
										<h2>{{ __('site.Transfer') }}</h2>
									</div>
									<form class="form-horizontal">
									{{ csrf_field() }}
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Username') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Point3') }} {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="$ {{ $info->point3}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Pin') }} {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="$ {{ $info->pin}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Amount') }}</label>
											<div class=" col-md-10">
												<input type="text" name="amount" id="amount" class="form-control" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Pay_Method') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="transfer_type" id="transfer_type">
													
													<option value="3">{{ __('site.Point3') }}</option>
													<option value="pin">{{ __('site.Pin') }}</option>
													
												</select>
												
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Security_Password') }}</label>
											<div class="col-md-10">
												<input type="password" id="sec_password" class="form-control" placeholder="">
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
	
		@stop
		
 @section('script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
<script src="/assets/jstree/dist/jstree.min.js"></script>
<script  type="text/javascript">

function submit_request() {
	
	var fd = new FormData();
	fd.append('username',document.getElementById("username").value);
	fd.append('amount',document.getElementById("amount").value);
	fd.append('transfer_type',document.getElementById("transfer_type").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({ 
			type: "POST",
			url: 'dotransfer',
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