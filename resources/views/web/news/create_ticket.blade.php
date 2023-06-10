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
										<h2>{{ __('site.Customer_Service') }}</h2>
									</div>
									<form class="form-horizontal">
									{{ csrf_field() }}
                                        <div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.TITLE') }}</label>
											<div class="col-md-10">
												<input type="text" name="title " id="title" placeholder="" class="form-control">
											</div>
										</div>
										<div class="form-group">
											<label class="col-md-2 control-label">{{ __('site.CONTENT') }}</label>
											<div class=" col-md-10">
												<input type="text" name="body " id="body" class="form-control" placeholder="">
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
	fd.append('title',document.getElementById("title").value);
	fd.append('body',document.getElementById("body").value);
	fd.append('_token',"{{ csrf_token() }}");
	
	$.ajax({ 
			type: "POST",
			url: 'docreateTicket',
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