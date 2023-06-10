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
										<h2>{{ __('site.Set_Sec_Pwd') }}</h2>
									</div>
									<form class="form-horizontal">
									{{ csrf_field() }}
                                     
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.New_Sec_Pwd') }}</label>
											<div class="col-md-10">
												<input type="password" name="password" id="password" placeholder="" class="form-control">
											</div>
										</div>
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.Confirm_New_Sec_Pwd') }}</label>
											<div class="col-md-10">
												<input type="password" name="password_confirmation" id="password_confirmation" placeholder="" class="form-control">
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
<script>

function submit_request() {
	
	var fd = new FormData();
	
	fd.append('password',document.getElementById("password").value);
	fd.append('password_confirmation',document.getElementById("password_confirmation").value);
	fd.append('_token',"{{ csrf_token() }}");
	console.log(fd);
	jQuery.ajax({ 
			type: "POST",
			url: 'dosetSecPwd',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{   
                console.log(data);
				if(data.code==0){
					swal({title: "Operation Success", type: "success"},
						function(){ 
							location.replace("{{ route('webIndex')}}");
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