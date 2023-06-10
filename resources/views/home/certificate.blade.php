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
.about-thumbnail-area{
    text-align:center;
    background:#cacaca;
}
@font-face {
  font-family: Khamden;
  src: url('/images/Khamden.otf');
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
    .about-thumbnail-area {
        max-height: 512px;
        overflow: hidden;
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
                        <h1>{{ __('site.CERTIFICATE_TITTLE') }}</h1>
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
                                    <h2>{{ __('site.CERTIFICATE_TITTLE') }}</h2>
                                </div>
                                <p class="paragraph-width">{{ __('site.CERTIFICATE_1') }}</p>
                                <p class="paragraph-width" style="font-weight:bold;">{{ __('site.CERTIFICATE_2') }}</p>
                            </div>
                        </div>
                        <!-- End Story Content Area -->

                        <!-- Start Story Thumbnail Area -->
                        <div class="col-md-6 order-0 order-md-1">
                            <div class="about-thumbnail-area">
                                <img src="/images/cert.png" alt="">
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
                                <img src="/images/muhammand.png" alt="" style="height:580px;">
                            </div>
                        </div>
                        <!-- End Story Thumbnail Area -->
                        <!-- Start Story Content Area -->
                        <div class="col-md-6 order-1 my-auto text-left">
                            <div class="about-us-content">
                                <div class="service-left-con-inner">
                                    <h2>{{ __('site.HONORARY_PATRON') }}</h2>
                                </div>
                                <p class="paragraph" style="font-weight:bold;">{{ __('site.HAJI_MUHAMMAD') }}</p>
                                <p class="paragraph">{{ __('site.CERTIFICATE_3') }}</p>
                                <p class="paragraph">{{ __('site.CERTIFICATE_4') }}</p>
                                <p class="paragraph" style="color:red;font-family: Khamden;font-size:26px;">{{ __('site.CERTIFICATE_5') }}</p>
                                <p class="paragraph">{{ __('site.CERTIFICATE_6') }} <br/> {{ __('site.CERTIFICATE_7') }}</p>
                            </div>
                        </div>
                      
                        <!-- End Story Content Area -->

                        
                    </div>
            </section>
        </div>
    </div>
    @stop