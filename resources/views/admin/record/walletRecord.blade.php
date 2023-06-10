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
						<div class="col-4 mb-2">
						{{ __('site.Username') }}
							<input class="form-control" type="text" name="username" value="{{ request('username') }}" readonly/>
						</div>
						<div class="col-4 mb-2">
						{{ __('site.WALLET') }}
						<select id='wallet' name="wallet" class="form-control">
								@foreach ($wallet as $wallets)
								<option value="{{ $wallets['id']}}">
									@if ( Config::get('app.locale') == 'en')
									{{ $wallets['comments_en']}}
									@else
									{{ $wallets['comments_cn']}}
									@endif
								</option>
								@endforeach
							</select>
						</div>
						<div class="col-4 mb-2">
							{{ __('site.Balance') }}
							<input class="form-control" type="text" value="{{ $balance }}" readonly/>
						</div>
					</div>
					<div>
						<div class="col-12 text-right">
							<button  type='submit' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.SEARCH') }}</button>
							<a target='_blank' href = "{{route('exportWallet')}}?username={{ request('username') }}&wallet={{ request('wallet') }}&from={{ request('from') }}&to={{ request('to') }}"><button  type='button' class="btn btn-gradient-primary btn-sm px-3">{{ __('site.EXPORT') }}</button></a>
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
								<th>
								{{ __('site.Amount') }}
								</th>
								<th>
								{{ __('site.Amount') }}
								</th>
								<th>
								{{ __('site.Amount') }}
								</th>
								<th>
								{{ __('site.DETAIL') }}
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
									<td>
									@if ( $records->user )
									{{ $records->user->username}}
									@endif
									</td>
									<td>{{ $records->previous}}</td>
									<td>{{$records->action.' '.$records->found}}</td>
									<td>{{ $records->current}}</td>
									<td>
									@if ( Config::get('app.locale') == 'en')
										{{ $records->detailen}}
									@else
									{{ $records->detail}}
                                    @endif</td>
									<td>{{ $records->created_at}}</td>
									<td></td>
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
