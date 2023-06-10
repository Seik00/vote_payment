<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>{{ config('sys_config.project_name') }} </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset( config('sys_config.icon')) }}">

         <!-- DataTables -->
         <link href="/template/material-vertical-2/assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="/template/material-vertical-2/assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="/template/material-vertical-2/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
        <!-- App css -->
        <link href="/template/material-vertical-2/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="/template/material-vertical-2/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="/template/material-vertical-2/assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="/template/material-vertical-2/assets/css/style.css" rel="stylesheet" type="text/css" />
        <!-- Sweet Alert -->
        <link href="/template/material-vertical-2/assets/plugins/sweet-alert2/sweetalert2.min.css" rel="stylesheet" type="text/css">
        <link href="/template/material-vertical-2/assets/plugins/animate/animate.css" rel="stylesheet" type="text/css">
        <style>
            .left-sidenav-menu li.mm-active > a {
                background: white;
				color:black;
            }
			.left-sidenav-menu li.mm-active > a i{
				color:black;
			}
            .left-sidenav-menu li.mm-active .nav-item.active a.nav-link.active {
                color: #17324D;
            }
            .nav-pills .nav-item.show .nav-link, .nav-pills .nav-link.active {
                background: white;
                box-shadow: 0 7px 14px 0 rgba(255, 155, 6, 0.5);
            }
            .pagination .page-item.active .page-link {
                background: white;
                border-color: #F7901E;
                color: #ffffff;
            }
			.navbar-custom .topbar-nav li.show .nav-link {
				background-color: #1f1f23!important; 
			}
            .left-sidenav-menu li ul li > a:hover {
                    color: black;
                }
                .left-sidenav-menu li ul li > a:hover i {
                    color: #black;
                }
            .left-sidenav-menu li.mm-active .nav-item.active a.nav-link.active i {
                    color: #17324D;
                }
                a:hover {
                    color: #17324D!important;
                    text-decoration: underline;
                }
                a:hover i{
                    color: #17324D!important;
                    text-decoration: underline;
                }
                .left-sidenav-menu li ul li > a {
                    padding: 10px 22px;
                    color: black;
                    font-size: 13.5px;
                    border-left: none;
                }
                .left-sidenav-menu li ul li > a i{
                    color: black;
                }
                .left-sidenav-menu li > a {
                    display: block;
                    padding: 12px 24px;
                    color: #fff;
                    -webkit-transition: all 0.3s ease-out;
                    transition: all 0.3s ease-out;
                }
                .left-sidenav-menu li > a i{
                    color: #fff;
                   
                }
				
              
        </style>
        @yield('style')
        
    </head>

    <body>

        <!-- Top Bar Start -->
        <div class="topbar">
       
            <!-- LOGO -->
            <div class="topbar-left"  style='background: #1f1f23!important;'>
                <a href="{{ route('index_home') }}" class="logo">
                    <span>
                        <img src="{{asset( config('sys_config.only_icon')) }}" alt="logo-small" class="logo-sm" style="height:75px;">
                    </span>
                   
                </a>
            </div>
            <!--end logo-->
            <!-- Navbar -->
            <nav class="navbar-custom" style='background: #1f1f23!important;'>    
                <ul class="list-unstyled topbar-nav float-right mb-0"> 
                    <li class="dropdown notification-list">
                     
                    </li>

                    <li class="dropdown">
                    
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
                            aria-haspopup="false" aria-expanded="false" >
                            <span class="ml-1 nav-user-name hidden-sm" style='color:#fff'>{{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }}} <i class="mdi mdi-chevron-down"></i> </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" style='backgroud:black'>
                             <a class="dropdown-item" href="{{ route('logout') }}"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul><!--end topbar-nav-->
    
                <ul class="list-unstyled topbar-nav mb-0">                        
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light">
                            <i class="dripicons-menu nav-icon" style='color:#fff'></i>
                        </button>
                    </li>
                   
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->

        <div class="page-wrapper">
            <!-- Left Sidenav -->
            <div class="left-sidenav"  style='background:#1f1f23!important;'>
                <ul class="metismenu left-sidenav-menu">
                    @foreach($output_data['menu'] as $menu)
                        @if(count($menu['items']) > 1)
                            <li>
                                <a href="javascript: void(0);"><i class="{{ $menu['icon'] }}"></i><span>
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
                                <li>
                                    <a href="{{ route($submenu['router']) }} "><i class="{{ $menu['icon'] }}"></i><span>
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
            <!-- end left-sidenav-->

            <!-- Page Content-->
            <div class="page-content">

                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ $output_data['main_title'] }}</a></li>
                                        <li class="breadcrumb-item active">{{ $output_data['sub_title'] }}</li>
                                    </ol>
                                </div>
                                <h4 class="page-title"> {{ $output_data['sub_title'] }}</h4>
                            </div><!--end page-title-box-->
                        </div><!--end col-->
                    </div><!--end row-->
                    <!-- end page title end breadcrumb -->
                    @yield('content')  

                </div><!-- container -->
                
                @stack('modal')

                <footer class="footer text-center text-sm-left">
                    &copy; {{ config('sys_config.year') }} {{ config('sys_config.project_name') }} <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by FIZZ</span>
                </footer><!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper -->

        <!-- jQuery  -->
        <script src="/template/material-vertical-2/assets/js/jquery.min.js"></script>
        <script src="/template/material-vertical-2/assets/js/bootstrap.bundle.min.js"></script>
        <script src="/template/material-vertical-2/assets/js/metisMenu.min.js"></script>
        <script src="/template/material-vertical-2/assets/js/waves.min.js"></script>
        <script src="/template/material-vertical-2/assets/js/jquery.slimscroll.min.js"></script>

        <script src="/template/material-vertical-2/assets/plugins/moment/moment.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/apexcharts/apexcharts.min.js"></script>

        <!-- App js -->
        <script src="/template/material-vertical-2/assets/js/app.js"></script>
       
        <!-- Required datatable js -->
        <script src="/template/material-vertical-2/assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="/template/material-vertical-2/assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/jszip.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="/template/material-vertical-2/assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="/template/material-vertical-2/assets/plugins/datatables/responsive.bootstrap4.min.js"></script>
        <script src="/template/material-vertical-2/assets/pages/jquery.datatable.init.js"></script>
        <!-- Sweet-Alert  -->
        <script src="/template/material-vertical-2/assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
        <script src="/template/material-vertical-2/assets/pages/jquery.sweet-alert.init.js"></script>
        @yield('script')

    </body>
</html>