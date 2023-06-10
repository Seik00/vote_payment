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
				<h4 class="mt-0 header-title"></h4>
				<div class="table-responsive">
					<table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
						<thead>
							<tr>
							<th>Username</th>
							<th>IC</th>
                            <th>Address</th>
                            <th>Postcode</th>
                            <th>State</th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->user->username}}</td>
                                    <td>{{ $records->ic}}</td>
									<td>{{ $records->address}}</td>
									<td>{{ $records->poscode}}</td>
									<td>{{ $records->state}}</td>
									
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
