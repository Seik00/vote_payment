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
										<h2>{{ __('site.Deposit') }}</h2>
									</div>
									<form class="form-horizontal" >
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Amount') }}</label>
											<div class=" col-md-10">
												<input type="text" name="amount" id="amount" class="form-control" placeholder="">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Certificate') }}</label>
											<div class="col-md-10">
												<input type="file" id="file" name="file">
											</div>
										</div>
										<div class="form-group"  style="display:none;">
											<label class="col-md-2 control-label">system bank</label>
											<div class="col-md-10">
												<input type="text" id="system_bank_id" name="system_bank_id" value='1' class="form-control" value="1">
											</div>
										</div>
										<div class="form-group" style="display:none;">
											<label class="col-md-2 control-label">country</label>
											<div class="col-md-10">
											<input type="text" id="country_id" name="country_id" value="{{$info->country_id}}"  class="form-control" readonly>
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Security_Password') }}</label>
											<div class="col-md-10">
												<input type="password" value="sec_password" id="sec_password"  class="form-control" placeholder="">
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
						<div class="box-widget widget-module">
                                <div class="widget-container">
                                    <div class="widget-block">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('site.BANK_NAME') }}</th>
                                                        <th>{{ __('site.BANK_USER') }}</th>
                                                        <th>{{ __('site.BANK_NUMBER') }}</th>
                                                        <th>{{ __('site.BRANCH') }}</th>
                                                        <th>{{ __('site.SWIFT_CODE') }}</th>
                                                        <th>{{ __('site.CREATE_TIME') }}</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    @if ( count($bank_info) > 0 )
                                                        @foreach ($bank_info as $bank_infos)
                                                        <tr>
                                                            <td>{{ $bank_infos->bank_name}}</td>
                                                            <td>{{ $bank_infos->bank_user}}</td>
                                                            <td>{{ $bank_infos->bank_number}}</td>
                                                            <td>{{ $bank_infos->branch}}</td>
                                                            <td>{{ $bank_infos->swift_code}}</td>
                                                            <td>{{ $bank_infos->created_at}}</td>
                                                        </tr>
                                                        @endforeach
                                                        @else
                                                        <tr>
                                                            <td colspan="6">{{ __('site.NO_RECORD') }}</td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
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
<script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
<script src="/assets/jstree/dist/jstree.min.js"></script>
<script  type="text/javascript">

var doucument_id;
function upload_file() {
	var fd = new FormData();
	var files = $('#file')[0].files[0];
	fd.append('file',files);
	fd.append('_token',"{{ csrf_token() }}");
	console.log(files);
	jQuery.ajax({ 
			type: "POST",
			url: 'uploadFile',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
                console.log(data);
				if(data.code==0){
					submit_request(data.data);
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

function submit_request(doucument_id) {
	console.log(doucument_id);
	var fd = new FormData();
	fd.append('amount',document.getElementById("amount").value);
	fd.append('document',doucument_id);
	fd.append('system_bank_id',document.getElementById("system_bank_id").value);
	fd.append('country_id',document.getElementById("country_id").value);
	fd.append('sec_password',document.getElementById("sec_password").value);
	fd.append('_token',"{{ csrf_token() }}");
	jQuery.ajax({ 
			type: "POST",
			url: 'dodeposit',
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