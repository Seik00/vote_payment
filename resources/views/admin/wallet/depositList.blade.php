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
						<div class="col-6 mb-2">
							<div class="row">
								<div class="col-6">
									<input class="form-control form-control-date" type="date" name="from" value="{{ request('from') }}" >
								</div>
								<div class="col-6">
									<input class="form-control form-control-date" type="date" name="to" value="{{ request('to') }}" >
								</div>
							</div>
						</div>
					</div>
					<div>
						<div class="col-12 text-right">
							<button  type='submit' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.SEARCH') }}</button>
							<a target='_blank' href = "{{route('exportDeposit')}}?username={{ request('username') }}&from={{ request('from') }}&to={{ request('to') }}"><button  type='button' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.EXPORT') }}</button></a>

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
								<th>{{ __('site.Account Name') }}</th>
								<th>{{ __('site.Amount') }}</th>
								<th>{{ __('site.PAY_Amount') }}</th>
								<th>{{ __('site.BANNER') }}</th>
								<th>{{ __('site.STATUS') }}</th>
								<th>{{ __('site.CREATE_TIME') }}</th>
								<th>{{ __('site.REMARK') }}</th>
							</tr>
						</thead>
						<tbody>
							@if ( count($record) > 0 )

								@foreach ($record as $records)
								<tr>
									<td>{{ $records->id}}</td>
									<td>{{ $records->user->username}}</td>
									<td>{{ $records->system_bank->bank_name}}<br>
									{{ $records->system_bank->bank_user}}<br>
									{{ $records->system_bank->bank_number}}<br>
									{{ $records->system_bank->branch}}<br></td>
									<td>USD {{ $records->amount}}</td>
									<td>{{ $records->country->short_form}} {{ $records->pay_amount}}</td>
									<td>
										@if ( count($records->uploaded_file) > 0 )
										<a target="_blank" href="{{ $records->uploaded_file[0]->public_image_path }}"> <img src="{{ $records->uploaded_file[0]->public_image_path }}" width="150px" height="150px"></a>
										@endif
									</td>
									<td>{{ $records->status_remark}}</td>
									<td>{{ $records->created_at}}</td>
									<td>
										@if ( $records->status == 0 )
											<button  onclick="submit_request({{ $records->id}},'APPROVE')" class="btn btn-gradient-primary btn-sm px-3">{{ __('site.APPROVE') }}</button>
											<button onclick="submit_request({{ $records->id}},'REJECT')" class="btn btn-danger btn-sm px-3">{{ __('site.REJECTED') }}</button>
										@endif
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

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

<script>
	$(document).on('click', '#deposit_info_submit', function() {
		var $date = $('#bank_receipt_date').val(),
			$time = $('#bank_receipt_time').val(),
			$deposit_id = $('#deposit_id').html();

		if ($deposit_id != '' && $date != '' && $time != '') {
			$('#deposit_info_submit').prop('disabled', true);

			$.post('{{ url('admin/point/save_deposit_info') }}', {'deposit_id':$deposit_id, 'date': $date, 'time': $time, '_token': "{{ csrf_token() }}"})
				.done(function($data) {
					if ($data.success == false) {
						alert('Error: Invalid date time value');
					} else {
						$('.bs-example-modal-lg').modal('hide');
					}
				})
				.fail(function() {
					alert('Error: Invalid date time value');
				})
				.always(function() {
					$('#deposit_info_submit').prop('disabled', false);
				});
		} else {
			alert('Bank receipt date time cannot empty!');
		}
	})
</script>
    <script>

        function submit_request(id,action) {
			var fd = new FormData();
            fd.append('id',id);
            fd.append('action',action);
            fd.append('_token',"{{ csrf_token() }}");
            $.ajax({
                    type: "POST",
                    url: 'depositControl',
                    data:  fd, // serializes the form's elements.
                    processData: false,
                    contentType: false,
                    success: function(data)
                    {
                        if(data.success==true){
                            swal({
                                type: '',
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
