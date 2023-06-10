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
								<th>{{ __('site.Username') }}</th>
								<th>{{ __('site.TITLE') }}</th>
								<th>{{ __('site.CONTENT') }}</th>
								<th>{{ __('site.REPLY') }}</th>
								<th>{{ __('site.CREATE_TIME') }}</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->user->username}}</td>
									<td>{{ $records->title}}

									@if(!$records->rebody)
										<br>
										<span class="badge badge-soft-success">NEW</span>
									@endif

									</td>
									<td>{{ $records->body}}</td>
									<td>{{ $records->rebody}}</td>
									<td>{{ $records->created_at}}</td>
									<td>
										<button  onclick='get_info({{ $records->id}})' class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">
										{{ __('site.REPLY') }}
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
					<label for="promotion_rate" class="col-sm-4 col-form-label text-right">{{ __('site.TITLE') }}</label>
					<div class="col-sm-8">
						<input class="form-control" name='title' id='title' type="text" value="" readonly>
						<input class="form-control" name='id' id='id' type="hidden" value="">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12">
						<label for="sort_order" class=" text-right">{{ __('site.CONTENT') }}</label><br>
						<textarea id='body' class="form-control" style='height: 300px;'  readonly></textarea>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-12">
						<label for="sort_order" class=" text-right">{{ __('site.REPLY') }} {{ __('site.CONTENT') }}</label><br>
						<textarea id='rebody' class="form-control" style='height: 300px;' ></textarea>
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
			url: 'ticketInfo',
			data: {"_token": "{{ csrf_token() }}",'id': id}, // serializes the form's elements.
			success: function(data)
			{
				document.getElementById("id").value =  data.id;
				document.getElementById("title").value =  data.title;
				document.getElementById("body").value =  data.body;
				document.getElementById("rebody").value =  data.rebody;
			},error:function(error)
				{
					if(error.status === 401){
						if(!alert('Unauthorized action.')){window.location.reload()};
				}
				}
		});
	}else{
		document.getElementById("id").value = '';
		document.getElementById("title").value = '';
		document.getElementById("language").value = 'cn';
		document.getElementById("news_type").value = '1';
		document.getElementById("remark").value = '';
		document.getElementById("is_display").value = 1;
	}

}
function submit_request() {
	var fd = new FormData();
	fd.append('id',document.getElementById("id").value);
	fd.append('rebody',document.getElementById("rebody").value);
	fd.append('_token',"{{ csrf_token() }}");
	$.ajax({
			type: "POST",
			url: 'ticketControl',
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
