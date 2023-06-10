<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{asset( config('sys_config.icon')) }}">
<title>{{ config('sys_config.project_name') }} | @yield('title')</title>
<link href="{{ URL::asset('template/material-vertical-2/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('template/material-vertical-2/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/site.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="@yield('bodyclass')">
<nav id="header" class="fixed-top navbar-dark bg-black">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<a class="header-logo" href="{{ route('site_home') }}">
					<img class="main-logo" src="{{ URL::asset( config('sys_config.fontend_logo') ) }}" />
				</a>
				<div class="float-right">
					<div class="top-right-menu">
						<div class="bonuspage_{{$lang}}">
							<a href="#"></a>
						</div>
						<div class="qrcodepage_{{$lang}}">
							<a href="#" id="qrcodeshare" ></a>
						</div>
						<div class="{{ request()->route()->getActionMethod() == 'statusPage' ? 'statuspage_'.$lang.'-selected' : 'statuspage_'.$lang }}">
							<a href="{{ route('site_status') }}"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>
<div class="main-container @yield('extraclass')">
@include('layouts.site_flash_message')
@yield('content')
</div>
<nav id="footer" class="fixed-bottom navbar-dark">
	<div class="bottom-menu">
		<div class="footer-left"></div>
		<div class="footer-row-left"></div>
		<div class="footer-middle"></div>
		<div class="footer-row-right"></div>
		<div class="footer-right"></div>
		<div class="container">	
			<div class="fbtn {{ request()->route()->getActionMethod() == 'gamePage' ? 'gamePage_'.$lang.'-selected' : 'gamePage_'.$lang }}">
				<a href="{{ route('site_game') }}"></a>
			</div>
			<div class="fbtn {{ request()->route()->getActionMethod() == 'chatPage' ? 'chatPage_'.$lang.'-selected' : 'chatPage_'.$lang }}">
				<a href="{{ route('site_chat') }}"></a>
			</div>
			<div class="fbtn {{ request()->route()->getActionMethod() == 'depositPage' ? 'depositPage_'.$lang.'-selected' : 'depositPage_'.$lang }}">
				<a href="{{ route('site_deposit') }}"></a>
			</div>
			<div class="fbtn {{ request()->route()->getActionMethod() == 'withdrawPage' ? 'withdrawPage_'.$lang.'-selected' : 'withdrawPage_'.$lang }}">
				<a href="{{ route('site_withdraw') }}"></a>
			</div>
			<div class="fbtn {{ request()->route()->getActionMethod() == 'profilePage' ? 'profilePage_'.$lang.'-selected' : 'profilePage_'.$lang }}">
				<a href="{{ route('site_profile') }}"></a>
			</div>
		</div>	
	</div>
</nav>
<div class="modal fade" id="qrshareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-body black-modal">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="loading-text text-center">{{ __('site.Please wait...') }}</div>
				<div class="content"></div>
			</div>
		</div>
	</div>
</div>
<!-- jQuery  -->
<script>
var $app = {
	'getreferrallink':"{{ route('site_ajaxreferrallink') }}",
};
</script>
<script src="{{ URL::asset('template/material-vertical-2/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('template/material-vertical-2/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('template/material-vertical-2/assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('js/jqueryvalidation/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/jqueryvalidation/additional-methods.min.js') }}"></script>
<script src="{{ URL::asset('js/jqueryvalidation/localization/messages_'.$lang.'.js') }}"></script>
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=5f96ff5bd924480012e1d071&product=inline-share-buttons" async="async"></script>
<script src="{{ URL::asset('js/site.js') }}"></script>
@yield('script')
</body>
</html>