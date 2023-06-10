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
				<!-- <button class="btn btn-gradient-primary btn-sm px-3" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-center">{{ __('site.ADJUST_WALLET') }}</button> -->
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
								<th>转到</th>
								<th>
								{{ __('site.Amount') }}
								</th>
								<th>
								{{ __('site.WALLET') }}
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
									<td>{{ $records->to_user->username}}</td>
									<td>{{ $records->founds}}</td>
									<td>USD</td>
									<td>{{ $records->created_at}}</td>
									<td>
									{{ $records->dis}}
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
   
@stop
