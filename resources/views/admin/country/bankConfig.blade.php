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
				<button  onclick='get_info(0)' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
										{{ __('site.Create') }}
						</button>
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
								<th>{{ __('site.BANK_NAME') }}</th>
								<th>{{ __('site.BANK_USER') }}</th>
								<th>{{ __('site.BANK_NUMBER') }}</th>
								<th>{{ __('site.BRANCH') }}</th>
								<th>SWIFT CODE</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->country->name_en}}</td>
									<td>{{ $records->bank_name}}</td>
									<td>{{ $records->bank_user}}</td>
									<td>{{ $records->bank_number}}</td>
									<td>{{ $records->branch}}</td>
									<td>{{ $records->swift_code}}</td>
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
				<h5 class="modal-title mt-0" id="exampleModalLabel">{{ __('site.EDIT') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input class="form-control" id='bank_id' type="hidden" value="">
				<div class="form-group row">
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">{{ __('site.COUNTTRY') }}</label>
					<div class="col-sm-8">
						<select id='bank_country' class="form-control">
							@foreach ($country as $records)
								<option value="{{ $records->id}}">{{$records->name_en}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.BANK_NAME') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='bank_name' id='bank_name' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.BANK_USER') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='bank_user' id='bank_user' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.BANK_NUMBER') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='bank_number' id='bank_number' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">{{ __('site.BRANCH') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='branch' id='branch' type="text" value="">
					</div>
				</div>
				<div class="form-group row">
					<label for="file" class="col-sm-4 col-form-label text-right">SWIFT CODE</label>
					<div class="col-sm-8">
						<input class="form-control" name='swift_code' id='swift_code' type="text" value="">
					</div>
				</div>
				<button class="btn btn-danger btn-sm px-3" data-dismiss="modal" aria-label="Close">{{ __('site.CLOSE') }}</button>
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
                url: 'bankInfo',
                data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
                success: function(data)
                {
					document.getElementById("bank_id").value = data.id;
					document.getElementById("bank_country").value = data.bank_country;
					document.getElementById("bank_number").value = data.bank_number;
					document.getElementById("branch").value = data.branch;
					document.getElementById("swift_code").value = data.swift_code;
					document.getElementById("bank_user").value = data.bank_user;
                   	document.getElementById("bank_name").value = data.bank_name;
                },error:function(error)
                    {
                        if(error.status === 401){
                        if(!alert('Unauthorized action.')){window.location.reload()};
                       }
                    }
            });
	}else{
		document.getElementById("bank_id").value = '';
		document.getElementById("bank_country").value = '';
		document.getElementById("bank_number").value = '';
		document.getElementById("branch").value = '';
		document.getElementById("swift_code").value = '';
		document.getElementById("bank_user").value = '';
       	document.getElementById("bank_name").value = '';
	}
}

function submit_request() {

	var fd = new FormData();
	fd.append('bank_id',document.getElementById("bank_id").value);
	fd.append('bank_country',document.getElementById("bank_country").value);
	fd.append('bank_number',document.getElementById("bank_number").value);
	fd.append('branch',document.getElementById("branch").value);
	fd.append('swift_code',document.getElementById("swift_code").value);
	fd.append('bank_user',document.getElementById("bank_user").value);
	fd.append('bank_name',document.getElementById("bank_name").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'bankControl',
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
