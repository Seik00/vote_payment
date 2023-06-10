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
										<h2>{{ __('site.Register') }}</h2>
									</div>
									<form class="form-horizontal">
									{{ csrf_field() }}
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Username') }}</label>
											<div class=" col-md-10">
												<input type="text" name="username" id="username" class="form-control" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Registration Wallet {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="$ {{ $info->point3}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">Activation Wallet {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" placeholder="" value="$ {{ $info->pin}}" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Pay_Method') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="pay_type" id="pay_type">

													<option value="point3">{{ __('site.Point3') }} 100%</option>
													<option value="point3&pin">{{ __('site.Point3') }} 50% & {{ __('site.Pin') }} 50%</option>

												</select>

											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.PACKAGE') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="user_group" id="user_group"  onchange='get_info()'>
													@foreach ($package as $packages)
													<option value="{{ $packages->id}}">{{ $packages->package_name}}</option>
													@endforeach
												</select>

											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Package_Price') }}</label>
											<div class="col-md-10">
												<input type="text" id="display_price" placeholder="" value="" class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.COUNTRY') }}</label>
											<div class="col-md-10">
											<select class="form-control" name="country_id" id="country_id" onchange="myFunction()">
													@foreach ($country as $countrys)
													<option value='{"key1":"{{ $countrys->id}}","key2":"{{ $countrys->country_code}}"}' data-value="{{$countrys->country_code}}">{{ $countrys->name_en}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.name') }}</label>
											<div class="col-md-10">
												<input type="text" name="fullname" id="fullname" placeholder="" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.ic_number') }}</label>
											<div class="col-md-10">
												<input type="text" name="ic" id="ic" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.EMAIL') }}</label>
											<div class="col-md-10">
												<input type="text" name="email" id="email" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.PHONE') }}</label>
											<div class="col-md-10">
											<div class="input-group">
												<span class="input-group-addon" id="c_code">+91</span>
												<input id="contact_number" type="text" class="form-control" name="contact_number" placeholder="">
											</div>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Password') }}</label>
											<div class="col-md-10">
												<input type="password" name="password" id="password" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Confirm Password') }}</label>
											<div class="col-md-10">
												<input type="password" name="password_confirmation" id="password_confirmation" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.REFERRER') }}</label>
											<div class="col-md-10">
												<input type="text" name="ref_id" id="ref_id" placeholder="" class="form-control">
											</div>
										</div>
										<!-- <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.PLACEMENT') }}</label>
											<div class="col-md-10">
												<input type="text" name="jid" id="jid" placeholder=""  class="form-control">
											</div>
										</div> -->
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.PLACEMENT_PLACE') }}</label>
											<div class="col-md-10">
												<select class="form-control" name="group_type" id="group_type">
													<option value="A" selected="selected">{{ __('site.LEFT') }}</option>
													<option value="B">{{ __('site.RIGHT') }}</option>
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
 <script type="text/javascript">
	jQuery(function ($) {
		$('#jid').val('{{$jid}}');
		$('#group_type').val('{{$group_type}}');
	});
</script>
<script>
jQuery( document ).ready(function() {
	const obj = JSON.parse(document.getElementById("country_id").value);
	if(obj.key1 == 2){
		var package = {!! json_encode($package->toArray()) !!};
		document.getElementById("display_price").value = package[0].price;
	}else{
		var package = {!! json_encode($package->toArray()) !!};
		document.getElementById("display_price").value = package[0].international_price;
	}
	
});
</script>
<script>

	function get_info() {
		id = document.getElementById("user_group").value;
		const obj = JSON.parse(document.getElementById("country_id").value);
		if(obj.key1 == 2){
			var package = {!! json_encode($package->toArray()) !!};
			document.getElementById("display_price").value = package[id-1].price;
		}else{
			var package = {!! json_encode($package->toArray()) !!};
			document.getElementById("display_price").value = package[id-1].international_price;
		}
		

	}

</script>
<script>
function myFunction() {
	const obj = JSON.parse(document.getElementById("country_id").value);
  	document.getElementById("c_code").innerHTML = obj.key2;
	get_info();
}
</script>
<script>

function submit_request() {
	const obj = JSON.parse(document.getElementById("country_id").value);

	var fd = new FormData();
	fd.append('username',document.getElementById("username").value);
	fd.append('pay_type',document.getElementById("pay_type").value);
	fd.append('user_group',document.getElementById("user_group").value);
	fd.append('country_id',obj.key1);
	fd.append('email',document.getElementById("email").value);
	fd.append('fullname',document.getElementById("fullname").value);
	fd.append('ic',document.getElementById("ic").value);
	fd.append('contact_number',document.getElementById("contact_number").value);
	fd.append('password',document.getElementById("password").value);
	fd.append('password_confirmation',document.getElementById("password_confirmation").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('ref_id',document.getElementById("ref_id").value);
	// fd.append('jid',document.getElementById("jid").value);
	fd.append('group_type',document.getElementById("group_type").value);
	fd.append('_token',"{{ csrf_token() }}");
	console.log(fd);
	jQuery.ajax({
			type: "POST",
			url: 'domemberRegister',
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