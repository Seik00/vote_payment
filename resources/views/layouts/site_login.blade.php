<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<!-- Tell the browser to be responsive to screen width -->
<meta name="viewport" content="width=device-width, initial-scale=1, initial-scale=1,maximum-scale=1.0, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<!-- Favicon icon -->
<link rel="icon" type="image/png" sizes="16x16" href="{{asset( config('sys_config.icon')) }}">
<title>{{ config('sys_config.project_name') }} | @yield('title')</title>
<link href="{{ URL::asset('template/material-vertical-2/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('template/material-vertical-2/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('css/site.css') }}" rel="stylesheet" type="text/css" />
</head>
<body class="site-login @yield('bodyclass')" style=" background: url('/images/WeChat Image_20210324235417.png') no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
<div class="langauge-banner">
	<div class="dropdown">
		@if ($lang === "en")
			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ __('site.English') }}</button>
		@elseif ($lang === "cn")
			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ __('site.Chinese') }}</button>
		@else
			<button type="button" class="btn dropdown-toggle" data-toggle="dropdown">{{ __('site.English') }}</button>
		@endif
		
		<div class="dropdown-menu dropdown-menu-right">
			<a class="dropdown-item {{ ($lang == 'en') ? 'active' : '' }}" href="{{ url()->current() }}?lang=en">{{ __('site.English') }}</a>
			<a class="dropdown-item {{ ($lang == 'cn') ? 'active' : '' }}" href="{{ url()->current() }}?lang=cn">{{ __('site.Chinese') }}</a>
		</div>
	</div>
</div>
@include('layouts.site_flash_message')
@yield('content')
<!-- jQuery  -->
<script src="{{ URL::asset('template/material-vertical-2/assets/js/jquery.min.js') }}"></script>
<script src="{{ URL::asset('template/material-vertical-2/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ URL::asset('template/material-vertical-2/assets/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('js/jqueryvalidation/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('js/jqueryvalidation/localization/messages_'.$lang.'.js') }}"></script>
<script src="{{ URL::asset('js/jqueryvalidation/additional-methods.min.js') }}"></script>
<script src="{{ URL::asset('js/site.js') }}"></script>
@yield('script')
</body>
</html>