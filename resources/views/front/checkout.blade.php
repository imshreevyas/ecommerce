<!DOCTYPE html>

<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<head>
    @include('front.include.head')
</head>

<body>

    <!-- RTL -->
    <!-- <a href="javascript:void(0);" id="toggle-rtl" class="tf-btn animate-btn"><span>RTL</span></a> -->
    <!-- /RTL  -->

    <!-- Scroll Top -->
    <button id="goTop">
        <span class="border-progress"></span>
        <span class="icon icon-arrow-right"></span>
    </button>
    <!-- /Scroll Top -->


    <div id="wrapper">

        <!-- Top Bar-->
        @include('front.include.topbar')
        <!-- /Top Bar -->
        <!-- Header -->
        <header id="header" class="header-default header-absolute header-white header-uppercase">
            @include('front.include.header')
        </header>
        <!-- /Header -->

        <!-- Title Page -->
        <section class="tf-page-title">
            <div class="container">
                <div class="box-title text-center">
                    <h4 class="title">Checkout</h4>
                    <div class="breadcrumb-list">
                        <a class="breadcrumb-item" href="{{route('home')}}">Home</a>
                        <div class="breadcrumb-item dot"><span></span></div>
                        <div class="breadcrumb-item current">Checkout</div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /Title Page -->

        <!-- Main Content -->
        <div class="flat-spacing-13">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8">
                        <form class="tf-checkout-cart-main">
                            <div class="box-ip-select">
                                <div class="title">
                                    <div class="text-lg fw-medium">Choose Shipping Address</div>
                                </div>
                                <div class="grid-3 mb_16">
                                <div class="tf-select select-square">
                                    <select name="select-address" class="tf-select select-square select-bordered" id="select-address">
                                        <option value="">Select Address</option>
                                        <option value="">Address 1</option>
                                        <option value="new">Add New</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            <div class="box-ip-checkout" style="display:none">
                            @include('front.include.checkout-form')
                            </div>
                            <div class="box-ip-contact">
                                <div class="title">
                                    <div class="text-lg fw-medium">Contact Information</div>
                                </div>
                                <fieldset class="tf-field style-2 style-3">
                                    <input class="tf-field-input tf-input" id="email/phone" placeholder=" " type="text"
                                        name="email/phone">
                                    <label class="tf-field-label" for="email/phone">phone number</label>
                                </fieldset>

                            </div>
                            <div class="box-ip-shipping">
                                <div class="title text-lg fw-medium">Shipping Method</div>
                                <fieldset class="mb_16">
                                    <label for="freeship" class="check-ship">
                                        <input type="radio" id="freeship" class="tf-check-rounded" name="checkshipping">
                                        <span class="text text-sm">
                                            <span>Free Shipping (Estimate in 7/10 - 10/10/2025)</span>
                                            <span class="price">₹00.00</span>
                                        </span>
                                    </label>
                                </fieldset>
                                <fieldset>
                                    <label for="expship" class="check-ship">
                                        <input type="radio" id="expship" class="tf-check-rounded" name="checkshipping"
                                            checked>
                                        <span class="text text-sm">
                                            <span>Express Shipping (Estimate in 4/10 - 5/10/2025)</span>
                                            <span class="price">₹10.00</span>
                                        </span>
                                    </label>
                                </fieldset>
                            </div>
                           
                        </form>
                    </div>
                    <div class="col-xl-4">
                        <div class="tf-page-cart-sidebar">
                            <form action="thank-you.html" class="cart-box order-box">
                                <div class="title text-lg fw-medium">In your cart</div>
                                <ul class="list-order-product">
                                    @foreach (get_cart_items() as $item)
                                    <li class="order-item">
                                        <figure class="img-product">
                                            <img src="{{ $item->product->product_images[0]->image_url }}" alt="product">
                                        </figure>
                                        <div class="content">
                                            <div class="info">
                                                <p class="name text-sm fw-medium">{{ $item->product->title }} X <span class="quantity">{{ $item->quantity }}</span></p>
                                            </div>
                                            <span class="price text-sm fw-medium">₹{{ $item->product->selling_price }}</span>

                                            <span class="item-price-discount text-sm fw-medium">₹{{ ($item->product->mrp - $item->product->selling_price) * $item->quantity }}</span>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                                <ul class="list-total">
                                    <li class="total-item text-sm d-flex justify-content-between">
                                        <span>Total MRP:</span>
                                        <span class="price-sub fw-medium">₹0.00 INR</span>
                                    </li>
                                    <li class="total-item text-sm d-flex justify-content-between">
                                        <span>Discount:</span>
                                        <span class="price-discount fw-medium">-₹48.00 INR</span>
                                    </li>
                                    <li class="total-item text-sm d-flex justify-content-between">
                                        <span>Coupon:</span>
                                        <span class="price-ship fw-medium">₹0.00 INR</span>
                                    </li>
                                    <li class="total-item text-sm d-flex justify-content-between">
                                        <span>Tax:</span>
                                        <span class="price-tax fw-medium">₹0.00 INR</span>
                                    </li>
                                </ul>
                                <div class="subtotal text-lg fw-medium d-flex justify-content-between">
                                    <span>Subtotal:</span>
                                    <span class="total-price-order">₹380.00 INR</span>
                                </div>
                                <div class="btn-order">
                                    <button type="submit"
                                        class="tf-btn btn-dark2 animate-btn w-100 text-transform-none">Place
                                        order</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Main Content -->

        <!-- Footer -->
        @include('front.include.footer')
        <!-- /Footer -->

        <!-- sidebar account-->
        <div class="offcanvas offcanvas-start canvas-sidebar" id="mbAccount">
            <div class="canvas-wrapper">
                <div class="canvas-header">
                    <span class="title">SIDEBAR ACCOUNT</span>
                    <button class="icon-close icon-close-popup" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="canvas-body">
                    <div class="sidebar-account-wrap sidebar-mobile-append"></div>
                </div>
            </div>
        </div>
        <!-- End sidebar account -->

    </div>

    <!-- toolbar -->
   @include('front.include.toolbar')
    <!-- /toolbar  -->

    <!-- shoppingCart -->
    @include('front.include.cart')
    <!-- /shoppingCart -->

    <!-- Javascript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/swiper-bundle.min.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('js/lazysize.min.js')}}"></script>
    <script src="{{asset('js/count-down.js')}}"></script>
    <script src="{{asset('js/wow.min.js')}}"></script>
    <script src="{{asset('js/multiple-modal.js')}}"></script>
    <script src="{{asset('js/api/logout.js')}}"></script>

    <script>
        calculateTotalPrice();
        // calculate total-price-order in cart sidebar
        function calculateTotalPrice() {
            let totalPrice = 0;
            let discountPrice = 0;
            $('.list-order-product .order-item').each(function() {
                const priceText = $(this).find('.price').text().replace('₹', '').trim();
                const quantityText = $(this).find('.quantity').text().trim();
                 const discountText = $(this).find('.item-price-discount').text().replace('₹', '').trim();
                 console.log(discountText);
                const price = parseFloat(priceText);
                const quantity = parseInt(quantityText);
                const discount = parseInt(discountText);
                if (!isNaN(discount)) {
                   discountPrice += discount;
                }
                if (!isNaN(price) && !isNaN(quantity)) {
                    totalPrice += price * quantity;
                }
            });
            const priceSub= totalPrice + discountPrice;
            $('.total-price-order').text('₹' + totalPrice.toFixed(2) + ' INR');
            // update price-discount
            $('.price-discount').text('-₹' + discountPrice.toFixed(2) + ' INR');
            $('.price-sub').text('₹' + priceSub.toFixed(2) + ' INR');
        }
        // show/hide checkout form based on address selection
        $('#select-address').on('change', function() {
            if (this.value === 'new') {
                $('.box-ip-checkout').show();
            } else {
                $('.box-ip-checkout').hide();
            }
        });
    </script>
</body>

</html>