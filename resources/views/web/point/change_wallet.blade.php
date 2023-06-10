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
										<h2>{{ __('site.Change_Wallet') }}</h2>
									</div>
									<form class="form-horizontal" autocomplete="off">
									{{ csrf_field() }}
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Point1') }} {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" value="$ {{ $info->point1}}" class="form-control" readonly>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Point2') }} {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" value="$ {{ $info->point2}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.From') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="transfer_type" id="transfer_type">
													
													<option value="point1">{{ __('site.Point1') }}</option>
													<option value="point2">{{ __('site.Point2') }}</option>
													
												</select>
												
											</div>
										</div>		
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.To') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="Activation Wallet" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Amount') }}</label>
											<div class=" col-md-10">
												<input type="number" name="amount" id="amount" class="form-control"onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,''); placeholder="">
											</div>
										</div>
                                      
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Security_Password') }}</label>
											<div class="col-md-10">
												<input type="password" id="sec_password" class="form-control" placeholder="" autocomplete="nope">
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
	fd.append('amount',document.getElementById("amount").value);
	fd.append('transfer_type',document.getElementById("transfer_type").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
    console.log(fd);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({ 
			type: "POST",
			url: 'dochangeWallet',
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