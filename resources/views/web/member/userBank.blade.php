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
										<h2>{{ __('site.Profile_Info') }}</h2>
									</div>
									<div class="full-tab-container">
										<ul class="main-tab nav nav-tabs">
											<li class="active"><a href="#home" data-toggle="tab">{{ __('site.Profile_Info') }} </a>
											</li>
											<li><a href="#profile" data-toggle="tab"><i class="fa icon-faces-users-04"></i> {{ __('site.Bank_Info') }} </a>
											</li>
											<li><a href="#profileImage" data-toggle="tab"><i class="fa icon-faces-users-04"></i> {{ __('site.Profile_Image') }} </a>
											</li>
										</ul>

										<div class="main-tab-content tab-content" style="margin: 0px 0px">
											<div class="tab-pane active" id="home">
											<form class="form-horizontal">
												{{ csrf_field() }}
													<div class="form-group">
														<label class="col-md-2 control-label">NRIC No / Passport No</label>
														<div class="col-md-10">
															@if ( ($profile_info) == null )
															<input type="text" name="ic" id="ic" placeholder="" class="form-control">
															@else
															<input type="text" name="ic" id="ic" value="{{ $profile_info->ic}}" class="form-control">
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Fullname</label>
														<div class="col-md-10">
															@if ( ($profile_info) == null )
															<input type="text" name="fullname" id="fullname" placeholder="" class="form-control">
															@else
															<input type="text" name="fullname" id="fullname" value="{{ $profile_info->fullname}}" class="form-control">
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Mailing Address</label>
														<div class="col-md-10">
															@if ( ($profile_info) == null )
																<input type="text"  name="address" id="address" placeholder="" class="form-control">
																@else
																<input type="text"  name="address" id="address" value="{{ $profile_info->address}}" class="form-control">
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">Postcode</label>
														<div class="col-md-10">
															@if ( ($profile_info) == null )
																<input type="text" name="poscode" id="poscode" placeholder="" class="form-control">
																@else
																<input type="text" name="poscode" id="poscode" value="{{ $profile_info->poscode}}" class="form-control">
															@endif
															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">State</label>
														<div class="col-md-10">
															@if ( ($profile_info) == null )
																<input type="text" name="state" id="state" placeholder="" class="form-control">
																@else
																<input type="text" name="state" id="state" value="{{ $profile_info->state}}" class="form-control">
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">&nbsp;</label>
														<div class="col-md-8">
															<div class="form-actions">
																<button type="button" onclick='submit_profile()' class="btn btn-primary">{{ __('site.Submit') }}</button>
															</div>
														</div>
													</div>
												</form>
											</div>
											<div class="tab-pane" id="profile">
											<form class="form-horizontal">
												{{ csrf_field() }}
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.COUNTRY') }}</label>
														<div class="col-md-10">
															@if ( ($bank_info) == null )
																<select class="form-control" name="country_id" id="country_id">
																	@foreach ($country as $countrys)
																	<option value="{{ $countrys->id}}">{{ $countrys->name_en}}</option>
																	@endforeach
																</select>
															@else
															<select class="form-control" name="country_id" id="country_id">
																<option value="{{ $bank_info->bank_country}}" selected="true" disabled="disabled">{{ $bank_info->country->name_en}}</option>
																@foreach ($country as $countrys)
																<option value="{{ $countrys->id}}">{{ $countrys->name_en}}</option>
																@endforeach
															</select>
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.BANK_NAME') }}</label>
														<div class="col-md-10">
															@if ( ($bank_info) == null )
															<select class="form-control" name="bank_name" id="bank_name">
																<option value="OCBC Bank">OCBC Bank</option>
																<option value="Affin Bank / Affin Islamic Bank">Affin Bank / Affin Islamic Bank</option>
																<option value="Alliance Bank">Alliance Bank</option>
																<option value="Al-Rajhi Banking & Investment Corporation (M) Berhad">Al-Rajhi Banking & Investment Corporation (M) Berhad</option>
																<option value="AmBank">AmBank</option>
																<option value="Bangkok Bank Berhad ">Bangkok Bank Berhad </option>
																<option value="Bank Islam">Bank Islam</option>
																<option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
																<option value="Bank Muamalat">Bank Muamalat</option>
																<option value="Bank Pertanian Malaysia Berhad(Agrobank)">Bank Pertanian Malaysia Berhad(Agrobank)</option>
																<option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
																<option value="Bank of America (M) Berhad">Bank of America (M) Berhad</option>
																<option value="Bank of China (M) Berhad" >Bank of China (M) Berhad</option>
																<option value="BNP Paribas Malaysia Berhad" >BNP Paribas Malaysia Berhad</option>
																<option value="China Construction Bank (M) Berhad" >China Construction Bank (M) Berhad</option>
																<option value="CIMB Bank" >CIMB Bank</option>
																<option value="Citibank" >Citibank</option>
																<option value="Deutsche Bank (M) Berhad" >Deutsche Bank (M) Berhad</option>
																<option value="Hong Leong Bank" >Hong Leong Bank</option>
																<option value="HSBC Bank" >HSBC Bank</option>
																<option value="Industrial and Commercial Bank of China (M) Berhad" >Industrial and Commercial Bank of China (M) Berhad</option>
																<option value="J.P. Morgan Chase Bank" >J.P. Morgan Chase Bank</option>
																<option value="Kuwait Finance House (M)" >Kuwait Finance House (M)</option>
																<option value="Maybank" >Maybank</option>
																<option value="MBSB Bank Berhad " >MBSB Bank Berhad </option>
																<option value="Mizuho Corporate Bank (M) Berhad " >Mizuho Corporate Bank (M) Berhad </option>
																<option value="MUFG Bank (M) Berhad" >MUFG Bank (M) Berhad</option>
																<option value="Public Bank" >Public Bank</option>
																<option value="RHB Bank" >RHB Bank</option>
																<option value="Standard Chartered Bank" >Standard Chartered Bank</option>
																<option value="Sumitomo Mitsui Banking Corporation (M) Berhad" >Sumitomo Mitsui Banking Corporation (M) Berhad</option>
																<option value="United Overseas Bank" >United Overseas Bank</option>

															</select>
															@else
															<select class="form-control" name="bank_name" id="bank_name" >
																<option value="{{ $bank_info->bank_name}}" selected="true" disabled="disabled">{{ $bank_info->bank_name}}</option>
																<option value="OCBC Bank">OCBC Bank</option>
																<option value="Affin Bank / Affin Islamic Bank">Affin Bank / Affin Islamic Bank</option>
																<option value="Alliance Bank">Alliance Bank</option>
																<option value="Al-Rajhi Banking & Investment Corporation (M) Berhad">Al-Rajhi Banking & Investment Corporation (M) Berhad</option>
																<option value="AmBank">AmBank</option>
																<option value="Bangkok Bank Berhad ">Bangkok Bank Berhad </option>
																<option value="Bank Islam">Bank Islam</option>
																<option value="Bank Kerjasama Rakyat Malaysia">Bank Kerjasama Rakyat Malaysia</option>
																<option value="Bank Muamalat">Bank Muamalat</option>
																<option value="Bank Pertanian Malaysia Berhad(Agrobank)">Bank Pertanian Malaysia Berhad(Agrobank)</option>
																<option value="Bank Simpanan Nasional">Bank Simpanan Nasional</option>
																<option value="Bank of America (M) Berhad">Bank of America (M) Berhad</option>
																<option value="Bank of China (M) Berhad" >Bank of China (M) Berhad</option>
																<option value="BNP Paribas Malaysia Berhad" >BNP Paribas Malaysia Berhad</option>
																<option value="China Construction Bank (M) Berhad" >China Construction Bank (M) Berhad</option>
																<option value="CIMB Bank" >CIMB Bank</option>
																<option value="Citibank" >Citibank</option>
																<option value="Deutsche Bank (M) Berhad" >Deutsche Bank (M) Berhad</option>
																<option value="Hong Leong Bank" >Hong Leong Bank</option>
																<option value="HSBC Bank" >HSBC Bank</option>
																<option value="Industrial and Commercial Bank of China (M) Berhad" >Industrial and Commercial Bank of China (M) Berhad</option>
																<option value="J.P. Morgan Chase Bank" >J.P. Morgan Chase Bank</option>
																<option value="Kuwait Finance House (M)" >Kuwait Finance House (M)</option>
																<option value="Maybank" >Maybank</option>
																<option value="MBSB Bank Berhad " >MBSB Bank Berhad </option>
																<option value="Mizuho Corporate Bank (M) Berhad " >Mizuho Corporate Bank (M) Berhad </option>
																<option value="MUFG Bank (M) Berhad" >MUFG Bank (M) Berhad</option>
																<option value="Public Bank" >Public Bank</option>
																<option value="RHB Bank" >RHB Bank</option>
																<option value="Standard Chartered Bank" >Standard Chartered Bank</option>
																<option value="Sumitomo Mitsui Banking Corporation (M) Berhad" >Sumitomo Mitsui Banking Corporation (M) Berhad</option>
																<option value="United Overseas Bank" >United Overseas Bank</option>

															</select>
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.BANK_USER') }}</label>
														<div class="col-md-10">
															@if ( ($bank_info) == null )
																<input type="text"  name="bank_user" id="bank_user" placeholder="" class="form-control">
																@else
																<input type="text"  name="bank_user" id="bank_user" value="{{ $bank_info->bank_user}}" class="form-control">
															@endif
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.BANK_NUMBER') }}</label>
														<div class="col-md-10">
															@if ( ($bank_info) == null )
																<input type="text" name="bank_number" id="bank_number" placeholder="" class="form-control">
																@else
																<input type="text" name="bank_number" id="bank_number" value="{{ $bank_info->bank_number}}" class="form-control">
															@endif
															
														</div>
													</div>
													<div class="form-group">
														<label class="col-md-2 control-label">{{ __('site.BRANCH') }}</label>
														<div class="col-md-10">
															@if ( ($bank_info) == null )
																<input type="text" name="branch" id="branch" placeholder="" class="form-control">
																@else
																<input type="text" name="branch" id="branch" value="{{ $bank_info->branch}}" class="form-control">
															@endif
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
											<div class="tab-pane" id="profileImage">
											<form class="form-horizontal">
												{{ csrf_field() }}
												<div class="form-group">
													<label class="col-md-2 control-label">{{ __('site.Profile_Image') }}</label>
													<div class="col-md-10">
														<input type="file" id="file" name="file">
														
													</div>
												</div>
												
													
												
													<div class="form-group">
														<label class="col-md-2 control-label">&nbsp;</label>
														<div class="col-md-8">
															<div class="form-actions">
																<button type="button" onclick='upload_file()' class="btn btn-primary">{{ __('site.Submit') }}</button>
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
<script src="/assets/jstree/dist/jstree.min.js"></script>
<script  type="text/javascript">
var doucument_id;
function upload_file() {
	var fd = new FormData();
	var files = $('#file')[0].files[0];
	fd.append('file',files);
	fd.append('_token',"{{ csrf_token() }}");
	
	jQuery.ajax({ 
			type: "POST",
			url: 'memberuploadFile',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
                console.log(data);
				if(data.code==0){
					doupload_file(data.data);
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
function doupload_file(doucument_id) {
	
	var fd = new FormData();
	fd.append('icon',doucument_id);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({ 
			type: "POST",
			url: 'doUploadIcon',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
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

function submit_request() {
	
	
	var fd = new FormData();
	fd.append('bank_country',document.getElementById("country_id").value);
	fd.append('bank_name',document.getElementById("bank_name").value);
	fd.append('bank_user',document.getElementById("bank_user").value);
	fd.append('bank_number',document.getElementById("bank_number").value);
	fd.append('branch',document.getElementById("branch").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({ 
			type: "POST",
			url: 'douserBank',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
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

function submit_profile() {
	
	
	var fd = new FormData();
	fd.append('ic',document.getElementById("ic").value);
	fd.append('fullname',document.getElementById("fullname").value);
	fd.append('address',document.getElementById("address").value);
	fd.append('poscode',document.getElementById("poscode").value);
	fd.append('state',document.getElementById("state").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({ 
			type: "POST",
			url: 'updateAddress',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
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