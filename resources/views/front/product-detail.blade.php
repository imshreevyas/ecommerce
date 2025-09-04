<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    @include('front.include.head')
</head>

<body class="bg-surface-3 primary-3">
    <!-- Scroll Top -->
    <button id="goTop" class="pos1">
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
       
        <!-- Breadcrumb -->
        <div class="breadcrumb-sec">
            <div class="container">
                <div class="breadcrumb-wrap">
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">{{$product->title}}</div>
                    </div>
                    <!--<div class="breadcrumb-prev-next">-->
                    <!--    <a href="#" class="breadcrumb-prev"><i class="icon icon-arr-left"></i></a>-->
                    <!--    <a href="#" class="breadcrumb-back"><i class="icon icon-shop"></i></a>-->
                    <!--    <a href="#" class="breadcrumb-next"><i class="icon icon-arr-right2"></i></a>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!-- /Breadcrumb -->

        <!-- Product Main -->
        <section class="flat-single-product">
            <div class="tf-main-product section-image-zoom">
                <div class="container">
                    <div class="row">
                        <!-- Product Images -->
                        <div class="col-md-6">
                            <div class="tf-product-media-wrap sticky-top">
                                <div class="product-thumbs-slider">
                                    <div dir="ltr" class="swiper tf-product-media-thumbs other-image-zoom"
                                        data-preview="4" data-direction="vertical">
                                        <div class="swiper-wrapper stagger-wrap">
                                            <!-- black -->
                                            @foreach ($product->product_images as $image)
                                                <div class="swiper-slide stagger-item" data-color="black" data-size="small">
                                                    <div class="item">
                                                        <img class="lazyload"
                                                            data-src="{{ $image->image_url }}"
                                                            src="{{ $image->image_url }}"
                                                            alt="img-product">
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="flat-wrap-media-product">
                                        <div dir="ltr" class="swiper tf-product-media-main" id="gallery-swiper-started">
                                            <div class="swiper-wrapper">
                                                <!-- black -->
                                                @foreach ($product->product_images as $image)
                                                
                                                <div class="swiper-slide" data-color="black" data-size="medium">
                                                    <a href="{{ $image->image_url }}" target="_blank"
                                                        class="item" data-pswp-width="552px" data-pswp-height="827px">
                                                        <img class="tf-image-zoom lazyload"
                                                            data-zoom="{{ $image->image_url }}"
                                                            data-src="{{ $image->image_url }}"
                                                            src="{{ $image->image_url }}"
                                                            alt="img-product">
                                                    </a>
                                                </div>

                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="swiper-button-next nav-swiper thumbs-next"></div>
                                        <div class="swiper-button-prev nav-swiper thumbs-prev"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Product Images -->
                        <!-- Product Info -->
                        <div class="col-md-6">
                            <div class="tf-zoom-main"></div>
                            <div class="tf-product-info-wrap other-image-zoom">
                                <div class="tf-product-info-list">
                                    <div class="tf-product-heading">
                                        <span class="brand-product">{{ $product->category->name ?? '' }}</span>
                                        <h5 class="product-name fw-medium">{{$product->title}}</h5>
                                        <div class="product-rate">
                                            <div class="list-star">
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                                <i class="icon icon-star"></i>
                                            </div>
                                            <span class="count-review">(5 reviews)</span>
                                        </div>
                                        <div class="product-price">
                                            <div class="display-sm price-new price-on-sale">₹{{$product->selling_price}}</div>
                                            <div class="display-sm price-old">₹{{$product->mrp}}</div>
                                            <span class="badge-sale">₹{{$product->discount}} Off</span>
                                        </div>
                                        <div class="product-stock">
                                            <span class="stock in-stock">{{$product->available_qty>0?' In Stock':'Out of Stock'}}</span>
                                        </div>
                                        <div class="product-progress-sale">
                                            <div class="title-hurry-up"><span class="text-primary fw-medium">HURRY
                                                    UP!</span> Only <span class="count">{{$product->available_qty}}</span> items left!</div>
                                            <div class="progress-sold">
                                                <div class="value" style="width: 0%;" data-progress="70"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tf-product-variant">
                                        <div class="variant-picker-item variant-color">
                                            <div class="variant-picker-label">
                                                Colors:<span
                                                    class="variant-picker-label-value value-currentColor">Black</span>
                                            </div>
                                            <div class="variant-picker-values">
                                                <div class="hover-tooltip tooltip-bot color-btn active"
                                                    data-color="black">
                                                    <span class="check-color bg-dark-3"></span>
                                                    <span class="tooltip">Black</span>
                                                </div>
                                                <div class="hover-tooltip tooltip-bot color-btn" data-color="orange">
                                                    <span class="check-color bg-light-orange-2"></span>
                                                    <span class="tooltip">Orange</span>
                                                </div>
                                                <div class="hover-tooltip tooltip-bot color-btn" data-color="green">
                                                    <span class="check-color bg-light-green"></span>
                                                    <span class="tooltip">Green</span>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <ul class="tf-product-cate-sku text-md">
                                        <li class="item-cate-sku">
                                            <span class="label">SKU:</span>
                                            <span class="value">AD1FSSE0YR</span>
                                        </li>
                                        
                                    </ul>
                                    <div class="tf-product-trust-seal text-center">
                                       <form class="">
                                <div class="tf-sticky-atc-btns">
                                    @if(!auth()->check())
                                    <a href="#login" data-bs-toggle="offcanvas" class="tf-btn btn-orange animate-btn d-inline-flex justify-content-center">
                                        Login
                                    </a>
                                    @elseif($cart_exists)
                                    <a href="#shoppingCart" data-bs-toggle="offcanvas"
                                        class="tf-btn btn-orange animate-btn d-inline-flex justify-content-center">View Cart</a>
                                    @else
                                    <div class="tf-product-info-quantity">
                                        <div class="wg-quantity">
                                            <button class="btn-quantity minus-btn">-</button>
                                            <input class="quantity-product font-4" type="text" name="number" value="1">
                                            <button class="btn-quantity plus-btn">+</button>
                                        </div>
                                    </div>
                                    <button data-bs-toggle="offcanvas"
                                        class="tf-btn btn-orange animate-btn d-inline-flex justify-content-center addToCart">Add to cart</button>
                                    @endif
                                </div>
                            </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /Product Info -->

                    </div>
                </div>
            </div>
            
        </section>
        <!-- /Product Main -->
        <!-- Product Description -->
        <section class="flat-spacing pt-0">
            <div class="container">
                <div class="widget-accordion wd-product-descriptions">
                    <div class="accordion-title collapsed" data-bs-target="#description" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="description" role="button">
                        <span>Descriptions</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div id="description" class="collapse">
                        <div class="accordion-body widget-desc">
                            <div class="item">
                                <p class="fw-medium title">Composition</p>
                                <ul>
                                    <li>Viscose 55%, Linen 45%</li>
                                    <li>We exclude the weight of minor components</li>
                                </ul>
                            </div>
                            <p class="item">Additional material information</p>
                            <div class="item">
                                <p class="title">The total weight of this product contains:</p>
                                <ul>
                                    <li>55% LivaEco™ viscose</li>
                                    <li>Viscose 55%</li>
                                </ul>
                            </div>
                            <ul class="item">
                                <li>We exclude the weight of minor components such as, but not exclusively: threads,
                                    buttons, zippers, embellishments and prints.</li>
                                <li>The total weight of the product is calculated by adding the weight of all layers and
                                    main components together. Based on that, we calculate how much of that weight is
                                    made out by each material. For sets & multipacks all pieces are counted together as
                                    one product in calculations.</li>
                                <li>Materials in this product explained</li>
                                <li>LinenLinen is a natural bast fibre derived from flax plants.</li>
                                <li>LivaEco™ viscoseLivaEco™ viscose is a branded viscose fibre, made from wood pulp.
                                </li>
                                <li> ViscoseViscose is a regenerated cellulose fibre commonly made from wood, but the
                                    raw material could also consist of other cellulosic materials.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="widget-accordion wd-product-descriptions">
                    <div class="accordion-title collapsed" data-bs-target="#material" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="material" role="button">
                        <span>Materials</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div id="material" class="collapse">
                        <div class="accordion-body widget-material">
                            <div class="item">
                                <p class="fw-medium title">Materials Care</p>
                                <ul>
                                    <li>Content: 100% LENZING™ ECOVERO™ Viscose</li>
                                    <li>Care: Hand wash</li>
                                    <li>Imported</li>
                                    <li>Machine wash max. 30ºC. Short spin.</li>
                                    <li>Iron maximum 110ºC.</li>
                                    <li>Do not bleach/bleach.</li>
                                    <li>Do not dry clean.</li>
                                    <li>Tumble dry, medium hear.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget-accordion wd-product-descriptions">
                    <div class="accordion-title collapsed" data-bs-target="#returnPolicies" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="returnPolicies" role="button">
                        <span>Return Policies</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div id="returnPolicies" class="collapse">
                        <div class="accordion-body">
                            <ul class="list-policies">
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M8.7 30.7h22.7c.3 0 .6-.2.7-.6l4-25.3c-.1-.4-.3-.7-.7-.8s-.7.2-.8.6L34 8.9l-3-1.1c-2.4-.9-5.1-.5-7.2 1-2.3 1.6-5.3 1.6-7.6 0-2.1-1.5-4.8-1.9-7.2-1L6 8.9l-.7-4.3c0-.4-.4-.7-.7-.6-.4.1-.6.4-.6.8l4 25.3c.1.3.3.6.7.6zm.8-21.6c2-.7 4.2-.4 6 .8 1.4 1 3 1.5 4.6 1.5s3.2-.5 4.6-1.5c1.7-1.2 4-1.6 6-.8l3.3 1.2-3 19.1H9.2l-3-19.1 3.3-1.2zM32 32H8c-.4 0-.7.3-.7.7s.3.7.7.7h24c.4 0 .7-.3.7-.7s-.3-.7-.7-.7zm0 2.7H8c-.4 0-.7.3-.7.7s.3.6.7.6h24c.4 0 .7-.3.7-.7s-.3-.6-.7-.6zm-17.9-8.9c-1 0-1.8-.3-2.4-.6l.1-2.1c.6.4 1.4.6 2 .6.8 0 1.2-.4 1.2-1.3s-.4-1.3-1.3-1.3h-1.3l.2-1.9h1.1c.6 0 1-.3 1-1.3 0-.8-.4-1.2-1.1-1.2s-1.2.2-1.9.4l-.2-1.9c.7-.4 1.5-.6 2.3-.6 2 0 3 1.3 3 2.9 0 1.2-.4 1.9-1.1 2.3 1 .4 1.3 1.4 1.3 2.5.3 1.8-.6 3.5-2.9 3.5zm4-5.5c0-3.9 1.2-5.5 3.2-5.5s3.2 1.6 3.2 5.5-1.2 5.5-3.2 5.5-3.2-1.6-3.2-5.5zm4.1 0c0-2-.1-3.5-.9-3.5s-1 1.5-1 3.5.1 3.5 1 3.5c.8 0 .9-1.5.9-3.5zm4.5-1.4c-.9 0-1.5-.8-1.5-2.1s.6-2.1 1.5-2.1 1.5.8 1.5 2.1-.5 2.1-1.5 2.1zm0-.8c.4 0 .7-.5.7-1.2s-.2-1.2-.7-1.2-.7.5-.7 1.2.3 1.2.7 1.2z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M36.7 31.1l-2.8-1.3-4.7-9.1 7.5-3.5c.4-.2.6-.6.4-1s-.6-.5-1-.4l-7.5 3.5-7.8-15c-.3-.5-1.1-.5-1.4 0l-7.8 15L4 15.9c-.4-.2-.8 0-1 .4s0 .8.4 1l7.5 3.5-4.7 9.1-2.8 1.3c-.4.2-.6.6-.4 1 .1.3.4.4.7.4.1 0 .2 0 .3-.1l1-.4-1.5 2.8c-.1.2-.1.5 0 .8.1.2.4.3.7.3h31.7c.3 0 .5-.1.7-.4.1-.2.1-.5 0-.8L35.1 32l1 .4c.1 0 .2.1.3.1.3 0 .6-.2.7-.4.1-.3 0-.8-.4-1zm-5.1-2.3l-9.8-4.6 6-2.8 3.8 7.4zM20 6.4L27.1 20 20 23.3 12.9 20 20 6.4zm-7.8 15l6 2.8-9.8 4.6 3.8-7.4zm22.4 13.1H5.4L7.2 31 20 25l12.8 6 1.8 3.5z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M5.9 5.9v28.2h28.2V5.9H5.9zM19.1 20l-8.3 8.3c-2-2.2-3.2-5.1-3.2-8.3s1.2-6.1 3.2-8.3l8.3 8.3zm-7.4-9.3c2.2-2 5.1-3.2 8.3-3.2s6.1 1.2 8.3 3.2L20 19.1l-8.3-8.4zM20 20.9l8.3 8.3c-2.2 2-5.1 3.2-8.3 3.2s-6.1-1.2-8.3-3.2l8.3-8.3zm.9-.9l8.3-8.3c2 2.2 3.2 5.1 3.2 8.3s-1.2 6.1-3.2 8.3L20.9 20zm8.4-10.2c-1.2-1.1-2.6-2-4.1-2.6h6.6l-2.5 2.6zm-18.6 0L8.2 7.2h6.6c-1.5.6-2.9 1.5-4.1 2.6zm-.9.9c-1.1 1.2-2 2.6-2.6 4.1V8.2l2.6 2.5zM7.2 25.2c.6 1.5 1.5 2.9 2.6 4.1l-2.6 2.6v-6.7zm3.5 5c1.2 1.1 2.6 2 4.1 2.6H8.2l2.5-2.6zm18.6 0l2.6 2.6h-6.6c1.4-.6 2.8-1.5 4-2.6zm.9-.9c1.1-1.2 2-2.6 2.6-4.1v6.6l-2.6-2.5zm2.6-14.5c-.6-1.5-1.5-2.9-2.6-4.1l2.6-2.6v6.7z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M35.1 33.6L33.2 6.2c0-.4-.3-.7-.7-.7H13.9c-.4 0-.7.3-.7.7s.3.7.7.7h18l.7 10.5H20.8c-8.8.2-15.9 7.5-15.9 16.4 0 .4.3.7.7.7h28.9c.2 0 .4-.1.5-.2s.2-.3.2-.5v-.2h-.1zm-28.8-.5C6.7 25.3 13 19 20.8 18.9h11.9l1 14.2H6.3zm11.2-6.8c0 1.2-1 2.1-2.1 2.1s-2.1-1-2.1-2.1 1-2.1 2.1-2.1 2.1 1 2.1 2.1zm6.3 0c0 1.2-1 2.1-2.1 2.1-1.2 0-2.1-1-2.1-2.1s1-2.1 2.1-2.1 2.1 1 2.1 2.1z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M20 33.8c7.6 0 13.8-6.2 13.8-13.8S27.6 6.2 20 6.2 6.2 12.4 6.2 20 12.4 33.8 20 33.8zm0-26.3c6.9 0 12.5 5.6 12.5 12.5S26.9 32.5 20 32.5 7.5 26.9 7.5 20 13.1 7.5 20 7.5zm-.4 15h.5c1.8 0 3-1.1 3-3.7 0-2.2-1.1-3.6-3.1-3.6h-2.6v10.6h2.2v-3.3zm0-5.2h.4c.6 0 .9.5.9 1.7 0 1.1-.3 1.7-.9 1.7h-.4v-3.4z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M30.2 29.3c2.2-2.5 3.6-5.7 3.6-9.3s-1.4-6.8-3.6-9.3l3.6-3.6c.3-.3.3-.7 0-.9-.3-.3-.7-.3-.9 0l-3.6 3.6c-2.5-2.2-5.7-3.6-9.3-3.6s-6.8 1.4-9.3 3.6L7.1 6.2c-.3-.3-.7-.3-.9 0-.3.3-.3.7 0 .9l3.6 3.6c-2.2 2.5-3.6 5.7-3.6 9.3s1.4 6.8 3.6 9.3l-3.6 3.6c-.3.3-.3.7 0 .9.1.1.3.2.5.2s.3-.1.5-.2l3.6-3.6c2.5 2.2 5.7 3.6 9.3 3.6s6.8-1.4 9.3-3.6l3.6 3.6c.1.1.3.2.5.2s.3-.1.5-.2c.3-.3.3-.7 0-.9l-3.8-3.6z">
                                        </path>
                                    </svg>
                                </li>
                                <li>
                                    <svg viewBox="0 0 40 40" width="35px" height="35px" color="#222">
                                        <path fill="currentColor"
                                            d="M34.1 34.1H5.9V5.9h28.2v28.2zM7.2 32.8h25.6V7.2H7.2v25.6zm13.5-18.3a.68.68 0 0 0-.7-.7.68.68 0 0 0-.7.7v10.9a.68.68 0 0 0 .7.7.68.68 0 0 0 .7-.7V14.5z">
                                        </path>
                                    </svg>
                                </li>
                            </ul>
                            <p class="text-center text-paragraph">LT01: 70% wool, 15% polyester, 10% polyamide, 5%
                                acrylic 900 Grms/mt</p>
                        </div>
                    </div>
                </div>
                <div class="widget-accordion wd-product-descriptions">
                    <div class="accordion-title collapsed" data-bs-target="#addInformation" data-bs-toggle="collapse"
                        aria-expanded="true" aria-controls="addInformation" role="button">
                        <span>Additional Information</span>
                        <span class="icon icon-arrow-down"></span>
                    </div>
                    <div id="addInformation" class="collapse">
                        <div class="accordion-body">
                            <table class="tb-info-product text-md">
                                <tbody>
                                    <tr class="tb-attr-item">
                                        <th class="tb-attr-label">Material</th>
                                        <td class="tb-attr-value">
                                            <p>100% Cotton</p>
                                        </td>
                                    </tr>
                                    <tr class="tb-attr-item">
                                        <th class="tb-attr-label">Color</th>
                                        <td class="tb-attr-value">
                                            <p>White, Black, Brown</p>
                                        </td>
                                    </tr>
                                    <tr class="tb-attr-item">
                                        <th class="tb-attr-label">Brand</th>
                                        <td class="tb-attr-value">
                                            <p>Fyll</p>
                                        </td>
                                    </tr>
                                    <tr class="tb-attr-item">
                                        <th class="tb-attr-label">Size</th>
                                        <td class="tb-attr-value">
                                            <p>S, M, L, XL</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Product Description -->
        <!-- Footer -->
        <footer id="footer" class="footer-default footer-bg xl-pb-70 bg-dark-green-4">
            <div class="footer-top">
                <div class="container">
                    <div class="footer-top-wrap">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="images/logo/logo-white.png" class="logo" alt="logo">
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
                                                <svg width="12" height="14" viewBox="0 0 12 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
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
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M11.6666 9.4091L10.9841 8.4641C10.7324 8.12417 10.3574 7.89649 9.93972 7.82996C9.522 7.76343 9.09484 7.86335 8.74998 8.10827L8.09081 8.59243C7.13399 7.73698 6.36526 6.69214 5.83331 5.5241L6.49248 5.04577C6.837 4.79478 7.06794 4.41741 7.13464 3.99641C7.20135 3.5754 7.09838 3.14513 6.84831 2.79993L6.18331 1.86077C5.93339 1.51663 5.55703 1.28582 5.13698 1.21909C4.71693 1.15236 4.28757 1.25518 3.94331 1.50493L2.91664 2.23993C2.58681 2.47798 2.33009 2.80349 2.17547 3.17972C2.02086 3.55595 1.9745 3.96792 2.04164 4.3691C2.33803 6.09644 3.02915 7.73206 4.06118 9.14856C5.0932 10.5651 6.43827 11.7242 7.99164 12.5358C8.30603 12.696 8.65376 12.78 9.00664 12.7808C9.46814 12.7804 9.91756 12.6333 10.29 12.3608L11.3108 11.6666C11.4837 11.5428 11.6302 11.3858 11.7419 11.2048C11.8535 11.0238 11.9281 10.8224 11.9612 10.6123C11.9943 10.4023 11.9853 10.1877 11.9347 9.98113C11.8842 9.77457 11.793 9.58012 11.6666 9.4091ZM10.7975 10.9433L9.78248 11.6666C9.58631 11.8098 9.35413 11.8954 9.11199 11.914C8.86984 11.9325 8.62732 11.8832 8.41164 11.7716C6.97557 11.0225 5.73227 9.95129 4.779 8.6418C3.82572 7.33231 3.18832 5.82004 2.91664 4.22327C2.87745 3.98261 2.90577 3.73579 2.99846 3.51026C3.09114 3.28473 3.24455 3.08933 3.44164 2.94577L4.45664 2.21077C4.6131 2.09841 4.80765 2.05252 4.99783 2.08312C5.188 2.11373 5.35834 2.21833 5.47164 2.3741L6.15998 3.3191C6.27119 3.47659 6.31717 3.67098 6.28831 3.8616C6.27352 3.95579 6.24012 4.04608 6.19004 4.12721C6.13996 4.20834 6.07421 4.27867 5.99664 4.3341L5.05164 5.02243C4.97248 5.07857 4.91486 5.16007 4.88834 5.25342C4.86182 5.34678 4.86798 5.44639 4.90581 5.53577C5.52168 7.06896 6.5077 8.42575 7.77581 9.48493C7.85256 9.54453 7.94697 9.57689 8.04414 9.57689C8.14132 9.57689 8.23573 9.54453 8.31248 9.48493L9.25748 8.80243C9.41322 8.68947 9.60729 8.64263 9.79741 8.67214C9.98754 8.70164 10.1583 8.80508 10.2725 8.95993L10.9608 9.9166C11.072 10.0741 11.118 10.2685 11.0891 10.4591C11.0752 10.5552 11.0422 10.6475 10.9921 10.7306C10.942 10.8137 10.8759 10.886 10.7975 10.9433Z"
                                                        fill="#0D0D0D" />
                                                </svg>
                                            </span>
                                            <a href="tel:18888383022">(64) 8342 1245</a>
                                        </li>
                                        <li class="item">
                                            <span class="box-icon">
                                                <svg width="14" height="14" viewBox="0 0 14 14" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
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
                                                    class="subscribe-email" placeholder="Email address" tabindex="0"
                                                    aria-required="true" required>
                                            </fieldset>
                                            <div class="button-submit">
                                                <button id="subscribe-button" class="subscribe-button animate-btn"
                                                    type="button">
                                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
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

    <!-- mobile menu -->
    <div class="offcanvas offcanvas-start canvas-mb" id="mobileMenu">
        <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        <div class="mb-canvas-content">
            <div class="mb-body">
                <div class="mb-content-top">

                    <ul class="nav-ul-mb" id="wrapper-menu-navigation">
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-home" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                aria-expanded="true" aria-controls="dropdown-menu-home">
                                <span>Home</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-home" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li><a href="index.html" class="sub-nav-link">Fashion Style 1</a></li>
                                    <li><a href="home-fashion-02.html" class="sub-nav-link">Fashion Style 2</a></li>
                                    <li><a href="home-electronic.html" class="sub-nav-link">Electronic</a></li>
                                    <li><a href="home-furniture.html" class="sub-nav-link">Furniture</a></li>
                                    <li><a href="home-fashion-women.html" class="sub-nav-link">Women Fashion</a></li>
                                    <li><a href="home-skincare.html" class="sub-nav-link">Skincare</a></li>
                                    <li><a href="home-bicycle.html" class="sub-nav-link">Bicycle</a></li>
                                    <li><a href="home-phonecase.html" class="sub-nav-link">Phone Case</a></li>
                                    <li><a href="home-pet-accessories.html" class="sub-nav-link">Pet Accessories</a>
                                    </li>
                                    <li><a href="home-sportwear.html" class="sub-nav-link">Sportwear</a></li>
                                    <li><a href="home-jewelry.html" class="sub-nav-link">Jewelry</a></li>
                                    <li><a href="home-electric-accessories.html" class="sub-nav-link">Electronic
                                            Accessories</a></li>
                                    <li><a href="home-mega-electronic.html" class="sub-nav-link">Mega Shop</a></li>
                                    <li><a href="home-baby.html" class="sub-nav-link">Baby</a></li>
                                    <li><a href="home-vegetable.html" class="sub-nav-link">Supermarket</a></li>
                                    <li><a href="home-pod.html" class="sub-nav-link">POD</a></li>
                                    <li><a href="home-plant.html" class="sub-nav-link">Sipper</a></li>
                                    <li><a href="home-jewelry2.html" class="sub-nav-link">Jewelry 2</a></li>
                                    <li><a href="home-pickleball.html" class="sub-nav-link">Pickleball</a></li>
                                    <li><a href="home-handcraft.html" class="sub-nav-link">Handcraft</a></li>
                                    <li><a href="home-furniture2.html" class="sub-nav-link">Furniture 2</a></li>
                                    <li><a href="home-skincare2.html" class="sub-nav-link">Skincare 2</a></li>
                                </ul>
                            </div>

                        </li>
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-shop" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                aria-expanded="true" aria-controls="dropdown-menu-shop">
                                <span>Shop</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-shop" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li><a href="#sub-shop-layout" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-shop-layout">
                                            <span>Shop Layout</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-shop-layout" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="#" class="sub-nav-link">Default</a></li>
                                                <li><a href="shop-left-sidebar.html" class="sub-nav-link">Filter
                                                        Left Sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html" class="sub-nav-link">Filter
                                                        Right Sidebar</a></li>
                                                <li><a href="shop-horizontal-filter.html"
                                                        class="menu-link-text link">Horizontal Filter</a></li>
                                                <li><a href="#" class="sub-nav-link">Filter
                                                        Drawer</a></li>
                                                <li><a href="shop-collection-list.html"
                                                        class="menu-link-text link">Collection List</a></li>
                                                <li><a href="shop-sub-collection.html" class="sub-nav-link">Sub
                                                        Collection 1</a></li>
                                                <li><a href="shop-sub-collection-02.html" class="sub-nav-link">Sub
                                                        Collection 2</a></li>
                                                <li><a href="shop-grid-3-columns.html" class="sub-nav-link">Grid
                                                        3 Columns </a></li>
                                                <li><a href="#" class="sub-nav-link">Grid 4
                                                        Columns</a></li>
                                                <li><a href="shop-fullwidth.html" class="sub-nav-link">Full
                                                        Width</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#sub-shop-list" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-shop-list">
                                            <span>Shop List</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-shop-list" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="#" class="sub-nav-link">Pagination
                                                        Links</a></li>
                                                <li><a href="shop-load-more-button.html" class="sub-nav-link">Load More
                                                        Button</a></li>
                                                <li><a href="shop-infinity-scroll.html" class="sub-nav-link">Infinity
                                                        Scroll <span class="demo-label">Hot</span></a></li>
                                                <li><a href="shop-filter-sidebar.html" class="sub-nav-link">Filter
                                                        Sidebar</a></li>
                                                <li><a href="shop-filter-hidden.html" class="sub-nav-link">Filter
                                                        Hidden</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#sub-shop-styles" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-shop-styles">
                                            <span>Product Styles</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-shop-styles" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="product-style-01.html" class="sub-nav-link">Product
                                                        Style 1</a></li>
                                                <li><a href="product-style-02.html" class="sub-nav-link">Product
                                                        Style 2</a></li>
                                                <li><a href="product-style-03.html" class="sub-nav-link">Product
                                                        Style 3</a></li>
                                                <li><a href="home-fashion-02.html" class="sub-nav-link">Product
                                                        Popup</a></li>

                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-product" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                aria-expanded="true" aria-controls="dropdown-menu-product">
                                <span>Products</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-product" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li>
                                        <a href="#sub-product-layout" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-product-layout">
                                            <span>Product Layouts</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-product-layout" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="product-detail.html" class="sub-nav-link">Product
                                                        Single</a></li>
                                                <li><a href="product-right-thumbnail.html" class="sub-nav-link">Product
                                                        Right Thumbnail</a></li>
                                                <li><a href="product-detail.html" class="sub-nav-link">Product
                                                        Left Thumbnail</a></li>
                                                <li><a href="product-bottom-thumbnail.html" class="sub-nav-link">Product
                                                        Bottom Thumbnail</a>
                                                </li>
                                                <li><a href="product-grid.html" class="sub-nav-link">Product
                                                        Grid</a></li>
                                                <li><a href="product-grid-02.html" class="sub-nav-link">Product
                                                        Grid 2</a></li>
                                                <li><a href="product-stacked.html" class="sub-nav-link">Product
                                                        Stacked</a></li>
                                                <li><a href="product-drawer-sidebar.html" class="sub-nav-link">Product
                                                        Drawer Sidebar</a></li>

                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#sub-product-detail" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-product-detail">
                                            <span>Product Details</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-product-detail" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="product-inner-zoom.html" class="sub-nav-link">Product Inner
                                                        Zoom</a></li>
                                                <li><a href="product-inner-circle-zoom.html"
                                                        class="sub-nav-link">Product Inner Circle Zoom</a>
                                                </li>
                                                <li><a href="product-no-zoom.html" class="sub-nav-link">Product
                                                        No Zoom <span class="demo-label">Hot</span></a></li>
                                                <li><a href="product-external-zoom.html" class="sub-nav-link">Product
                                                        External Zoom</a></li>
                                                <li><a href="product-open-lightbox.html" class="sub-nav-link">Product
                                                        Open Lightbox <span class="demo-label bg-primary">New</span></a>
                                                </li>
                                                <li><a href="product-video.html" class="sub-nav-link">Product
                                                        Video</a></li>
                                                <li><a href="product-3d.html" class="sub-nav-link">Product
                                                        3D/AR</a></li>
                                                <li><a href="product-group.html" class="sub-nav-link">Product
                                                        Group</a></li>
                                                <li><a href="product-affiliate.html" class="sub-nav-link">Product
                                                        Affiliate</a></li>
                                                <li><a href="product-out-of-stock.html" class="sub-nav-link">Product
                                                        Out Of Stock</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#sub-product-feature" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-product-feature">
                                            <span>Products Features</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-product-feature" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="product-together.html" class="sub-nav-link">Buy
                                                        Together</a></li>
                                                <li><a href="product-countdown-timer.html"
                                                        class="sub-nav-link">Countdown Timer</a></li>
                                                <li><a href="product-volume-discount.html" class="sub-nav-link">Volume
                                                        Discount</a></li>
                                                <li><a href="product-volume-discount-thumbnail.html"
                                                        class="sub-nav-link">Volume Discount Thumbnail</a>
                                                </li>
                                                <li><a href="product-swatch-dropdown.html" class="sub-nav-link">Swatch
                                                        Dropdown</a></li>
                                                <li><a href="product-swatch-dropdown-color.html"
                                                        class="sub-nav-link">Swatch Dropdown Color</a></li>
                                                <li><a href="product-swatch-image.html" class="sub-nav-link">Swatch
                                                        Image</a></li>
                                                <li><a href="product-swatch-image-square.html"
                                                        class="sub-nav-link">Swatch Image rectangle</a></li>
                                                <li><a href="product-pickup-available.html" class="sub-nav-link">Pickup
                                                        Available</a></li>
                                                <li><a href="product-buyX-getY.html" class="sub-nav-link">Buy X Get
                                                        Y</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="#sub-product-desc" class="sub-nav-link collapsed"
                                            data-bs-toggle="collapse" aria-expanded="true"
                                            aria-controls="sub-product-desc">
                                            <span>Products Description</span>
                                            <span class="btn-open-sub"></span>
                                        </a>
                                        <div id="sub-product-desc" class="collapse">
                                            <ul class="sub-nav-menu sub-menu-level-2">
                                                <li><a href="product-description-vertical.html"
                                                        class="sub-nav-link">Product Description Vertical</a>
                                                </li>
                                                <li><a href="product-description-tab.html" class="sub-nav-link">Product
                                                        Description Tab</a></li>
                                                <li><a href="product-description-accordions.html"
                                                        class="sub-nav-link">Product Description
                                                        Accordions</a></li>
                                                <li><a href="product-description-side-accordions.html"
                                                        class="sub-nav-link">Product Description Side
                                                        Accordions</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-pages" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                aria-expanded="true" aria-controls="dropdown-menu-pages">
                                <span>Pages</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-pages" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li><a href="about-us.html" class="sub-nav-link">About</a></li>
                                    <li><a href="contact-us.html" class="sub-nav-link">Contact</a></li>
                                    <li><a href="store-location.html" class="sub-nav-link">Store
                                            location</a></li>
                                    <li><a href="account-page.html" class="sub-nav-link">My account</a></li>
                                    <li><a href="faq.html" class="sub-nav-link">FAQ</a></li>
                                    <li><a href="cart-empty.html" class="sub-nav-link">Cart drawer empty</a>
                                    </li>
                                    <li><a href="cart-drawer-v2.html" class="sub-nav-link">Cart drawer
                                            v2</a></li>
                                    <li><a href="view-cart.html" class="sub-nav-link">View cart</a></li>
                                    <li><a href="before-you-leave.html" class="sub-nav-link">Before you
                                            leave</a></li>
                                    <li><a href="cookies.html" class="sub-nav-link">Cookies</a></li>
                                    <li><a href="home-fashion-02.html" class="sub-nav-link">Sub navtab
                                            products</a></li>
                                    <li><a href="404.html" class="sub-nav-link">404</a></li>
                                    <li><a href="coming-soon.html" class="sub-nav-link">Coming Soon!</a>
                                    </li>
                                    <li><a href="index.html" class="sub-nav-link">Newsletter
                                            Popup 1</a></li>
                                    <li><a href="newsletter-popup-02.html" class="sub-nav-link">Newsletter
                                            Popup 2</a></li>
                                    <li><a href="newsletter-popup-03.html" class="sub-nav-link">Newsletter
                                            Popup 3</a></li>
                                </ul>
                            </div>

                        </li>
                        <li class="nav-mb-item">
                            <a href="#dropdown-menu-blog" class="collapsed mb-menu-link" data-bs-toggle="collapse"
                                aria-expanded="true" aria-controls="dropdown-menu-blog">
                                <span>Blog</span>
                                <span class="btn-open-sub"></span>
                            </a>
                            <div id="dropdown-menu-blog" class="collapse">
                                <ul class="sub-nav-menu">
                                    <li><a href="blog-list-01.html" class="sub-nav-link">Blog List 1</a>
                                    </li>
                                    <li><a href="blog-list-02.html" class="sub-nav-link">Blog List 2</a>
                                    </li>
                                    <li><a href="blog-grid-01.html" class="sub-nav-link">Blog Grid 1</a>
                                    </li>
                                    <li><a href="blog-grid-02.html" class="sub-nav-link">Blog Grid 2</a>
                                    </li>
                                    <li><a href="blog-single.html" class="sub-nav-link">Single Blog </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        
                    </ul>
                </div>
                <div class="mb-other-content">
                    <div class="group-icon">
                        
                        <a href="#login" data-bs-toggle="offcanvas" class="site-nav-icon">
                            <i class="icon icon-user"></i>
                            Login
                        </a>
                    </div>
                    <div class="mb-notice">
                        <a href="contact-us.html" class="text-need">Need Help?</a>
                    </div>
                    <div class="mb-contact">
                        <p>Address: 123 Yarran st, Punchbowl, NSW 2196, Indore</p>
                    </div>
                    <ul class="mb-info">
                        <li>
                            Email:
                            <b class="fw-medium">clientcare@ecom.com</b>
                        </li>
                        <li>
                            Phone:
                            <b class="fw-medium">1.888.838.3022</b>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mb-bottom">
                <div class="bottom-bar-language">
                    <div class="tf-currencies">
                        <select class="image-select center style-default type-currencies">
                            <option selected data-thumbnail="images/country/us.png">USD</option>
                            <option data-thumbnail="images/country/fr.png">EUR</option>
                            <option data-thumbnail="images/country/ger.png">EUR</option>
                            <option data-thumbnail="images/country/vn.png">VND</option>
                        </select>
                    </div>
                    <div class="tf-languages">
                        <select class="image-select center style-default type-languages">
                            <option>English</option>
                            <option>العربية</option>
                            <option>简体中文</option>
                            <option>اردو</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /mobile menu -->

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


    <!-- shoppingCart -->
    @include('front.include.cart')
    <!-- /shoppingCart -->

    <!-- compare  -->
    <div class="modal modalCentered fade modal-compare" id="compare">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <span class="icon icon-close btn-hide-popup" data-bs-dismiss="modal"></span>
                <div class="modal-compare-wrap list-file-delete">
                    <h6 class="title text-center">Compare Products</h6>
                    <div class="tf-compare-inner">
                        <div class="tf-compare-list">
                            <div class="tf-compare-item file-delete">
                                <span class="icon-close remove"></span>
                                <a href="product-detail.html" class="image">
                                    <img class="lazyload" data-src="images/products/fashion/product-8.jpg"
                                        src="images/products/fashion/product-8.jpg" alt="">
                                </a>
                                <div class="content">
                                    <div class="text-title">
                                        <a class="link text-line-clamp-2" href="product-detail.html">Striped T-Shirt</a>
                                    </div>
                                    <p class="price-wrap">
                                        <span class="new-price text-primary">₹130.00</span>
                                        <span class="old-price text-decoration-line-through text-dark-1">₹150.00</span>
                                    </p>
                                </div>
                            </div>
                            <div class="tf-compare-item file-delete">
                                <span class="icon-close remove"></span>
                                <a href="product-detail.html" class="image">
                                    <img class="lazyload" data-src="images/products/fashion/product-6.jpg"
                                        src="images/products/fashion/product-6.jpg" alt="">
                                </a>
                                <div class="content">
                                    <div class="text-title">
                                        <a class="link text-line-clamp-2" href="product-detail.html">Loose Fit Tee</a>
                                    </div>
                                    <p class="price-wrap">
                                        <span class="new-price text-primary">₹115.00</span>
                                        <span class="old-price text-decoration-line-through text-dark-1">₹130.00</span>
                                    </p>
                                </div>
                            </div>
                            <div class="tf-compare-item file-delete">
                                <span class="icon-close remove"></span>
                                <a href="product-detail.html" class="image">
                                    <img class="lazyload" data-src="images/products/fashion/product-15.jpg"
                                        src="images/products/fashion/product-15.jpg" alt="">
                                </a>
                                <div class="content">
                                    <div class="text-title">
                                        <a class="link text-line-clamp-2" href="product-detail.html">Oversized Fit
                                            Tee</a>
                                    </div>
                                    <p class="price-wrap">
                                        <span class="new-price text-primary">₹80.00</span>
                                        <span class="old-price text-decoration-line-through text-dark-1">₹100.00</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tf-compare-buttons justify-content-center">
                        <a href="compare.html" class="tf-btn animate-btn justify-content-center">Compare</a>
                        <div class="tf-btn btn-out-line-dark justify-content-center clear-file-delete"><span>Clear
                                All</span></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /compare  -->

    <!-- ask question  -->
    <div class="modal modalCentered fade  modal-ask-question popup-style-2" id="askQuestion">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="title text-xl-2 fw-medium">Ask a Question</span>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <form class="form-ask-question">
                    <div class="cols mb_15 flex-md-nowrap flex-wrap">
                        <fieldset class="">
                            <div class="text">Your name*</div>
                            <input type="text" placeholder="" class="" name="text" tabindex="2" value=""
                                aria-required="true" required="">
                        </fieldset>
                        <fieldset class="">
                            <div class="text">Your phone number</div>
                            <input type="number" placeholder="" class="" name="text" tabindex="2" value=""
                                aria-required="true">
                        </fieldset>
                    </div>
                    <fieldset class="mb_15">
                        <div class="text">Your email*</div>
                        <input type="email" placeholder="" class="" name="text" tabindex="2" value=""
                            aria-required="true" required="">
                    </fieldset>
                    <fieldset class="">
                        <div class="text">Message*</div>
                        <textarea name="message" rows="4" placeholder="" class="" tabindex="2" aria-required="true"
                            required=""></textarea>
                    </fieldset>
                    <div class="text-center">
                        <button type="submit" class="tf-btn animate-btn d-inline-flex justify-content-center"><span>Send
                                Message</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /ask question  -->

    <!-- share social  -->
    <div class="modal modalCentered fade  modal-share-social popup-style-2" id="shareSocial">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="title text-xl-2 fw-medium">Share</span>
                    <span class="icon-close icon-close-popup" data-bs-dismiss="modal"></span>
                </div>
                <div class="wrap-code style-1">
                    <div class="coppyText" id="coppyText">http://Fyll.com</div>
                    <div class="btn-coppy-text tf-btn animate-btn d-inline-flex w-max-content" id="btn-coppy-text">Copy
                    </div>
                </div>
                <ul class="topbar-left tf-social-icon style-1">
                    <li><a href="https://www.facebook.com/" class="social-item social-facebook"><i
                                class="icon icon-fb"></i></a></li>
                    <li><a href="https://www.instagram.com/" class="social-item social-instagram"><i
                                class="icon icon-instagram"></i></a></li>
                    <li><a href="https://x.com/" class="social-item social-x"><i class="icon icon-x"></i></a></li>
                    <li><a href="https://www.snapchat.com/" class="social-item social-snapchat"><i
                                class="icon icon-snapchat"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /share social  -->


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
    <script src="{{ asset_front('js/photoswipe-lightbox.umd.min.js') }}"></script>
    <script src="{{ asset_front('js/photoswipe.umd.min.js') }}"></script>
    <script src="{{ asset_front('js/zoom.js') }}"></script>
     <script src="{{ asset_front('js/api/login.js') }}"></script>
    <script>
        $('.addToCart').click(function(ev){
            ev.preventDefault();
            var qty = $('.quantity-product').val();
            var product_id=`{{ $product['id'] }}`;
            $.ajax({
                url:"{{ route('addToCart') }}",
                type:"POST",
                data:{
                    _token:`{{ csrf_token() }}`,
                    product_id:product_id,
                    quantity:qty
                },
                success:function(res){
                    if(res.success){
                        location.reload(true);
                    }
                },
                error:function(err){
                    alert(err.responseJSON.message);
                    console.log(err.responseJSON.message);
                }
            });
        });
    </script>
</body>

</html>