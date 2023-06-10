@extends('admin.layouts.header')

@section('content')

<?php
$f_trust = request('f_trust');

if ($f_trust == '') {
    $f_trust = '-1';
}
?>
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<form action='{{  Request::url() }}' method='GET'>
					<div class="row">
						<div class="col-6 mb-2">
						{{ __('site.Username') }}
							<input class="form-control" type="text" name="username" value="{{ request('username') }}" />
						</div>

					</div>
					<div>
						<div class="col-12 text-right">
							<button  type='submit' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.SEARCH') }}</button>

                        </div>
					</div>
				</form>

			</div>
		</div>
	</div>
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<h4 class="mt-0 header-title"></h4>
				<div class="table-responsive">
					<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
								<th>ID</th>
								<th>{{ __('site.COUNTTRY') }}</th>
								<th>{{ __('site.CURRENCY') }}</th>
								<th>{{ __('site.BUY') }}</th>
								<th>{{ __('site.SELL') }}</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->name_en}}</td>
									<td>{{ $records->short_form}}</td>
									<td>{{ $records->buy}}</td>
									<td>{{ $records->sell}}</td>
									<td>
									<button  onclick='get_info({{ $records->id}})' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
										{{ __('site.EDIT') }}
										</button>
									</td>
								</tr>
								@endforeach
							@else
								<tr>
									<td colspan="6">{{ __('site.NO_RECORD') }}</td>
								</tr>
							@endif
						</tbody>
					</table>
					{{ $record->appends(request()->except('page'))->links()}}
				</div>
			</div>
		</div>
	</div> <!-- end col -->
</div> <!-- end row -->
<div class="toast" data-delay="1000" style="position:fixed;top:80px;right:10px;" >
	<div class="toast-body"></div>
</div>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title mt-0" id="exampleModalLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">{{ __('site.COUNTTRY') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='title' id='name_en' type="text" value="" readonly>
						<input class="form-control" name='title' id='id' type="hidden" value="">

					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.CURRENCY') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='title' id='short_form' type="text" value="" >
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">Display</label>
					<div class="col-sm-8">
						<select id='status' name="status" class="form-control">
								<option value="1">On</option>
								<option value="0">Off</option>
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.BUY') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='title' id='buy' type="text" value="" >
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.SELL') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='title' id='sell' type="text" value="" >
					</div>
				</div>
				<button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">Close</button>
					<button onclick='submit_request()' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.Submit') }}</button>

			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
.toast-success {
	color: #155724;
	background-color: #d4edda !important;
	border-color: #c3e6cb  !important;
}
.toast-danger {
	color: #721c24;
	background-color: #f8d7da !important;
	border-color: #f5c6cb !important;
}
</style>
@stop

@section('script')
<script>
function get_info(id) {
	if(id){
		$.ajax({
			type: "GET",
			url: 'countryInfo',
			data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
			success: function(data)
			{
				document.getElementById("id").value = data.id;
				document.getElementById("name_en").value = data.name_en;
				document.getElementById("short_form").value = data.short_form;
				document.getElementById("buy").value = data.buy;
				document.getElementById("sell").value = data.sell;
				document.getElementById("status").value = data.status;

			},error:function(error)
				{
					if(error.status === 401){
						if(!alert('Unauthorized action.')){window.location.reload()};
				}
				}
		});
	}else{
		document.getElementById("id").value = '';
		document.getElementById("name_en").value ='';
		document.getElementById("short_form").value = '';
		document.getElementById("buy").value = '';
		document.getElementById("sell").value = '';
		document.getElementById("status").value = '';
	}

}
function submit_request() {
	var fd = new FormData();
	fd.append('id',document.getElementById("id").value);
	fd.append('short_form',document.getElementById("short_form").value);
	fd.append('buy',document.getElementById("buy").value);
	fd.append('sell',document.getElementById("sell").value);
	fd.append('status',document.getElementById("status").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'countryControl',
			data:  fd, // serializes the form's elements.
			processData: false,
			contentType: false,
			success: function(data)
			{
				if(data.success==true){
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
@stop
