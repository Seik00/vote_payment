<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rifineria Grow Together success Together">
<meta name="author" content="Rifineria">
    <title>{{ config('sys_config.project_name') }} </title>
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
<style>
button.btn.btn-primary{
    background-color: #980102;border-color: #980102;color:white;
}
.left-navigation{
    background-color:#FDEEF4;
}
.container-fluid.top-nav{
    background-color:#FDEEF4;
}
.left-navigation .list-accordion > li > a{
    color:black;
}
.left-navigation .list-accordion > li > a:before{
    background:#980102;
}
.fa{
    color:#010101;
}
.left-navigation > ul > li > a:hover{
    color:white!important;
}
.aside-close i{
    background:#980102;
}
.left-aside{
    background-color:#FDEEF4;
}
.left-navigation > ul ul{
    margin:0px;
}
@media only screen and (max-width: 1000px){
    .top-aside-right {
        position: absolute;
        top: -60px;
        right: 0px;
    }
    a.iconic-logo{
        text-align:center;
        margin-right:35px;
    }
    .iconic-logo{
        display:block!important;
    }
    
}
</style>
<body>
<div class="page-container list-menu-view">
<!--Leftbar Start Here -->
<div class="left-aside desktop-view">
    <div class="aside-branding" style="background-color:#FDEEF4">
        <a href="/web/home/index" class="iconic-logo"><img src="{{asset( config('sys_config.word_icon')) }}" style="width: 145px;position:absolute;left:5px;top:-20px;" alt="Matmix Logo">
        </a>
        <!-- <a href="/web/home/index" class="iconic-logo"> <p style="font-size: 18px;padding: 18px;color: #980102;">RIFINERIA RESOURCES</p> -->
        </a>
        <!-- <a href="index.html" class="large-logo"><img src="{{asset( config('sys_config.icon')) }}" alt="Matmix Logo"> -->

        </a><span class="aside-pin waves-effect"><i class="fa fa-thumb-tack"></i></span>
        <span class="aside-close waves-effect"><i class="fa fa-times"></i></span>
    </div>
    <div class="left-navigation">
        <ul class="list-accordion">
                     @foreach($output_data['menu'] as $menu)
                        @if(count($menu['items']) > 1)
                            <li class="navigation">
                                <a href="javascript: void(0);" class="navigation-icon"><i class="{{ $menu['icon'] }}"></i><span style="position:absolute;left:35px;">
                                    @if ( Config::get('app.locale') == 'en')

                                    {{ $menu['name'] }}

                                    @else

                                    {{ $menu['name_cn'] }}

                                    @endif
                                    </span><span class="menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="nav-second-level" aria-expanded="false">
                                    @foreach($menu['items'] as $submenu)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route($submenu['router']) }} ">
                                                <i class="ti-control-record"></i>
                                                @if ( Config::get('app.locale') == 'en')

                                                {{ $submenu['name'] }}

                                                @else

                                                {{ $submenu['name_cn'] }}

                                                @endif

                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @else
                            @foreach($menu['items'] as $submenu)
                                <li class="navigation">
                                    <a href="{{ route($submenu['router']) }} " class="navigation-icon"><i class="{{ $menu['icon'] }}"></i><span style="position:absolute;left:35px;">
                                    @if ( Config::get('app.locale') == 'en')

                                    {{ $submenu['name'] }}

                                    @else

                                    {{ $submenu['name_cn'] }}

                                    @endif</span></a>
                                </li>
                            @endforeach

						@endif
                    @endforeach
        </ul>
    </div>
    </div>
    <div class="page-content">
    <!--Topbar Start Here -->
        <header class="top-bar">
            <div class="container-fluid top-nav">
                <div class="row">
                    <div class="col-md-2">
                        <div class="clearfix top-bar-action">
                            <span class="leftbar-action-mobile waves-effect"><i class="fa fa-bars " style="background:#980102;color:white"></i></span>
                            <span class="leftbar-action desktop waves-effect"><i class="fa fa-bars " style="background:#980102;color:white"></i></span>
                                
                        </div>
                    </div>
                    <div class="col-md-10 responsive-fix">
                        <div class="top-aside-right">
                            <div class="user-nav">
                                <ul>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" href="#" class="clearfix dropdown-toggle waves-effect waves-block waves-classic">
                                            <span class="user-info">{{$user->country->short_form}} {{ $user->username }}<cite>{{ $user->package->package_name }}</cite></span>
                                            <span class="user-thumb">
                                            @if ($user['icon'] =='')
                                            <img src="{{asset( config('sys_config.new_icon')) }}" alt="image" style="border-radius:0px!important;width:40px;height:45px;background-color:transparent;">
                                            @else
                                            <img src="{{ $user->uploaded_icon[0]->public_image_path }}" alt="image" style="background-color:transparent;border-radius:0px!important;">
                                            @endif
                                            </span>
                                        </a>
                                        <ul role="menu" class="dropdown-menu fadeInUp">
<!--
                                            @foreach (Config::get('language') as $lang => $language)
                                                @if ($lang != App::getLocale())
                                                    <li>
                                                        <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                                    </li>
                                                @endif
                                            @endforeach -->


                                            <!-- <li><a href="/web/member/userBank"><span class="user-nav-icon"><i class="fa fa-user"></i></span><span class="user-nav-label">View Profile</span></a>
                                            </li> -->
                                            <li><a href="/web/member/userBank"><span class="user-nav-icon"><i class="fa fa-user"></i></span><span class="user-nav-label">View Profile</span></a>
                                            </li>
                                            <li><a href="/web/member/chgSecPwd"><span class="user-nav-icon"><i class="fa fa-cogs"></i></span><span class="user-nav-label">Settings</span></a>
                                            </li>
                                            <li><a  href="{{ route('logout') }}"><span class="user-nav-icon"><i class="fa fa-lock"></i></span><span class="user-nav-label">Logout</span></a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div style="margin-top:20px">
        @yield('content')
        </div>

        <!--Footer Start Here -->
        <!-- <footer class="footer-container">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-left">
                            <span>&copy; {{ config('sys_config.year') }} {{ config('sys_config.project_name') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer> -->
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
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/select2.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootstrap-filestyle.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootbox.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/animation.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/colorpicker.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/bootstrap-datepicker.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/sweetalert.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/moment.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/calendar/fullcalendar.js') }}"></script>
<!--CHARTS-->
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/sparkline/jquery.sparkline.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/easypie/jquery.easypiechart.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/excanvas.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/curvedLines.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.time.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.stack.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.axislabels.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.resize.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.spline.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart/flot/jquery.flot.pie.min.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/chart.init.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/smart-resize.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/layout.init.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/matmix.init.js') }}"></script>
<script src="{{ URL::asset('template\matmix\MatMix-Admin-ver-1.2\html\01_List-Menu-View/js/retina.min.js') }}"></script>
@yield('script')
</body>
</html>
