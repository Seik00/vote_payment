<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Rifineria Grow Together success Together">
<meta name="author" content="Rifineria">
<title>{{ config('sys_config.project_name') }}</title>
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/font-awesome.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/bootstrap.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/animate.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/waves.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/layout.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/components.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/plugins.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/common-styles.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/pages.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/responsive.css') }}" type="text/css">
<link rel="stylesheet" href="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/css/matmix-iconfont.css') }}" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Roboto:400,300,400italic,500,500italic" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet" type="text/css">
</head>
<body class="login-page">
<div class="page-container">
        <div class="login-branding">
            <a href="index.html"><img src="images/logo-large.png" alt="logo"></a>
        </div>
        <div class="login-container">
            <img class="login-img-card" src="images/avatar/jaman-01.jpg" alt="login thumb" />
            <form class="form-signin">
                <input type="text" id="inputEmail" class="form-control floatlabel " placeholder="Email Address" required autofocus>
                <input type="password" id="inputPassword" class="form-control floatlabel " placeholder="Password" required>
                <div id="remember" class="checkbox">
                    <label>
                        <input type="checkbox" class="switch-mini" /> Remember Me
                    </label>
                </div>
                <button class="btn btn-primary btn-block btn-signin" type="submit">Sign In</button>
            </form>

            <a href="#" class="forgot-password">
                Forgot the password?
            </a>
        </div>
        <div class="create-account">
            <a href="#">
                Create Account
            </a>
        </div>

        <div class="login-footer">
            Crafted with<i class="fa fa-heart"></i>by <a href="#">westilian</a>

        </div>

    </div>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jquery-1.11.2.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jquery-migrate-1.2.1.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jRespond.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/nav-accordion.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/hoverintent.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/waves.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/switchery.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/jquery.loadmask.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/icheck.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootbox.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/animation.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/colorpicker.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/floatlabels.js') }}"></script>

    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/smart-resize.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/layout.init.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/matmix.init.js') }}"></script>
    <script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/retina.min.js') }}"></script>
    @yield('script')
</body>

</html>
