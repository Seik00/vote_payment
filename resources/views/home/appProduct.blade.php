@extends('home.header')

@section('content')
<style>
    .text-white{
    color:#980102!important;
}
.feature-info{
    margin-top:10px;
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
                        <h1>APPBOOSTER</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="page-wrapper">
        <div class="blog-details-content-wrapper mt-120 mt-md-80 mt-sm-60 mb-120 mb-md-80 mb-sm-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Start Blog Post Details Content -->
                        <article class="single-post-details">
                            <header class="single-post-details__header">
                                <div class="blog-post-thumb-gallery ht-slick-slider-wrapper">
                                    <div class="ht-slick-slider" data-slick='{"infinite": false, "arrows": true, "prevArrow": ".gallery-prev-arrow", "nextArrow": ".gallery-next-arrow"}'>
                                        <figure class="thumb-item">
                                            <a href="/images/appProduct0.jpg" class="btn-img-gallery">
                                                <img src="/images/appProduct0.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/appProduct1.jpg" class="btn-img-gallery">
                                                <img src="/images/appProduct1.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/appProduct2.jpg" class="btn-img-gallery">
                                                <img src="/images/appProduct2.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/appProduct3.jpg" class="btn-img-gallery">
                                                <img src="/images/appProduct3.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/appProduct4.jpg" class="btn-img-gallery">
                                                <img src="/images/appProduct4.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/paper1.jpg" class="btn-img-gallery">
                                                <img src="/images/paper1.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/paper2.jpg" class="btn-img-gallery">
                                                <img src="/images/paper2.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/paper3.jpg" class="btn-img-gallery">
                                                <img src="/images/paper3.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <!-- <figure class="thumb-item">
                                            <a href="/images/appProduct5.jpg" class="btn-img-gallery">
                                                <img src="/images/appProduct5.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure> -->
                                    </div>

                                    <div class="ht-slick-nav ht-slick-nav--two">
                                        <button class="gallery-prev-arrow"><i class="fa fa-angle-left"></i>
                                        </button>
                                        <button class="gallery-next-arrow"><i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </header>
                            
                        </article>
                    </div>

                    <section class="port-creative-content-area"  style="margin-top:50px;">
                        <!-- Start Single Portfolio Item -->
                        <div class="port-creative-item">
                        <div class="container">
                        <h2 class="font_2" style="font-size:36px; text-align:center;margin-top:30px;"><span class="color_24" style="color:green"><span style="font-family:avenir-lt-w01_35-light1475496,avenir-lt-w05_35-light,sans-serif;"><span class="mobilefont" style="font-size:39px;"><span style="letter-spacing:0.05em;"><span style="text-shadow:rgba(0, 0, 0, 0.4) 0px 4px 5px;font-weight: 400;">{{ __('site.MAIN') }}</span></span></span></span></span><span style="letter-spacing:-0.1em;"><span style="font-family:lulo-clean-w01-one-bold,lulo-clean-w05-one-bold,sans-serif;"><span style="text-shadow:rgba(0, 0, 0, 0.4) 0px 4px 5px;"><span style="font-weight:900;"><span style="color:#000000;"><span class="mobilefont" style="font-size:36px;letter-spacing: 2px;"> {{ __('site.INGREDIENTS') }}</span></span></span></span></span></span></h2>
                            <div class="row">
                                <div class="col-sm">
                                    <figure class="port-creative-item-thumb">
                                            <img src="/images/Collagen.png" alt="Portfolio" />
                                    </figure>
                                    <div class="single-sidebar-item-wrap">
                                        <h6 class="product_font" style="text-align:center;margin-top:10px;">{{ __('site.COLLAGEN') }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <figure class="port-creative-item-thumb">
                                            <img src="/images/Tomato Extract.png" alt="Portfolio" />
                                    </figure>
                                    <div class="single-sidebar-item-wrap">
                                        <h6 class="product_font" style="text-align:center;margin-top:10px;">{{ __('site.TOMATO_EXTRACT') }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <figure class="port-creative-item-thumb">
                                            <img src="/images/Sea Buckthorn.png" alt="Portfolio" />
                                    </figure>
                                    <div class="single-sidebar-item-wrap">
                                        <h6 class="product_font" style="text-align:center;margin-top:10px;">{{ __('site.SEA_BUCTHORN_EXTRACT') }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <figure class="port-creative-item-thumb">
                                            <img src="/images/Mix Berries.png" alt="Portfolio" />
                                    </figure>
                                    <div class="single-sidebar-item-wrap">
                                        <h6 class="product_font" style="text-align:center;margin-top:10px;">{{ __('site.MIX_BERRIES') }}</h6>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <figure class="port-creative-item-thumb">
                                            <img src="/images/Aloevela.png" alt="Portfolio" />
                                    </figure>
                                    <div class="single-sidebar-item-wrap">
                                        <h6 class="product_font" style="text-align:center;margin-top:10px;">{{ __('site.ALOEVERA') }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                    </div>
                        <!-- End Single Portfolio Item -->
                    </section>
                </div>
                
                <section class="skills-wrapper-about pt-60 pt-md-80 pt-sm-30 pb-120 pb-md-80 pb-sm-60">
                    <div class="container custom-width">
                        <div class="row">
                            <div class="col-lg-6">
                                <figure class="portfolio-thumb">
                                    <img src="/images/app_bottom.png" class="img_details" alt="Portfolio Image" />
                                </figure>
                            </div>
                            <div class="col-lg-6" id="col6">
                                <figure class="portfolio-thumb">
                                    <img src="/images/app_details.jpg" class="img_details" alt="Portfolio Image" />
                                </figure>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    @stop