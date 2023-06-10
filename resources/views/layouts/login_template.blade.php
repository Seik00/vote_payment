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
    <title>{{ config('sys_config.project_name') }}</title>
    <link href="{{ URL::asset('template/material-vertical-2/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('template/material-vertical-2/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('template/material-vertical-2/assets/css/metisMenu.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('template/material-vertical-2/assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    
    
</head>
<body class="account-body accountbg" style='background:#e9faff;'>
    <div>
        @yield('content')
    </div>
  <!-- jQuery  -->
    <script src="{{ URL::asset('template/material-vertical-2/assets/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('template/material-vertical-2/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ URL::asset('template/material-vertical-2/assets/js/metisMenu.min.js') }}"></script>
    <script src="{{ URL::asset('template/material-vertical-2/assets/js/waves.min.js') }}"></script>
    <script src="{{ URL::asset('template/material-vertical-2/assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('template/material-vertical-2/assets/js/app.js"></script>
    @yield('script')
</body>
</html>
