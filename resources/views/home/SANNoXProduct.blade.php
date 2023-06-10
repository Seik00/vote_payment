@extends('home.header')

@section('content')
<style>
    .text-white{
    color:#980102!important;
}
.feature-info{
    margin-top:10px;
}
.slick-slider img {
    width: 50%;
    margin: auto;
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
        max-height:100%;
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
                        <h1>{{ __('site.SANNoXProduct') }}</h1>
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
                                            <a href="/images/sannox.png" class="btn-img-gallery">
                                                <img src="/images/sannox.png" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/ingredients.png" class="btn-img-gallery">
                                                <img src="/images/ingredients.png" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        <figure class="thumb-item">
                                            <a href="/images/ingredients2.png" class="btn-img-gallery">
                                                <img src="/images/ingredients2.png" alt="Blog Details"/>
                                            </a>
                                        </figure>
                                        
                                        <figure class="thumb-item">
                                            <a href="/images/sonax_cloth.jpg" class="btn-img-gallery">
                                                <img src="/images/sonax_cloth.jpg" alt="Blog Details"/>
                                            </a>
                                        </figure>
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
                            <h2 class="font_2" style="font-size:36px; text-align:center;margin-top:30px;">SANNoX</h2>
                            <h5 style="text-align:center">
                            {{ __('site.SANNoX_INGREDIENTS') }}
                            </h5>
                            <h6 style="margin-top:50px;">
                                {{ __('site.SANNoX_INGREDIENTS_2') }}
                            </h6>
                            <h6 class="mt-3">
                                {{ __('site.SANNoX_INGREDIENTS_3') }}
                            </h6>
                            <h6 class="mt-3">
                                {{ __('site.SANNoX_INGREDIENTS_4') }}
                            </h6>
                            <h6 class="mt-3">
                                {{ __('site.SANNoX_INGREDIENTS_5') }}
                            </h6>
                            <h6 class="mt-3">
                                {{ __('site.SANNoX_INGREDIENTS_6') }}
                            </h6>
                        </div>
                            
                    </div>
                        <!-- End Single Portfolio Item -->
                    </section>
                    <section class="port-creative-content-area"  style="margin-top:80px;">
                        <!-- Start Single Portfolio Item -->
                        <div class="port-creative-item">
                        <div class="container">
                            <h2 class="font_2" style="font-size:36px; text-align:center;margin-top:30px;">{{ __('site.INGREDIENT_FUNCTIONS') }}</h2>

                            <h4 class="mt-5">
                            {{ __('site.ASCORBIC_ACID') }}
                            </h4>
                            <h6 class="mt-3">
                                <ul class="list">
                                <li><i class="fa fa-check"></i>{{ __('site.ASCORBIC_ACID_2') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.ASCORBIC_ACID_3') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.ASCORBIC_ACID_4') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.ASCORBIC_ACID_5') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.ASCORBIC_ACID_6') }}</li>
                                </ul>
                            </h6>

                            <h4 class="mt-5">
                            {{ __('site.NIGELLA_SATIVA_EXTRACT') }}
                            </h4>
                            <h6 class="mt-3">
                                <ul class="list">
                                <li><i class="fa fa-check"></i>{{ __('site.NIGELLA_SATIVA_EXTRACT_2') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.NIGELLA_SATIVA_EXTRACT_3') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.NIGELLA_SATIVA_EXTRACT_4') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.NIGELLA_SATIVA_EXTRACT_5') }}</li>
                                </ul>
                            </h6>

                            <h4 class="mt-5">
                            {{ __('site.ZINC_GLUCONATE') }}
                            </h4>
                            <h6 class="mt-3">
                                <ul class="list">
                                <li><i class="fa fa-check"></i>{{ __('site.ZINC_GLUCONATE_2') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.ZINC_GLUCONATE_3') }}</li>
                                </ul>
                            </h6>

                            <h4 class="mt-5">
                            {{ __('site.VITAMIN_B6_[PYRIDOXINE]') }}
                            </h4>
                            <h6 class="mt-3">
                                <ul class="list">
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_B6_[PYRIDOXINE]_2') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_B6_[PYRIDOXINE]_3') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_B6_[PYRIDOXINE]_4') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_B6_[PYRIDOXINE]_5') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_B6_[PYRIDOXINE]_6') }}</li>
                                </ul>
                            </h6>

                            <h4 class="mt-5">
                            {{ __('site.VITAMIN_D3') }}
                            </h4>
                            <h6 class="mt-3">
                                <ul class="list">
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_D3') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_D3_2') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_D3_3') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_D3_4') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_D3_5') }}</li>
                                <li><i class="fa fa-check"></i>{{ __('site.VITAMIN_D3_6') }}</li>
                                </ul>
                            </h6>

                        </div>
                            
                    </div>
                        <!-- End Single Portfolio Item -->
                    </section>
                   
                </div>
                
              
               
            </div>
        </div>
    </div>
    @stop