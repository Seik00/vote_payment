<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Healthly Living Now For The Future">
    <meta name="keywords" content="Rifineria">
    <meta name="viewport" content= "width=device-width, user-scalable=no">
    <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta property="og:title" content="{{ config('sys_config.project_name') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://rifineria.com/" />
    <meta property="og:image" content="{{asset( config('sys_config.whatsapp_icon')) }}">
    <meta property="og:description" content="Healthly Living Now For The Future" />

    <title>{{ config('sys_config.project_name') }}</title>

    <link rel="stylesheet" type="text/css" href="css/portrait.css" media="screen and (orientation: portrait)">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="{{asset( config('sys_config.whatsapp_icon')) }}" type="image/x-icon" />

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,500,600,700%7CPlayfair+Display:400,400i%7CDancing+Script:400,700" rel="stylesheet">

    <!--=== All Plugins CSS ===-->
    <link href="{{ URL::asset('template\tri-o\trio\assets/css/plugins.css') }}" rel="stylesheet">
    <!--=== All Vendor CSS ===-->
    <link href="{{ URL::asset('template\tri-o\trio\assets/css/vendor.css') }}" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="{{ URL::asset('template\tri-o\trio\assets/css/style.css') }}" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/modernizr-2.8.3.min.js') }}"></script>

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script src="./index.js"></script>

    <!--[if lt IE 9]>
<script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

</head>
<style>
    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
   .sticky-header.sticky *{
        color:black!important;
   }
    
    #map {
    height: 100%;
    }
    .dropdown-navbar:hover>.dropdown-nav{
        min-width:150px!important;
        padding:0px!important;
        margin-left: 45px;
    }
    .dropdown-navbar .dropdown-nav>li{
        text-align:center;
        padding: 0px 0px;
        margin-bottom:0px!important;
        
    }
    .dropdown-navbar .dropdown-nav>li a:not(.mega-title){
        padding:8px 0;
    }

    
    
    @media screen and (min-width: 600px) {
        .off-canvas-area-wrap.nav{
            display:none;
        }
        li.special{
            display:none;
        }
        .main-menu>li a{
            font-size:12px;
            color:white;
        }
        .header-area-wrapper{
            padding: 0px 0;
            background: #35393c;
        }
        /* a.logo-wrap.d-block{
           margin-left:65%;
        } */
        img.menu-logo{
            height:85px;
        }
        img.sticky-logo{
            height:85px;
        }
        .col-10.col-lg-12-mobile{
            display:none;
        }
        .col-6.col-lg-3{
            display:block;
        }
    }
    @media screen and (max-width: 600px) {
        .off-canvas-area-wrapper .off-canvas-content-wrap, .off-canvas-responsive-menu .off-canvas-content-wrap, .off-canvas-search-box .off-canvas-content-wrap {
            max-width: 100% !important;
        }   
        .off-canvas-responsive-menu .off-canvas-content-wrap .btn-close{
            left:90%!important;
            top: 30px !important;
        }
    
        .off-canvas-responsive-menu .off-canvas-content-wrap .slicknav_menu .slicknav_nav li{
            border-bottom:0px!important;
            margin:20px;
        }
        .header-area-wrapper{
            padding: 3px 0!important;
        }
        .col-10.col-lg-12-mobile{
            display:block;
            min-width: 100%;
        }
        .col-6.col-lg-3{
            display:none;
        }
        .col-6.col-lg-9.my-auto.ml-auto.position-static{
            position: absolute!important;
            right: 0;
        }
        header.header-area-wrapper.transparent-header.sticky-header{
            background:white;
            height:80px;
        }
        .container-fluid{
            height: 100%;
            text-align: center;
        }
        
    }

   

</style>
<body class="preloader-active">
<link itemprop="thumbnailUrl" href="{{asset( config('sys_config.whatsapp_icon')) }}"> <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject"> <link itemprop="url" href="{{asset( config('sys_config.whatsapp_icon')) }}"> </span>
    <!--== Start PreLoader Wrap ==-->
    <div class="preloader-area-wrap">
        <div class="spinner d-flex justify-content-center align-items-center h-100">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!--== End PreLoader Wrap ==-->

    <!--== Start Header Area Wrapper ==-->
    <header class="header-area-wrapper transparent-header sticky-header">
        <div class="container-fluid">
            <div class="row">
                <!-- Start Logo Area Wrap -->
                <div class="col-10 col-lg-12-mobile">
                    <a href="/" class="logo-wrap d-block">
                        <img src="/images/ri.png" class="menu-logo" alt="White Logo" style="height:80px;padding:10px;"/>
                        <img src="/images/ri.png" class="sticky-logo" alt="Black Logo"  style="height:80px;padding:10px;"/>
                    </a>
                </div>
                <div class="col-6 col-lg-3">
                    <a href="/" class="logo-wrap d-block">
                        <img src="/images/ri.png" class="menu-logo" alt="White Logo" style="height:90px;padding:10px;"/>
                        <img src="/images/ri.png" class="sticky-logo" alt="Black Logo" style="height:90px;padding:10px;"/>
                    </a>
                </div>
                <!-- End Logo Area Wrap -->

                <!-- Start Main Navigation Wrap -->
                <div class="col-6 col-lg-9 my-auto ml-auto position-static">
                    <div class="header-right-area d-flex justify-content-end align-items-center">
                        <div class="navigation-area-wrap d-none d-lg-block">
                            <nav class="main-navigation">
                            <ul class="main-menu nav justify-content-end">
                                    <li class="special"><a href="/" style="text-align: center;"><img src="/images/ri.png" alt="White Logo" style="height:80px;"/></a>
                                        
                                    </li>
                                    <li style="margin-top:1.5px"><a href="/">{{ __('site.HOME') }}</a>
                                        
                                    </li>

                                    <li><a href="/home/certificate">{{ __('site.PROFILE_COMPANY') }}</a>
                                       
                                    </li>

                                    <li><a href="/home/SANNoXProduct">{{ __('site.SANNoXProduct') }}</a>
                                       
                                    </li>
                                  
                                    <li class="dropdown-navbar arrow"><a href="#">{{ __('site.LANGUAGE') }}</a>
                                        <ul class="dropdown-nav">
                                        <li><a href="/lang/en">English</a>
                                            </li>
                                            <li><a href="/lang/my">Bahasa Malaysia</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="/web">{{ __('site.LOGIN') }}</a>
                                        
                                    </li>
                                    
                                </ul>
                            </nav>
                        </div>

                        <div class="off-canvas-area-wrap nav">
                            <button class="off-canvas-btn d-none d-lg-block"><i class="fa fa-bars"></i>
                            </button>
                            <button class="mobile-menu text-white d-lg-none"><i class="fa fa-bars"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <!-- End Main Navigation Wrap -->
            </div>
        </div>
    </header>
    <!--== End Header Area Wrapper ==-->

    @yield('content')  
    
    <footer class="footer-wrapper">
        <!-- Start Footer Widget Area -->
        <div class="footer-widget-wrapper pt-120 pt-md-80 pt-sm-60 pb-116 pb-md-78 pb-sm-60">
            <div class="container">
                <div class="row mtm-44">
                    <!-- Start Single Widget Wrap -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-widget-wrap">
                            <h3 class="widget-title">{{ __('site.MAIN_OPERATION_OFFICE') }}</h3>
                            <div class="widget-body">
                                <div class="about-text">
                                    <address>
                                    
                                    RIFINERIA RESOURCES (1378392-P)<br>
                                    No.11B, TKT 2, <br>
                                    JALAN PELABUR B23B,<br>
                                    SEKSYEN 23, 40300 SHAH ALAM, <br>
                                    SELANGOR DARUL EHSAN.

                                    <br>   

                                </address>
                                    <a href="mailto:your@example.com">{{ __('site.EMAIL') }} : rifineriaresources@gmail.com</a>
                                    <br>
                                    <!-- <a href="https://www.hastech.company" target="_blank">{{ __('site.PHONE') }} : +60355456690</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget Wrap -->

                    <!-- Start Single Widget Wrap -->
                    <div class="col-lg-3 col-md-6">
                        <div class="single-widget-wrap">
                            <h3 class="widget-title">{{ __('site.LINKS') }}</h3>
                            <div class="widget-body">
                                <ul class="widget-list">
                                <li><a href="/">{{ __('site.HOME') }}</a>
                                        
                                </li>
                                <li><a href="home/certificate">{{ __('site.PROFILE_COMPANY') }}</a>
                                    
                                </li>
                                <li><a href="home/SANNoXProduct">{{ __('site.SANNoXProduct') }}</a>
                                    
                                </li>
                                
                                <li><a href="/web">{{ __('site.LOGIN') }}</a>
                                </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget Wrap -->

                    <!-- Start Single Widget Wrap -->
                    <div class="col-lg-6 col-md-6">
                        <div class="single-widget-wrap">
                            <h3 class="widget-title">{{ __('site.MAP') }}</h3>
                            <div class="widget-body">
                                <div class="latest-blog-widget">
                                    <div class="single-blog-item">
                                    <a class="btn btn-brand" href="http://maps.google.co.uk/maps?q=3.0479695248710983, 101.52766070008896" style="margin-bottom:10px;    padding: 15px;">Directions<i class="fa fa-arrow-right"></i></a>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d940.1402389292953!2d101.52763158590498!3d3.047663626312586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4d58fdfa5c77%3A0x9d7f94fb378e86a6!2s11B%20TKT%2C%202%2C%20Jalan%20Pelabur%20B%2023%2FB%2C%20Seksyen%2023%2C%2040300%20Shah%20Alam%2C%20Selangor!5e0!3m2!1sen!2smy!4v1641013115349!5m2!1sen!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                                       
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Single Widget Wrap -->

                    <!-- Start Single Widget Wrap -->
                   
                    <!-- End Single Widget Wrap -->
                </div>
            </div>
        </div>
        <!-- End Footer Widget Area -->

        <!-- Start Footer Bottom Area -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-7 order-last">
                        <div class="footer-copyright-area mt-xs-10 text-center text-sm-left">
                            <p>Copyright ©
                                <script>
                                    document.write(new Date().getFullYear()+' ');
                                </script>Rifineria - All Rights Reserved.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-5 order-first order-sm-last">
                        <div class="footer-social-icons nav justify-content-center justify-content-md-end">
                            <a href="#" target="_blank" class="trio-tooltip" data-tippy-content="Facebook"><i class="fa fa-facebook"></i></a>
                            <a href="#" target="_blank" class="trio-tooltip" data-tippy-content="Twitter"><i class="fa fa-twitter"></i></a>
                            <a href="#" target="_blank" class="trio-tooltip" data-tippy-content="Pinterest"><i class="fa fa-pinterest"></i></a>
                            <a href="#" target="_blank" class="trio-tooltip" data-tippy-content="Instagram"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer Bottom Area -->
    </footer>
    <!--== End Footer Area Wrapper ==-->

    <aside class="off-canvas-area-wrapper">
        <!-- Off Canvas Overlay -->
        <div class="off-canvas-overlay"></div>

        <!-- Start Off Canvas Content Area -->
        <div class="off-canvas-content-wrap">
            <div class="off-canvas-content">
                <!-- Start Useful Links Content -->
                <div class="useful-link-wrap off-canvas-item">
                    <h2>{{ __('site.MENU') }}</h2>

                    <ul class="useful-link-menu">
                        <li><a href="index.html">{{ __('site.HOME') }}</a>
                        </li>
                        <li><a href="shop.html">{{ __('site.OUR_PRODUCTS') }}</a>
                        </li>
                        <li><a href="about.html">{{ __('site.OUR_COLLABORATION') }}</a>
                        </li>
                        <li><a href="contact.html">{{ __('site.INFORMATION') }}</a>
                        </li>
                        <li><a href="contact.html">{{ __('site.LASTEST_NEWS') }}</a>
                        </li>
                        <li><a href="/web">{{ __('site.LOGIN') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Off Canvas Close Icon -->
            <button class="btn-close trio-tooltip" data-tippy-content="Close" data-tippy-placement="left"><i class="fa fa-close"></i>
            </button>
        </div>
        <!-- End Off Canvas Content Area -->
    </aside>

    <!--== Start Off Canvas Area Wrapper ==-->
    <aside class="off-canvas-responsive-menu">
        <!-- Off Canvas Overlay -->
        <div class="off-canvas-overlay" style="background:white"></div>

        <!-- Start Off Canvas Content Area -->
        <div class="off-canvas-content-wrap">
            <div class="off-canvas-content">

            </div>
            <!-- Off Canvas Close Icon -->
            <button class="btn-close trio-tooltip" data-tippy-content="Close" data-tippy-placement="right"><i class="fa fa-close"></i>
            </button>
        </div>
        <!-- End Off Canvas Content Area -->
    </aside>
    <!--== End Off Canvas Area Wrapper ==-->

    <!--=======================Javascript============================-->
    <!--=== All Vendor Js ===-->
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/vendor.js') }}"></script>
    <!--=== All Plugins Js ===-->
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/plugins.js') }}"></script>
    <!--=== Active Js ===-->
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/active.js') }}"></script>

    <!--=== Revolution Slider Js ===-->
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/jquery.themepunch.revolution.min.js') }}"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.actions.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.migration.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/extensions/revolution.extension.video.min.js') }}"></script>


    <script src="{{ URL::asset('template\tri-o\trio\assets/js/revslider/revslider-active.js') }}"></script>
    @yield('script')
</body>

</html>
<script>
function myMap() {
var map = new google.maps.Map(document.getElementById("map"), mapOptions);
  var myCenter = new google.maps.LatLng(3.0444327162429956, 101.52634225499654);
  var mapCanvas = document.getElementById("map");
  var mapOptions = {center: myCenter, zoom: 16};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
$( document ).ready(function() {
    $(window).bind("orientationchange", function(){
    var orientation = window.orientation;
    var new_orientation = (orientation) ? 0 : 180 + orientation;
    $('body').css({
        "-webkit-transform": "rotate(" + new_orientation + "deg)"
    });
});
    
});


</script>