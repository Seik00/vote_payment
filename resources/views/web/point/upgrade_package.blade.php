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
										<h2>{{ __('site.Upgrade_Package') }}</h2>
									</div>
									<form class="form-horizontal" autocomplete="off">
									{{ csrf_field() }}
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.PACKAGE') }}</label>
											<div class=" col-md-10">
												<div class="form-group">
													<ul class="new">
													@foreach ($package as $packages)
													<li class="new2" >
														<input  type="checkbox"  id="cb{{ $packages->id}}" name="check" onclick="onlyOne({{ $packages->id}})"/>
														<label class="new-label" for="cb{{ $packages->id}}">
														<input type="hidden" id="answer" value="{{ $packages->id}}"/>
														<p style="text-align: center;" >@if ( Config::get('app.locale') == 'en')
															{{ $packages->package_name_en}}
															@else
															{{ $packages->package_name}}
															@endif
														</p>
														<div style="text-align: center;">{{ $packages->price}}</div><br/><img src="{{$packages->icon}}" /></label>
													</li>
													@endforeach

													</ul>
												</div>

											</div>
										</div>

										<div class="form-group">
											<label class="col-md-2 control-label">Registration Wallet {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" value="$ {{ $info->point3}}" class="form-control" readonly>
											</div>
										</div>
										<!-- <div class="form-group">
											<label class="col-md-2 control-label">Activation Wallet {{ __('site.Balance') }}</label>
											<div class="col-md-10">
												<input type="text" name="username" id="username" placeholder="" value="$ {{ $info->pin}}" class="form-control" readonly>
											</div>
										</div> -->
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Pay_Method') }}</label>
											<div class=" col-md-10">
												<select class="form-control" name="pay_type" id="pay_type">

													<option value="point3">{{ __('site.Point3') }} 100%</option>
													<!-- <option value="point3&pin">{{ __('site.Point3') }} 50% & {{ __('site.Pin') }} 50%</option> -->

												</select>

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
		<style>
	ul.new {
  list-style-type: none;
}

li.new2 {
  display: inline-block;
}

input[type="checkbox"][id^="cb"] {
  display: none;
}

label.new-label {
  border: 1px solid #fff;
  padding: 10px;
  display: block;
  position: relative;
  margin: 10px;
  cursor: pointer;
}

label.new-label:before {
  background-color: white;
  color: white;
  content: " ";
  display: block;
  border-radius: 50%;
  border: 1px solid grey;
  position: absolute;
  top: -5px;
  left: -5px;
  width: 25px;
  height: 25px;
  text-align: center;
  line-height: 28px;
  transition-duration: 0.4s;
  transform: scale(0);
}

label.new-label img {
  height: 100px;
  width: 100px;
  transition-duration: 0.2s;
  transform-origin: 50% 50%;
}

:checked + label.new-label {
  border-color: #ddd;
}

:checked + label.new-label:before {
  content: "✓";
  background-color: grey;
  transform: scale(1);
}

:checked + label.new-label img {
  transform: scale(0.9);
  box-shadow: 0 0 5px #333;
  z-index: -1;
}

</style>
@stop

 @section('script')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
<script src="/assets/jstree/dist/jstree.min.js"></script>
<script>
$(document).ready(function(){


$('[type="checkbox"]').change(function(){

  if(this.checked){
	 $('[type="checkbox"]').not(this).prop('checked', false);
  }
});

});
</script>

<script  type="text/javascript">
var user_group;
function onlyOne(checkbox) {
	document.getElementById("answer").value = checkbox;
	user_group = checkbox;

	return user_group;
}

function submit_request() {

	var fd = new FormData();
	fd.append('user_group',user_group);
	fd.append('pay_type', document.getElementById("pay_type").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'doupgradePackage',
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