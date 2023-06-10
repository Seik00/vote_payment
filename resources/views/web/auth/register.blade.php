@extends('layouts.site_login')
@section('title', 'Register')
@section('bodyclass', 'login-class')
@section('content')
<!--div class="site-login-backbutton"> 
	<a class="white-text pr-3" href="{{ route('site_index') }}"><i class="fas fa-chevron-left"></i></a>
</div-->
<div class="container d-flex h-100">
	<div class="row justify-content-center align-self-center m-auto flew-row-fix">
		<div class="col-sm-12">
			<div class="register-page">
				<div class="register-page-content">
					<form id="registerform" class="form-horizontal register-form my-4" action="{{ route('site_doregister') }}" method='POST'>
						{{ csrf_field() }}
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<h2 class="text-center mt-5 mb-5 gold-text">{{ __('site.Create Account') }}</h2>
						
						@if(!$errors->isEmpty())
							<div class="alert alert-danger">
								<ul class="list-unstyled mb-0">
									@foreach($errors->all() as $err)
										<li>{{ $err }}</li>
									@endforeach
								</ul>
							</div>
						@endif
						
						<div class="form-group mb-3">
							<div class="input-group">
								<input type="text" class="form-control black-form-control" name="username" id="username" value="{{ old('username') }}" placeholder="{{ __('site.Username') }}">
							</div>                                    
							<div class="error-message"></div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<select name="country_id"  class="form-control black-form-control"  id="country_id">
									@foreach ($country as $records)
										<option value="{{ $records->id}}" style='color:black'>{{ $records->name}}</option>
									@endforeach
								</select>
							</div>                                    
							<div class="error-message"></div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">
								<span id = 'country_code' class="input-group-addon black-form-control"
								 style='border-radius: 0px;
    border-top-left-radius: 20px;
    border-bottom-left-radius: 20px;'>+60</span>
								<input type="text" class="form-control black-form-control" name="contact_number" id="mobile_no" value="{{ old('contact_number') }}" placeholder="{{ __('site.Phone Number') }}">
							</div>                                    
							<div class="error-message"></div>
						</div>
						<div class="form-group mb-3">
							<div class="input-group">                                                       
								<input type="password" class="form-control black-form-control" id="password" name="password" placeholder="{{ __('site.Password') }}">
							</div>
							<div class="error-message"></div>							
						</div>
						<div class="form-group mb-3">
							<div class="input-group">                                                       
								<input type="password" class="form-control black-form-control" id="confirmpassword" name="password_confirmation" placeholder="{{ __('site.Confirm Password') }}">
							</div>
							<div class="error-message"></div>							
						</div>
						<div class="form-group mb-3">
							<div class="input-group">                                                       
								<input type="text" class="form-control black-form-control" id="ref_id" name="ref_id" value='{{$ref_id}}' placeholder="{{ __('site.REFERRER') }}">
							</div>
							<div class="error-message"></div>							
						</div>
						<div id="otpinput" class="form-group mb-3">
							<div class="input-group">                                                       
								<input type="text" class="form-control black-form-control" id="otp" name="otp" placeholder="{{ __('site.OTP') }}">
							</div>
							<div class="error-message"></div>							
						</div>
						<div class="form-group mb-4">
							<div class="input-group">                                                       
								<button id="submitbtn" class="btn btn-gold btn-block" type="submit">{{ __('site.Request OTP') }}</button>
							</div>
						</div>
						<div id='demo'></div>
						<!--div class="row">
							<div class="col-sm-12  mb-4 text-center">
								<a class="gold-text" href="{{ route('site_index') }}">{{ __('site.Log In') }}</a> {{ __('site.Or') }} <a class="gold-text" href="">{{ __('site.Forgot Password') }}?</a>
							</div>
						</div-->
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@section('script')
<script>
$( document ).ready(function() {
	var country = '{{$country}}';
	
	$("#country_id").change(function(){
		country_id = $("#country_id").val();
		@foreach($country as $countrys )
			if(country_id == '{{ $countrys->id }}'){
				document.getElementById("country_code").innerHTML = '{{ $countrys->country_code }}';
			}
		@endforeach
	});

	function myFunction(item, index) {
		document.getElementById("demo").innerHTML += index + ":" + item + "<br>"; 
	}
	$("#registerform").validate({
		rules: {
			username: {
				required: true,
				minlength: 6,
				pattern: /^[a-zA-Z0-9\s]+$/,
			},
			mobile_no: {
				required: true,
				number: true,
				minlength: 10
			},
			password: {
				required: true,
				minlength: 6
			},
			confirmpassword: {
				required: true,
				equalTo: "#confirmpassword",
				minlength: 6
			},
			otp: {
				required: true,
				minlength: 4
			}
		},
		errorPlacement: function(error, element) {
            error.appendTo( element.parent().next("div") );
        },
		submitHandler: function (form, element) {
			if ($('#otpinput').is(':visible')) {
				return true;
			} else {
				$('#submitbtn').html('{{ __("site.Register") }}');
				$('#otpinput').show();
				return false;
			}
			
			return false;
        }
	});
});
</script>
@stop
@endsection