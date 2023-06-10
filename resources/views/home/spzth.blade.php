@extends('home.header')

@section('content')
<style>
    .text-white{
    color:#980102!important;
}
.feature-info{
    margin-top:10px;
}
.about-page-testimonial .single-testimonial-wrap.layout--4.slick-slide.slick-current{
    background:white;
}
.about-page-testimonial .single-testimonial-wrap.layout--4{
    background:white;
}
@media screen and (max-width: 992px) {
    .page-header-wrapper.bg-offwhite{
        margin-top:100px;
    }   
    h4#h4font{
        margin-bottom:0px;
    }
    .port-creative-item-thumb{
        margin-bottom:0px;
    }
    h6.product_font{
        margin-bottom:35px;
    }
    #col6 {
        margin-top:50px;
    }
    span.mobilefont{
        font-size:25px!important;
    }
}
@media screen and (min-width: 992px) {
    .page-header-wrapper.bg-offwhite{
        margin-top:50px;
    }   
    .page-header-wrapper.bg-offwhite{
        margin-top:50px;
    }   
    h4#h4font{
        margin-bottom:-20px;
    }
    .single-post-details .blog-post-thumb-gallery{
        max-height:600px;
    }
    img.img_details{
        height:850px;
    }
}
.skills-wrapper-about:before{
    background: white;
}
</style>
<div class="page-header-wrapper bg-offwhite">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="page-header-content d-flex">
                        <h1>{{ __('site.SPZTH_TITTLE') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="page-wrapper">
        <div class="blog-details-content-wrapper mt-md-80 mt-sm-60 mb-md-80 mb-sm-60">
            <section class="story-content-wrapper">
                    <div class="row align-items-center no-gutters">

                        <!-- Start Story Content Area -->
                        <div class="col-md-6 order-1 my-auto text-center">
                            <div class="about-us-content">
                                <div class="service-left-con-inner">
                                    <h2>SPZTH</h2>
                                </div>
                                <p class="paragraph-width">{{ __('site.SPZTH_1') }}</p>
                                <!-- <iframe src="/images/SURAT_SPZTH_YDA.pdf" height="100%" width="100%"> -->
                                <a href="/home/suratPDF" target="_blank" class="btn btn-event mt-54 mt-md-22 mt-sm-22">{{ __('site.READ_MORE') }}</a>
                            </div>
                        </div>
                        <!-- End Story Content Area -->

                        <!-- Start Story Thumbnail Area -->
                        <div class="col-md-6 order-0 order-md-1">
                            <div class="about-thumbnail-area">
                                <img src="/images/ss.jpg" alt="" style="min-height:100%;min-width:100%">
                            </div>
                        </div>
                        <!-- End Story Thumbnail Area -->
                    </div>
            </section>
            <section class="story-content-wrapper">
                    <div class="row align-items-center no-gutters">
                        <!-- Start Story Thumbnail Area -->
                        <div class="col-md-6 order-0 order-md-1">
                            <div class="about-thumbnail-area">
                                <img src="/images/y.jpg" alt="" style="min-height:100%;min-width:100%">
                            </div>
                        </div>
                        <!-- End Story Thumbnail Area -->
                        <!-- Start Story Content Area -->
                        <div class="col-md-6 order-1 my-auto text-center">
                        <div class="about-page-testimonial mt-10 col-xl-8 mx-auto">
                        
                            <div class="ht-slick-slider-wrapper">
                            <div class="about-us-content" style="padding:0px!important;">
                            <div class="service-left-con-inner">
                                    <h2>SPZTH</h2>
                                </div>
                            </div>
                                <div class="ht-slick-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "dots": true}'>
                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                            <p>{{ __('site.SPZTH_2') }}</p>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                            <p>{{ __('site.SPZTH_3') }}</p>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                            <p>{{ __('site.SPZTH_4') }}</p>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                            <p>{{ __('site.SPZTH_5') }}</p>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                            <p>{{ __('site.SPZTH_6') }}</p>
                                    </div>
                                    <!-- Single Testimonial End -->

                                     <!-- Single Testimonial Start -->
                                     <div class="single-testimonial-wrap layout--4">
                                            <p>{{ __('site.SPZTH_7') }}</p>
                                    </div>
                                    <!-- Single Testimonial End -->
                                </div>
                            </div>
                        </div>
                        </div>
                        <!-- End Story Content Area -->

                        
                    </div>
            </section>
        </div>
    </div>
    @stop