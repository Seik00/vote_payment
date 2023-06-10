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
							<th>
								ID
								</th>
								<th>{{ __('site.Username') }}</th>
								<th>{{ __('site.PACKAGE') }}</th>
								<th>
								{{ __('site.Amount') }}
								</th>
								<th>
								{{ __('site.WALLET') }}
								</th>
								<th>
								{{ __('site.PURCHASE') }}/{{ __('site.UPGRADE') }}
								</th>
								<th>
								{{ __('site.CREATE_TIME') }}
								</th>
								<th>{{ __('site.REMARK') }}</th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->user->username}}</td>
									<td>{{ $records->package->package_name}}</td>
									<td>{{ $records->pay}}</td>
									<td>USD</td>
									@if ( $records->pay == $records->price )
									<td>{{ __('site.PURCHASE') }}</td>
									@else
									<td>{{ __('site.UPGRADE') }}</td>
									@endif
									<td>{{ $records->created_at}}</td>
									<td>
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
				<h5 class="modal-title mt-0" id="exampleModalLabel">{{ __('site.ADJUST_WALLET') }}</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.Username') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text"  id="username" value="" />
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.WALLET') }} :</div>
						<div class="col-7">
							<select id='wallet' clasee="form-control">
								@foreach ($wallet as $records)
								<option value="{{ $records['found_type']}}">{{ $records['id']}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.ADJUST_WALLET') }} :</div>
						<div class="col-7">
							<select id='act' clasee="form-control">
								<option value="+">+</option>
								<option value="-">-</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.Amount') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text"  id="amount" value="" />
						</div>
					</div>
					
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.REMARK') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text"  id="remark" value="" />
						</div>
					</div>
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

        function submit_request() {
			var fd = new FormData();
            fd.append('wallet',document.getElementById("wallet").value);
            fd.append('username',document.getElementById("username").value);
            fd.append('amount',document.getElementById("amount").value);
			fd.append('act',document.getElementById("act").value);
            fd.append('remark',document.getElementById("remark").value);
            fd.append('_token',"{{ csrf_token() }}");
            $.ajax({
                    type: "POST",
                    url: 'changeWallet',
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
