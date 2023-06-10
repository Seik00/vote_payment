@extends('home.header')

@section('content')
<style>

.text-white{
    color:#980102!important;
}
* { -webkit-box-sizing: border-box; -moz-box-sizing: border-box; box-sizing: border-box; }
*:before, *:after { -webkit-box-sizing: inherit; -moz-box-sizing: inherit; box-sizing: inherit; }

.header-area-wrapper{
    padding:10px 0;
}
.single-service-item h3{
    margin-top:0px!important;
}
.about-page-testimonial .single-testimonial-wrap.layout--4.slick-slide.slick-current{
    background:#f7f7f7;
}
.about-page-testimonial .single-testimonial-wrap.layout--4{
    background:#f7f7f7;
}


.banner {
  background-image: url("/images/home_banner2.jpg");
  background-size: contain; /* 或者 background-size: 100% 100%; */
  background-position: center;
  width: 100%;
  height: 900px; /* fullsize banner 高度 */
}
@media screen and (max-width: 768px) {
  .banner {
    width: 100%;
    height: 300px;
    background-repeat: no-repeat;
  }
}


</style>

<!-- <section class="fullsize-video-bg" id="screen">

	<div id="video-viewport">
		<video width="1920" height="1280" autoplay muted loop>
			<source src="http://ydauat.greatwallsolution.com/videoYDA.mp4" type="video/mp4" />
			<source src="http://ydauat.greatwallsolution.com/videoYDA.mp4" type="video/webm" />
		</video>
	</div>
</section> -->
 <!--== Start Banner Area Wrapper ==-->
 <!-- <section class="about-banner-area hv-100 parallaxBg bg-img" data-bg="/images/building.jpg">
    <div class="container h-100">
        <div class="row align-items-center h-100">
            <div class="col-11 m-auto text-center">
                <div class="about-banner-content">
                    <h6 class="bolder-heading">{{ __('site.ABOUT_US') }}</h6>
                    <p class="about_detail">{{ __('site.ABOUT_US_1') }}</p>
                    <p class="about_detail">{{ __('site.ABOUT_US_2') }}</p>
                    <p class="about_detail">{{ __('site.ABOUT_US_3') }}</p>
                    <p class="about_detail" style="font-weight:900;margin-top:30px">{{ __('site.ABOUT_US_4') }}</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<div class="banner">
  <!-- banner 内容 -->
</div>
<section class="story-content-wrapper" style="margin-top:42px;background:#f7f7f7">
        <div class="row align-items-center no-gutters">

            <!-- Start Story Content Area -->
            <div class="col-md-6 order-1 my-auto text-center">
            <div class="about-page-testimonial mt-10 col-xl-8 mx-auto">
            
                <div class="ht-slick-slider-wrapper">
                <div class="service-left-con-inner">
                    <h2>{{ __('site.ABOUT_US') }}</h2>
                </div>
                    <div class="ht-slick-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "dots": true}'>
                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial-wrap layout--4">
                            
                            <p>{{ __('site.ABOUT_US_1') }}</p>
                           
                        </div>
                        <!-- Single Testimonial End -->
                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial-wrap layout--4">
                            
                            <p>{{ __('site.ABOUT_US_2') }}</p>
                           
                        </div>
                        <!-- Single Testimonial End -->
                        <!-- Single Testimonial Start -->
                        <div class="single-testimonial-wrap layout--4">
                            
                            <p>{{ __('site.ABOUT_US_3') }}</p>
                           
                        </div>
                        <!-- Single Testimonial End -->
                    </div>
                </div>
            </div>
            </div>
            <!-- End Story Content Area -->

            <!-- Start Story Thumbnail Area -->
            <div class="col-md-6 order-0 order-md-1">
                <div class="about-thumbnail-area">
                    <img src="/images/about.jpg" alt="" style="min-height:100%;min-width:100%">
                </div>
            </div>
            <!-- End Story Thumbnail Area -->
        </div>
</section>
<!--== End Banner Area Wrapper ==-->
<section class="marketing-service-area mt-120 mb-120 mt-md-80 mt-sm-60">
    <div class="container" style="max-width:1400px">
        <div class="row mtm-40">
            <!-- Single Service item #01 -->
            <div class="col-md-4 text-center">
                <div class="single-service-item">
                    <figure class="portfolio-thumb">
                        <img src="/images/mission.png" alt="Portfolio Image" style="height:100px"/>
                    </figure>
                    <h3>{{ __('site.MISSION_TITTLE') }}</h3>
                    <p>{{ __('site.MISSION') }}</p>
                  
                </div>
            </div>

            <!-- Single Service item #02 -->
            <div class="col-md-4 text-center">
                <div class="single-service-item">
                    <figure class="portfolio-thumb">
                        <img src="/images/ourteam.png" alt="Portfolio Image" style="height:100px"/>
                    </figure>
                    <h3>{{ __('site.VISION_TITTLE') }}</h3>
                    <p>{{ __('site.VISION') }}</p>
                   
                </div>
            </div>

            <!-- Single Service item #03 -->
            <div class="col-md-4 text-center">
                <div class="single-service-item">
                    <figure class="portfolio-thumb">
                        <img src="/images/vision.png" alt="Portfolio Image" style="height:100px"/>
                    </figure>
                    <h3>{{ __('site.OUR_TEAM_TITTLE') }}</h3>
                    <p>{{ __('site.OUR_TEAM') }}</p>
                   
                </div>
            </div>
        </div>
    </div>
</section>
<script>
var min_w = 300;
var vid_w_orig;
var vid_h_orig;

$(function() {

    vid_w_orig = parseInt($('video').attr('width'));
    vid_h_orig = parseInt($('video').attr('height'));

    $(window).resize(function () { fitVideo(); });
    $(window).trigger('resize');

});

function fitVideo() {

    $('#video-viewport').width($('.fullsize-video-bg').width());
    $('#video-viewport').height($('.fullsize-video-bg').height());

    var scale_h = $('.fullsize-video-bg').width() / vid_w_orig;
    var scale_v = $('.fullsize-video-bg').height() / vid_h_orig;
    var scale = scale_h > scale_v ? scale_h : scale_v;

    if (scale * vid_w_orig < min_w) {scale = min_w / vid_w_orig;};

    $('video').width(scale * vid_w_orig);
    $('video').height(scale * vid_h_orig);

    $('#video-viewport').scrollLeft(($('video').width() - $('.fullsize-video-bg').width()) / 2);
    $('#video-viewport').scrollTop(($('video').height() - $('.fullsize-video-bg').height()) / 2);

};

window.addEventListener('orientationchange', function ()
{
    if (window.innerHeight > window.innerWidth)
    {
        document.getElementsByTagName('body')[0].style.transform = "rotate(90deg)";
    }
});
</script>
@stop