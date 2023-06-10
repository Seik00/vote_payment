@extends('admin.layouts.header')
@section('content')
@if(!$errors->isEmpty())
						<div class="alert alert-danger">
							<ul class="list-unstyled mb-0">
								@foreach($errors->all() as $err)
									<li>{{ $err }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							{{ $message }}
						</div>
					@endif
<div class="row">
	<div class="col-6">
		<div class="card">
			<h3 style="text-align:center">Login Password</h3>
			<div class="card-body">
				<form action="{{ route('updatePwd') }}" method="POST">
					{{ csrf_field() }}
					
				
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.Username') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text" name="username" value="" />
						</div>
					</div>
					<input class="form-control" type="hidden" name="pwd_type" value="pwd" />
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.New Password') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text"  name="password" value="" />
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.Confirm New Password') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text" name="confirm_password" value="" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-3"></div>
						<div class="col-9">
							<button type="submit" class="btn btn-primary">{{ __('site.Submit') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-6">
		<div class="card">
			<h3 style="text-align:center">Security Password</h3>
			<div class="card-body">
				<form action="{{ route('updatePwd') }}" method="POST">
					{{ csrf_field() }}
					
				
					<input class="form-control" type="hidden" name="pwd_type" value="pwd2" />
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.Username') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text" min="0.00" name="username" value="" />
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.New Password') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text"  name="password" value="" />
						</div>
					</div>
					<div class="row">
						<div class="col-5 text-right" style="margin-top:10px;">{{ __('site.Confirm New Password') }} :</div>
						<div class="col-7">
							<input class="form-control" type="text" name="confirm_password" value="" />
						</div>
					</div>
					<div class="row mt-3">
						<div class="col-3"></div>
						<div class="col-9">
							<button type="submit" class="btn btn-primary">{{ __('site.Submit') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@stop
@section('script')
@stop