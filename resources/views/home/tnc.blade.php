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
    .col-lg-1.col-sm-2{
        max-width:10%;
    }
    .col-lg-11.col-sm-8{
        max-width:80%;
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
    span.fa.fa-hand-o-right{
        font-size:25px;
    }
    span.fa.fa-angle-right{
        font-size:25px;
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
                        <h1>{{ __('site.TNC') }}</h1>
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
                        <div class="about-page-testimonial mt-10 col-xl-8 mx-auto">
                        
                            <div class="ht-slick-slider-wrapper">
                            <div class="service-left-con-inner">
                                <h2>{{ __('site.TNC') }}</h2>
                                <p style="font-weight:bold">{{ __('site.TNC_1') }}</p>
                            </div>
                                <div class="ht-slick-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "dots": true}'>
                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_2') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_3') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_4') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_5') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_6') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_7') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_8') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-hand-o-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <p>{{ __('site.TNC_9') }}</p>
                                                </div>
                                            </div>
                                        </div>
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
                                <img src="/images/tnc3.jpg" alt="" style="min-height:100%;min-width:100%">
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
                                <img src="/images/tnc22.jpg" alt="" style="min-height:100%;min-width:100%">
                            </div>
                        </div>
                        <!-- End Story Thumbnail Area -->
                        <!-- Start Story Content Area -->
                        <div class="col-md-6 order-1 my-auto text-center">
                        <div class="about-page-testimonial mt-10 col-xl-8 mx-auto">
                            <div class="service-left-con-inner">
                                <h2>{{ __('site.DESCRIPTION') }}</h2>
                                <p style="font-weight:bold">{{ __('site.DESCRIPTION_1') }}</p>
                            </div>
                        
                            <div class="ht-slick-slider-wrapper">
                                <div class="ht-slick-slider" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "dots": true}'>
                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_2') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_3') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_4') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_5') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_6') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_7') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_8') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_9') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_10') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_11') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_12') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_13') }}<span style="font-weight:900">{{ __('site.DESCRIPTION_13_a') }}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_14') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_15') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <!-- Single Testimonial End -->

                                    <!-- Single Testimonial Start -->
                                    <div class="single-testimonial-wrap layout--4">
                                       
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-1 col-sm-2">
                                                <span class="fa fa-angle-right"></span>
                                                </div>
                                                <div class="col-lg-11 col-sm-8">
                                                <h5>{{ __('site.DESCRIPTION_16') }}</h5>
                                                <p>{{ __('site.DESCRIPTION_17') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        
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