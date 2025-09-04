<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    @include('front.include.head')
</head>

<body class="bg-surface-3 primary-3">

    <!-- RTL -->
    <!-- <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-btn"><span>RTL</span></a> -->
    <!-- /RTL  -->

    <!-- Scroll Top -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-right"></span>
    </button>

    <!-- preload -->
    <div class="preload preload-container">
        <div class="preload-logo">
            <div class="spinner"></div>
        </div>
    </div>
    <!-- /preload -->

    <div id="wrapper">
        <!-- Top Bar-->
        @include('front.include.topbar')
        <!-- /Top Bar -->
        <!-- Header -->
        <header id="header" class="header-default header-absolute header-white header-uppercase">
            @include('front.include.header')
        </header>
        <!-- /Header -->

        <!-- Slider -->
        <div class="tf-slideshow slider-plant slider-default">
            @include('front.include.sidebar')
        </div>
        <!-- /Slider -->

        <!-- Icon box -->
        <div class="flat-spacing-26">
            <div class="container">
                <div class="flat-wrapper-iconbox">
                    <h3 class="title letter-0 font-7 fw-semibold">Why Shop With Us?</h3>
                    <div dir="ltr" class="swiper tf-swiper wow fadeInUp"
                        data-swiper='{
                        "slidesPerView": 1,
                        "spaceBetween": 12,
                        "speed": 800,
                        "preventInteractionOnTransition": false, 
                        "touchStartPreventDefault": false,
                        "pagination": { "el": ".sw-pagination-iconbox", "clickable": true },
                        "breakpoints": {
                            "575": { "slidesPerView": 3, "spaceBetween": 24,"slidesPerGroup": 2}, 
                            "992": { "slidesPerView": 3, "spaceBetween": 24,"slidesPerGroup": 2},
                            "1400": { "slidesPerView": 4, "spaceBetween": 80,"slidesPerGroup": 2}
                        }
                    }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/minimal.png') }}" alt=""
                                            srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Minimalism</div>
                                        <!-- <p class="text-main-3 text-md">Always the best</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/leaf.png') }}" alt="" srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Sustainability</div>
                                        <!-- <p class="text-main-3 text-md">Expect more by default</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/luxury.png') }}" alt="" srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Luxury</div>
                                        <!-- <p class="text-main-3 text-md">We’re here to help</p> -->
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="tf-icon-box style-3 justify-content-center justify-content-lg-start">
                                    <div class="box-icon">
                                        <img src="{{ asset_front('images/icons/luxury.png') }}" alt="" srcset="">
                                    </div>
                                    <div class="content">
                                        <div class="title fw-bold font-7">Elegant</div>
                                        <!-- <p class="text-main-3 text-md">We’re here to help</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex d-xxl-none sw-dot-default sw-pagination-iconbox justify-content-center">
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /Icon box -->

        <!-- Banner With Text-->
        <section class="flat-spacing pt-0 pb_xl-0">
            <div class="container">
                <div class="s2-banner-with-text">
                    <div class="banner">
                        <img src="{{ asset_front('images/slider/shree/4.png') }}"
                            data-src="{{ asset_front('images/slider/shree/4.png') }}" alt="banner" class="lazyload">
                    </div>
                    <div class="content-with-text wow fadeInUp">
                        <div class="box-title-content">
                            <h2 class="title fw-semibold font-7">Refresh Your Space with Luxury</h2>
                            <p class="desc text-main text-md">Discover a range of Sippers that Evalates life into
                                Luxury. Shop now and elevate your space Elegance.</p>
                        </div>
                        <a href="#" class="tf-btn btn-orange animate-btn">Shop Now</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Banner With Text-->

        <!-- Feature Collection -->
        <section class="flat-spacing-2 bg-gradient-2">
            <div class="container">
                <div class="flat-title wow fadeInUp">
                    <h3 class="title letter-0 text-start font-7">Featured Products</h3>
                </div>
                <div class="fl-control-sw2 wrap-pos-nav sw-over-product wow fadeInUp">
                    <div dir="ltr" class="swiper tf-swiper wrap-sw-over"
                        data-swiper='{
                        "slidesPerView": 2,
                        "spaceBetween": 12,
                        "speed": 800,
                        "observer": true,
                        "observeParents": true,
                        "slidesPerGroup": 2,
                        "navigation": {
                            "clickable": true,
                            "nextEl": ".nav-next-product",
                            "prevEl": ".nav-prev-product"
                        },
                        "pagination": { "el": ".sw-pagination-product", "clickable": true },
                        "breakpoints": {
                        "768": { "slidesPerView": 3, "spaceBetween": 12, "slidesPerGroup": 3 },
                        "1200": { "slidesPerView": 4, "spaceBetween": 24, "slidesPerGroup": 4}
                        }
                    }'>
                        <div class="swiper-wrapper">
                                @foreach ($products as $product)
                                    <div class="swiper-slide">
                                        <div class="card-product">
                                            <div class="card-product-wrapper asp-ratio-0">
                                                <a href="{{ route('product-detail', $product->id) }}"
                                                    class="product-img">
                                                    <img class="img-product lazyload"
                                                        data-src="{{ $product->product_images[0]->image_url }}"
                                                        src="{{ $product->product_images[0]->image_url }}"
                                                        alt="{{ $product->title }}">
                                                    @if (isset($product->product_images[1]))
                                                        <img class="img-hover lazyload"
                                                            data-src="{{ $product->product_images[1]->image_url }}"
                                                            src="{{ $product->product_images[1]->image_url }}"
                                                            alt="{{ $product->title }}">
                                                    @endif
                                                </a>
                                                @if ($product->discount > 0)
                                                    <div class="on-sale-wrap">
                                                        <span class="on-sale-item">₹{{ $product->discount }}
                                                            Off</span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="card-product-info">
                                                <a href="{{ route('product-detail', $product->id) }}"
                                                    class="name-product link fw-medium text-md">{{ $product->title }}</a>
                                                <p class="price-wrap fw-medium">
                                                    <span
                                                        class="price-new text-xl text-primary">₹{{ number_format($product->selling_price, 2) }}</span>
                                                    @if ($product->discount > 0)
                                                        <span
                                                            class="price-old">₹{{ number_format($product->mrp, 2) }}</span>
                                                    @endif
                                                </p>
                                                @if ($product->variants && count($product->variants) > 0)
                                                    <ul class="list-color-product style-2">
                                                        @foreach ($product->variants as $index => $variant)
                                                            <li
                                                                class="list-color-item hover-tooltip tooltip-bot color-swatch {{ $index === 0 ? 'active' : '' }}">
                                                                <span
                                                                    class="tooltip color-filter">{{ $variant->color }}</span>
                                                                <span class="swatch-value"
                                                                    style="background-color: {{ $variant->color_code }}"></span>
                                                                <img class="lazyload"
                                                                    data-src="{{ $variant->image }}"
                                                                    src="{{ $variant->image }}"
                                                                    alt="{{ $product->title }}">
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        <div class="d-flex d-xl-none sw-dot-default sw-pagination-product justify-content-center">
                        </div>

                    </div>
                    <div class="d-none d-xl-flex swiper-button-next nav-swiper nav-next-product"></div>
                    <div class="d-none d-xl-flex swiper-button-prev nav-swiper nav-prev-product"></div>
                </div>
            </div>
        </section>
        <!-- /Feature Collection -->

        <!-- Banner With Text-->
        <section class="flat-spacing-3">
            <div class="container">
                <div class="s3-banner-with-text">
                    <div class="content-with-text wow fadeInUp">
                        <div class="box-title-content">
                            <span class="subtitle text-md fw-medium">LIFE GATHERS AROUND SIPPER</span>
                            <h2 class="title fw-semibold font-7">Perfect Sipper for Every Corner</h2>
                            <p class="desc text-main text-md">Lorem Ipsum is simply dummy text of the printing and
                                typesetting industry.</p>
                        </div>
                    </div>
                    <div class="image-banner">
                        <div class="image image-1 hover-img">
                            <div class="shine-item img-style wow fadeInRight" data-wow-delay="0.1s">
                                <img src="{{ asset_front('images/banner/banner1.jpeg') }}"
                                    data-src="{{ asset_front('images/slider/shree/1.png') }}" alt=""
                                    class="lazyload">
                            </div>
                        </div>
                        <div class="image image-2 hover-shine hover-img">
                            <div class="shine-item img-style wow fadeInRight">
                                <img src="{{ asset_front('images/banner/banner1.jpeg') }}"
                                    data-src="{{ asset_front('images/slider/shree/3.png') }}" alt=""
                                    class="lazyload">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Banner With Text-->
        <!-- Testimonial -->
        <section class="flat-spacing-3">
            <div class="container-3">
                <div class="flat-wrapper-testimonial bg-dark-green-4">
                    <img class="img-item-1 absolute" src="{{ asset_front('images/slider/shree/5.jpeg') }}" alt=""
                        style="max-width: 120px;">
                    <img class="img-item-2 absolute" src="{{ asset_front('images/slider/shree/6.jpeg') }}" alt=""
                        style="max-width: 120px;">

                    <div dir="ltr" class="swiper tf-swiper"
                        data-swiper='{
                        "slidesPerView": 1,
                        "speed": 800,
                        "spaceBetween": 24,
                        "pagination": { "el": ".sw-pagination-tes", "clickable": true }
                        }'>
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="wg-testimonial-3 text-center wow fadeInUp">
                                    <div class="box-top">
                                        <i class="icon icon-leaf text-white fs-42"></i>
                                        <p class="text-md text-white">
                                            HAPPY CUSTOMERS
                                        </p>
                                    </div>
                                    <div class="box-title-desc">
                                        <h3 class="title-review text-white font-7 fw-semibold">“Beautiful, Amazing
                                            Sipper!"</h3>
                                        <p class="text-white desc display-xs">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                    </div>

                                    <div class="box-author">
                                        <p class="text-md fw-medium text-white">
                                            Fyll
                                        </p>
                                        <p class="text-xs text-white">
                                            Item purchased:
                                            <span class="text-sm">
                                                Olive Sipper
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wg-testimonial-3 text-center  wow fadeInUp">
                                    <div class="box-top">
                                        <i class="icon icon-leaf text-white fs-42"></i>
                                        <p class="text-md text-white">
                                            HAPPY CUSTOMERS
                                        </p>
                                    </div>
                                    <div class="box-title-desc">
                                        <h3 class="title-review text-white font-7 fw-semibold">"Gorgeous, Thriving
                                            Sipper!"</h3>
                                        <p class="text-white desc display-xs">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                    </div>
                                    <div class="box-author">
                                        <p class="text-md fw-medium text-white">
                                            Lisa
                                        </p>
                                        <p class="text-xs text-white">
                                            Item purchased:
                                            <span class="text-sm">
                                                Olive Sipper
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="wg-testimonial-3 text-center  wow fadeInUp">
                                    <div class="box-top">
                                        <i class="icon icon-leaf text-white fs-42"></i>
                                        <p class="text-md text-white">
                                            HAPPY CUSTOMERS
                                        </p>
                                    </div>
                                    <div class="box-title-desc">
                                        <h3 class="title-review text-white font-7 fw-semibold">"Vibrant, Luxury!"
                                        </h3>
                                        <p class="text-white desc display-xs">
                                            Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        </p>
                                    </div>
                                    <div class="box-author">
                                        <p class="text-md fw-medium text-white">
                                            Emily
                                        </p>
                                        <p class="text-xs text-white">
                                            Item purchased:
                                            <span class="text-sm">
                                                Ficus Audrey Sipper
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sw-dot-default style-white sw-pagination-tes justify-content-center"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Testimonial -->
        <!-- Footer -->
        <footer id="footer" class="footer-default footer-bg xl-pb-70 bg-dark-green-4">
            <div class="footer-top">
                <div class="container">
                    <div class="footer-top-wrap">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="{{ asset_front('images/logo/logo-white.png') }}" class="logo" alt="logo">
                            </a>
                        </div>
                        <ul class="tf-social-icon style-large">
                            <li>
                                <a href="https://www.facebook.com/" class="social-item social-facebook">
                                    <i class="icon icon-fb"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/" class="social-item social-instagram">
                                    <i class="icon icon-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.snapchat.com/" class="social-item social-linkedin"><i
                                        class="icon icon-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://x.com/" class="social-item social-x">
                                    <i class="icon icon-x"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-body">
                <div class="container">
                    <div class="row-footer">
                        <div class="footer-col-block s1">
                            <div class="footer-heading footer-heading-mobile text-xl fw-medium">
                                Business Contact
                            </div>
                            <div class="tf-collapse-content">
                                <div class="footer-contact">
                                    <ul class="footer-info">
                                        <li class="item">
                                            <span class="box-icon">
                                                <svg width="12" height="14" viewBox="0 0 12 14"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.1869 1.73431C9.06854 0.61592 7.58155 0 5.99993 0C4.4183 0 2.93129 0.61592 1.81292 1.73431C0.694534 2.85273 0.0786133 4.33969 0.0786133 5.92129C0.0786133 9.12084 3.10388 11.7821 4.72917 13.2118C4.95504 13.4105 5.15008 13.582 5.30547 13.7272C5.50016 13.9091 5.75006 14 5.9999 14C6.24979 14 6.49964 13.9091 6.69435 13.7272C6.84975 13.582 7.04479 13.4105 7.27065 13.2118C8.89594 11.7821 11.9212 9.12084 11.9212 5.92129C11.9212 4.33969 11.3053 2.85273 10.1869 1.73431ZM6.72897 12.5961C6.49816 12.7991 6.29885 12.9744 6.13451 13.1279C6.05902 13.1984 5.94078 13.1984 5.86526 13.1279C5.70095 12.9744 5.50161 12.7991 5.2708 12.596C3.74283 11.2519 0.898656 8.75001 0.898656 5.92131C0.898656 3.1085 3.18704 0.820124 5.99987 0.820124C8.81268 0.820124 11.1011 3.1085 11.1011 5.92131C11.1011 8.75001 8.25694 11.2519 6.72897 12.5961Z"
                                                        fill="#0D0D0D" />
                                                    <path
                                                        d="M6.00008 3.08887C4.56122 3.08887 3.39062 4.25943 3.39062 5.69829C3.39062 7.13715 4.56122 8.30772 6.00008 8.30772C7.43894 8.30772 8.6095 7.13715 8.6095 5.69829C8.6095 4.25943 7.43894 3.08887 6.00008 3.08887ZM6.00008 7.48759C5.01343 7.48759 4.21072 6.68489 4.21072 5.69826C4.21072 4.71164 5.01343 3.90894 6.00008 3.90894C6.98673 3.90894 7.7894 4.71164 7.7894 5.69826C7.7894 6.68489 6.98673 7.48759 6.00008 7.48759Z"
                                                        fill="#0D0D0D" />
                                                </svg>
                                            </span>
                                            <a target="_blank"
                                                href="https://www.google.com/maps?q=123Yarranst,Punchbowl,NSW2196,Indore">
                                                123 Yarran st, Punchbowl, NSW 2196, Indore
                                            </a>
                                        </li>
                                        <li class="item">
                                            <span class="box-icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.6666 9.4091L10.9841 8.4641C10.7324 8.12417 10.3574 7.89649 9.93972 7.82996C9.522 7.76343 9.09484 7.86335 8.74998 8.10827L8.09081 8.59243C7.13399 7.73698 6.36526 6.69214 5.83331 5.5241L6.49248 5.04577C6.837 4.79478 7.06794 4.41741 7.13464 3.99641C7.20135 3.5754 7.09838 3.14513 6.84831 2.79993L6.18331 1.86077C5.93339 1.51663 5.55703 1.28582 5.13698 1.21909C4.71693 1.15236 4.28757 1.25518 3.94331 1.50493L2.91664 2.23993C2.58681 2.47798 2.33009 2.80349 2.17547 3.17972C2.02086 3.55595 1.9745 3.96792 2.04164 4.3691C2.33803 6.09644 3.02915 7.73206 4.06118 9.14856C5.0932 10.5651 6.43827 11.7242 7.99164 12.5358C8.30603 12.696 8.65376 12.78 9.00664 12.7808C9.46814 12.7804 9.91756 12.6333 10.29 12.3608L11.3108 11.6666C11.4837 11.5428 11.6302 11.3858 11.7419 11.2048C11.8535 11.0238 11.9281 10.8224 11.9612 10.6123C11.9943 10.4023 11.9853 10.1877 11.9347 9.98113C11.8842 9.77457 11.793 9.58012 11.6666 9.4091ZM10.7975 10.9433L9.78248 11.6666C9.58631 11.8098 9.35413 11.8954 9.11199 11.914C8.86984 11.9325 8.62732 11.8832 8.41164 11.7716C6.97557 11.0225 5.73227 9.95129 4.779 8.6418C3.82572 7.33231 3.18832 5.82004 2.91664 4.22327C2.87745 3.98261 2.90577 3.73579 2.99846 3.51026C3.09114 3.28473 3.24455 3.08933 3.44164 2.94577L4.45664 2.21077C4.6131 2.09841 4.80765 2.05252 4.99783 2.08312C5.188 2.11373 5.35834 2.21833 5.47164 2.3741L6.15998 3.3191C6.27119 3.47659 6.31717 3.67098 6.28831 3.8616C6.27352 3.95579 6.24012 4.04608 6.19004 4.12721C6.13996 4.20834 6.07421 4.27867 5.99664 4.3341L5.05164 5.02243C4.97248 5.07857 4.91486 5.16007 4.88834 5.25342C4.86182 5.34678 4.86798 5.44639 4.90581 5.53577C5.52168 7.06896 6.5077 8.42575 7.77581 9.48493C7.85256 9.54453 7.94697 9.57689 8.04414 9.57689C8.14132 9.57689 8.23573 9.54453 8.31248 9.48493L9.25748 8.80243C9.41322 8.68947 9.60729 8.64263 9.79741 8.67214C9.98754 8.70164 10.1583 8.80508 10.2725 8.95993L10.9608 9.9166C11.072 10.0741 11.118 10.2685 11.0891 10.4591C11.0752 10.5552 11.0422 10.6475 10.9921 10.7306C10.942 10.8137 10.8759 10.886 10.7975 10.9433Z"
                                                        fill="#0D0D0D" />
                                                </svg>
                                            </span>
                                            <a href="tel:18888383022">(64) 8342 1245</a>
                                        </li>
                                        <li class="item">
                                            <span class="box-icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.8125 2.625H2.1875C1.8394 2.625 1.50556 2.76328 1.25942 3.00942C1.01328 3.25556 0.875 3.5894 0.875 3.9375V10.0625C0.875 10.4106 1.01328 10.7444 1.25942 10.9906C1.50556 11.2367 1.8394 11.375 2.1875 11.375H11.8125C12.1606 11.375 12.4944 11.2367 12.7406 10.9906C12.9867 10.7444 13.125 10.4106 13.125 10.0625V3.9375C13.125 3.5894 12.9867 3.25556 12.7406 3.00942C12.4944 2.76328 12.1606 2.625 11.8125 2.625ZM11.5675 3.5L7.28 7.07438C7.20139 7.13985 7.10231 7.17571 7 7.17571C6.89769 7.17571 6.79861 7.13985 6.72 7.07438L2.4325 3.5H11.5675ZM11.8125 10.5H2.1875C2.07147 10.5 1.96019 10.4539 1.87814 10.3719C1.79609 10.2898 1.75 10.1785 1.75 10.0625V4.06875L6.16 7.74375C6.39584 7.94019 6.69307 8.04776 7 8.04776C7.30693 8.04776 7.60416 7.94019 7.84 7.74375L12.25 4.06875V10.0625C12.25 10.1785 12.2039 10.2898 12.1219 10.3719C12.0398 10.4539 11.9285 10.5 11.8125 10.5Z"
                                                        fill="#0D0D0D" />
                                                </svg>
                                            </span>
                                            <a href="mailto:support@example.com">support@example.com</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="footer-inner-wrap footer-col-block s2">
                            <div class="footer-heading footer-heading-mobile text-xl fw-medium">
                                Subscribe Newsletter
                            </div>
                            <div class="tf-collapse-content">
                                <div class="footer-newsletter">
                                    <p>
                                        We invite you to register to read the latest news, offers and events about
                                        our company. We promise not spam your inbox.
                                    </p>
                                    <form action="#" class="form-newsletter" id="subscribe-form" method=" post"
                                        accept-charset="utf-8" data-mailchimp="true">
                                        <div id="subscribe-content" class="subscribe-content">
                                            <fieldset class="email">
                                                <input type="email" name="email-form" id="subscribe-email"
                                                    class="subscribe-email" placeholder="Email address"
                                                    tabindex="0" aria-required="true" required>
                                            </fieldset>
                                            <div class="button-submit">
                                                <button id="subscribe-button" class="subscribe-button animate-btn"
                                                    type="button">
                                                    <svg width="18" height="18" viewBox="0 0 18 18"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g clip-path="url(#clip0_5296_3345)">
                                                            <path
                                                                d="M17.7938 8.50229L17.7931 8.50162L14.1192 4.84537C13.8439 4.57147 13.3988 4.57249 13.1248 4.84776C12.8508 5.123 12.8519 5.56818 13.1271 5.84212L15.5938 8.29687H0.703125C0.314789 8.29687 0 8.61166 0 9C0 9.38833 0.314789 9.70312 0.703125 9.70312H15.5938L13.1272 12.1579C12.8519 12.4318 12.8509 12.877 13.1248 13.1522C13.3988 13.4275 13.844 13.4285 14.1192 13.1546L17.7932 9.49837L17.7938 9.4977C18.0692 9.22285 18.0683 8.77623 17.7938 8.50229Z"
                                                                fill="white" />
                                                        </g>
                                                        <defs>
                                                            <clipPath id="clip0_5296_3345">
                                                                <rect width="18" height="18" fill="white" />
                                                            </clipPath>
                                                        </defs>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div id="subscribe-msg"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="footer-inner-wrap s3">

                            <div class="footer-col-block inner-col">
                                <div class="footer-heading footer-heading-mobile text-xl fw-medium">Resource</div>
                                <div class="tf-collapse-content">
                                    <ul class="footer-menu-list">
                                        <li>
                                            <a href="privacy-policy.html">Privacy Policies</a>
                                        </li>
                                        <li>
                                            <a href="term-and-condition.html">Terms & Conditions</a>
                                        </li>
                                        <li>
                                            <a href="return-and-refund.html">Returns & Refunds</a>
                                        </li>
                                        <li>
                                            <a href="faq.html">FAQ’s</a>
                                        </li>
                                        <li>
                                            <a href="shipping.html">Shipping</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="footer-bottom-wrap">
                        <p>Copyright © 2025 by <span class="fw-medium">Fyll.</span> All Rights
                            Reserved.</p>
                        <div class="box-right">
                            <a class="link" href="privacy-policy.html">Privacy Policy</a>
                            <a class="link" href="term-and-condition.html">Term of Use</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- /Footer -->

    </div>


    <!-- modal demo -->
    <div class="modal fade modalDemo" id="modalDemo">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="header">
                    <h5 class="demo-title">Ultimate HTML Theme</h5>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="mega-menu">
                    <div class="row-demo">
                        <div class="demo-item">
                            <a href="index.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/fashion-1.jpg"
                                    src="images/demo/fashion-1.jpg" alt="home-fashion">
                                <div class="demo-label">
                                    <span>New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </a>
                            <a href="index.html" class="demo-name link">Fashion Style 1</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-fashion-02.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/fashion-2.jpg"
                                    src="images/demo/fashion-2.jpg" alt="home-fashion">
                            </a>
                            <a href="home-fashion-02.html" class="demo-name link">Fashion Style
                                2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-electronic.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/electronic.jpg"
                                    src="images/demo/electronic.jpg" alt="home-electronic">
                            </a>
                            <a href="home-electronic.html" class="demo-name link">Electronic</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-furniture.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/furniture.jpg"
                                    src="images/demo/furniture.jpg" alt="home-furniture">
                            </a>
                            <a href="home-furniture.html" class="demo-name link">Furniture</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-fashion-women.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/women-fashion.jpg"
                                    src="images/demo/women-fashion.jpg" alt="home-women-fashion">
                                <div class="demo-label">
                                    <span>New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </a>
                            <a href="home-fashion-women.html" class="demo-name link">Women
                                Fashion</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-skincare.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/comestic.jpg"
                                    src="images/demo/comestic.jpg" alt="home-comestic">
                            </a>
                            <a href="home-skincare.html" class="demo-name link">Skincare</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-bicycle.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/bicycle.jpg"
                                    src="images/demo/bicycle.jpg" alt="home-bicycle">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-bicycle.html" class="demo-name link">Bicycle</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-phonecase.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/phonecase.jpg"
                                    src="images/demo/phonecase.jpg" alt="home-phonecase">
                            </a>
                            <a href="home-phonecase.html" class="demo-name link">Phone Case</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pet-accessories.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/pet-accessories.jpg"
                                    src="images/demo/pet-accessories.jpg" alt="home-pet">
                            </a>
                            <a href="home-pet-accessories.html" class="demo-name link">Pet
                                Accessories</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-sportwear.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/sportwear.jpg"
                                    src="images/demo/sportwear.jpg" alt="home-bicycle">
                            </a>
                            <a href="home-sportwear.html" class="demo-name link">Sportwear</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-jewelry.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/jewelry.jpg"
                                    src="images/demo/jewelry.jpg" alt="home-jewelry">
                            </a>
                            <a href="home-jewelry.html" class="demo-name link">Jewelry</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-electric-accessories.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/eletric-accessories.jpg"
                                    src="images/demo/eletric-accessories.jpg" alt="home-electric-accessories">
                                <div class="demo-label">
                                    <span>New</span>
                                    <span class="demo-hot">Hot</span>
                                </div>
                            </a>
                            <a href="home-electric-accessories.html" class="demo-name link">Electric Accessories</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-mega-electronic.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/mega-shop.jpg"
                                    src="images/demo/mega-shop.jpg" alt="home-mega-electronic">
                            </a>
                            <a href="home-mega-electronic.html" class="demo-name link">Mega Shop</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-vegetable.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/supermarket.jpg"
                                    src="images/demo/supermarket.jpg" alt="home-supermarket">
                            </a>
                            <a href="home-vegetable.html" class="demo-name link">Supermarket</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pod.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/pod.jpg" src="images/demo/pod.jpg"
                                    alt="home-pod">
                            </a>
                            <a href="home-pod.html" class="demo-name link">Print On Demand</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-baby.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/baby.jpg" src="images/demo/baby.jpg"
                                    alt="home-baby">
                                <div class="demo-label">
                                    <span>New</span>
                                </div>
                            </a>
                            <a href="home-baby.html" class="demo-name link">Baby</a>
                        </div>
                        <div class="demo-item">
                            <a href="index.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/plant.jpg" src="images/demo/plant.jpg"
                                    alt="home-plant">
                            </a>
                            <a href="index.html" class="demo-name link">Sipper</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-jewelry2.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/jewelry2.jpg"
                                    src="images/demo/jewelry2.jpg" alt="home-jewelry">
                            </a>
                            <a href="home-jewelry2.html" class="demo-name link">Jewelry 2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-pickleball.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/pickleball.jpg"
                                    src="images/demo/pickleball.jpg" alt="home-pickleball">
                            </a>
                            <a href="home-pickleball.html" class="demo-name link">Pickleball</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-handcraft.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/handcraft.jpg"
                                    src="images/demo/handcraft.jpg" alt="home-handcraft">
                            </a>
                            <a href="home-handcraft.html" class="demo-name link">Handcraft</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-furniture2.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/furniture2.jpg"
                                    src="images/demo/furniture2.jpg" alt="home-furniture">
                            </a>
                            <a href="home-furniture2.html" class="demo-name link">Furniture 2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-skincare2.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/skincare2.jpg"
                                    src="images/demo/skincare2.jpg" alt="home-skincare">
                            </a>
                            <a href="home-skincare2.html" class="demo-name link">Skincare 2</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-supplement.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/supplement.jpg"
                                    src="images/demo/supplement.jpg" alt="home-skincare">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-supplement.html" class="demo-name link">Supplement</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-footwear.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/footwear.jpg"
                                    src="images/demo/footwear.jpg" alt="home-skincare">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-footwear.html" class="demo-name link">Footwear</a>
                        </div>
                        <div class="demo-item">
                            <a href="home-glasses.html" class="demo-image">
                                <img class="lazyload" data-src="images/demo/glasses.jpg"
                                    src="images/demo/glasses.jpg" alt="home-skincare">
                                <div class="demo-label"><span>New</span></div>
                            </a>
                            <a href="home-glasses.html" class="demo-name link">Glasses</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /modal demo -->

    <!-- toolbar -->
     @include('front.include.toolbar')
    <!-- /toolbar  -->

    <!-- login -->
    <div class="offcanvas offcanvas-end popup-style-1 popup-login" id="login">
        <div class="canvas-wrapper">
            <div class="canvas-header popup-header">
                <span class="title">Log in</span>
                <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="canvas-body popup-inner">
                @include('front.include.login')
            </div>
        </div>
    </div>
    <!-- /login -->

    <!-- Reset pass -->
    <div class="offcanvas offcanvas-end popup-style-1 popup-reset-pass" id="resetPass">
        <div class="canvas-wrapper">
            <div class="canvas-header popup-header">
                <span class="title">Reset Your Password</span>
                <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="canvas-body popup-inner">
                <form action="#" class="form-login">
                    <div class="">
                        <p class="text text-sm text-main-2">Forgot your password? No worries! Enter your registered
                            email to receive a link and securely reset it in just a few steps.</p>
                        <fieldset class="email mb_12">
                            <input type="email" placeholder="Enter Your Email*" required>
                        </fieldset>
                    </div>
                    <div class="bot">
                        <div class="button-wrap">
                            <button class="subscribe-button tf-btn animate-btn bg-dark-2 w-100" type="submit">Reset
                                Password</button>
                            <button type="button" data-bs-dismiss="offcanvas"
                                class="tf-btn btn-out-line-dark2 w-100">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Reset pass -->

    <!-- shoppingCart -->
    @include('front.include.cart')
    <!-- /shoppingCart -->

    <!-- Javascript -->
    <script src="{{ asset_front('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset_front('js/jquery.min.js') }}"></script>
    <script src="{{ asset_front('js/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset_front('js/carousel.js') }}"></script>
    <script src="{{ asset_front('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset_front('js/lazysize.min.js') }}"></script>
    <script src="{{ asset_front('js/count-down.js') }}"></script>
    <script src="{{ asset_front('js/wow.min.js') }}"></script>
    <script src="{{ asset_front('js/multiple-modal.js') }}"></script>
    <script src="{{ asset_front('js/main.js') }}"></script>
    <script src="{{ asset_front('js/api/login.js') }}"></script>
</body>

</html>
