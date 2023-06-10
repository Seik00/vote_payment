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
										<h2>{{ __('site.Withdraw') }}</h2>
									</div>
									<form class="form-horizontal">
									{{ csrf_field() }}
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Amount') }}</label>
											<div class=" col-md-10">
												<input type="number" name="amount" id="amount" min="12.5" oninput="onclickhandler(this)" class="form-control" placeholder="">
												
												<span style="color:red">
													{{ __('site.fees') }}
												</span>
											</div>
											
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.AMOUNT_RECEIVED') }}</label>
											<div class=" col-md-10">
												<input type="number" id="amount_received" class="form-control" placeholder="" readonly>
											</div>
											
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.COUNTRY') }}</label>
											<div class="col-md-10">
											<select class="form-control" name="country_id" id="country_id">
													@foreach ($country as $countrys)
													<option value="{{ $countrys->id}}">{{ $countrys->name_en}}</option>
													@endforeach
												</select>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.BANK_NAME') }} </label>
											<div class="col-md-10">
												<select class="form-control" name="bank_name" id="bank_name">
													<option value="Maybank/Maybank Islamic">Maybank/Maybank Islamic</option>
													<option value="FFIN BANK BERHAD/AFFIN ISLAMIC BANK">AFFIN BANK BERHAD/AFFIN ISLAMIC BANK</option>
													<option value="AL-RAJHI BANKING & INVESTMENT CORP (M) BERHAD">AL-RAJHI BANKING & INVESTMENT CORP (M) BERHAD</option>
													<option value="ALLIANCE BANK MALAYSIA BERHAD">ALLIANCE BANK MALAYSIA BERHAD</option>
													<option value="AmBANK BERHAD">AmBANK BERHAD</option>
													<option value="BANK ISLAM MALAYSIA">BANK ISLAM MALAYSIA</option>
													<option value="BANK KERJASAMA RAKYAT MALAYSIA BERHAD">BANK KERJASAMA RAKYAT MALAYSIA BERHAD</option>
													<option value="BANK MUAMALAT">BANK MUAMALAT</option>
													<option value="BANK OF AMERICA">BANK OF AMERICA</option>
													<option value="BANK OF CHINA (MALAYSIA) BERHAD">BANK OF CHINA (MALAYSIA) BERHAD</option>
													<option value="BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)">BANK PERTANIAN MALAYSIA BERHAD (AGROBANK)</option>
													<option value="BANK SIMPANAN NASIONAL BERHAD">BANK SIMPANAN NASIONAL BERHAD</option>
													<option value="BNP PARIBAS MALAYSIA">BNP PARIBAS MALAYSIA</option>
													<option value="Bangkok Bank Berhad">Bangkok Bank Berhad</option>
													<option value="CHINA CONST BK (M) BHD">CHINA CONST BK (M) BHD</option>
													<option value="CIMB BANK BERHAD">CIMB BANK BERHAD</option>
													<option value="CITIBANK BANK BERHAD">CITIBANK BANK BERHAD</option>
													<option value="CITI BERHAD">CITI BERHAD</option>
													<option value="DEUTSCHE BANK (MSIA) BERHAD">DEUTSCHE BANK (MSIA) BERHAD</option>
													<option value="HONG LEONG BANK">HONG LEONG BANK</option>
													<option value="HSBC BANK MALAYSIA BERHAD">HSBC BANK MALAYSIA BERHAD</option>
													<option value="INDUSTRIAL & COMMERCIAL BANK OF CHINA">INDUSTRIAL & COMMERCIAL BANK OF CHINA</option>
													<option value="J.P. MORGAN CHASE BANK BERHAD">J.P. MORGAN CHASE BANK BERHAD</option>
													<option value="KUAWAIT FINANCE HOUSE (MALAYSIA) BHD">KUAWAIT FINANCE HOUSE (MALAYSIA) BHD</option>
													<option value="MBSB BANK">MBSB BANK</option>
													<option value="MIZUHO BANK (MALAYSIA) BERHAD">MIZUHO BANK (MALAYSIA) BERHAD</option>
													<option value="MUFG BANK (MALAYSIA) BHD">MUFG BANK (MALAYSIA) BHD</option>
													<option value="OCBC BANK (MALAYSIA) BHD">OCBC BANK (MALAYSIA) BHD</option>
													<option value="PUBLIC BANK">PUBLIC BANK</option>
													<option value="RHB BANK">RHB BANK</option>
													<option value="STANDARD CHARTERED BANK">STANDARD CHARTERED BANK</option>
													<option value="SUMITOMO MITSUI BANKING CORPORATION MALAYSIA BHD">SUMITOMO MITSUI BANKING CORPORATION MALAYSIA BHD</option>
													<option value="THE ROYAL BANK OF SCOTLAND BERHAD">THE ROYAL BANK OF SCOTLAND BERHAD</option>
													<option value="UNITED OVERSEAS BANK BERHAD">UNITED OVERSEAS BANK BERHAD</option>
													
												</select>
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.BANK_USER') }} </label>
											<div class="col-md-10">
												<input type="text" name="bank_user" id="bank_user" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.BANK_NUMBER') }}   </label>
											<div class="col-md-10">
												<input type="text" name="bank_number" id="bank_number" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.BRANCH') }}     </label>
											<div class="col-md-10">
												<input type="text" name="branch" id="branch" placeholder="" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Security_Password') }} </label>
											<div class="col-md-10">
												<input type="password" id="sec_password" class="form-control" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">&nbsp;</label>
											<div class="col-md-8">
												<div class="form-actions">
													<button type="button" onclick='submit_request()' class="btn btn-primary">{{ __('site.Submit') }} </button>
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
	fd.append('bank_country',document.getElementById("country_id").value);
	fd.append('bank_name',document.getElementById("bank_name").value);
	fd.append('bank_user',document.getElementById("bank_user").value);
	fd.append('bank_number',document.getElementById("bank_number").value);
	fd.append('branch',document.getElementById("branch").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({ 
			type: "POST",
			url: 'dowithdraw',
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

function onclickhandler(e) {
	var deduct = document.getElementById("amount").value - 1;
	document.getElementById("amount_received").value = deduct.toFixed(2);
}

</script>
@stop