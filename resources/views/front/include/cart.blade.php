<div class="offcanvas offcanvas-end popup-style-1 popup-shopping-cart" id="shoppingCart">
    <div class="canvas-wrapper">
        <div class="popup-header">
            <span class="title">Shopping cart</span>
            <span class="icon-close icon-close-popup" data-bs-dismiss="offcanvas"></span>
        </div>
        <div class="wrap">
            <div class="tf-mini-cart-threshold">
            </div>
            <div class="tf-mini-cart-wrap">
                <div class="tf-mini-cart-main">
                    <div class="tf-mini-cart-sroll">
                        @foreach (get_cart_items() as $item)
                            <div class="tf-mini-cart-items">
                                <div class="tf-mini-cart-item file-delete">
                                    <div class="tf-mini-cart-image">
                                        <a href="product-detail.html">
                                            <img class="lazyload" data-src="{{ $item->product->product_images[0]->image_url }}"
                                                alt="img-product">
                                        </a>
                                    </div>
                                    <div class="tf-mini-cart-info">
                                        <div class="d-flex justify-content-between">
                                            <a class="title link text-md fw-medium"
                                                href="{{ route('product-detail', ['id' => $item->product->id]) }}">
                                                {{ $item->product->title }}
                                                </a>
                                                <!-- icon to remove item from cart -->
                                            <i class="icon icon-close remove fs-12" onclick="removeCart({{$item->product->id}})"></i>
                                        </div>
                                        <p class="price-wrap text-sm fw-medium">
                                            <span
                                                class="new-price text-primary selling_price">{{ $item->product->selling_price }}</span>
                                            <span
                                                class="old-price text-decoration-line-through text-dark-1">{{ $item->product->mrp }}</span>
                                        </p>
                                        <div class="wg-quantity small">
                                            <button class="btn-quantity minus-btn">-</button>
                                            <input class="quantity-product font-4" type="text" name="number"
                                                value="{{ $item->quantity }}">
                                            <button class="btn-quantity plus-btn">+</button>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                @if (count(get_cart_items()) > 0)
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="tf-cart-totals-discounts">
                                <div class="tf-cart-total text-xl fw-medium">Total:</div>
                                <div class="tf-totals-total-value text-xl fw-medium total_price">₹0.00 </div>
                            </div>
                            <div class="tf-cart-tax text-sm opacity-8">Taxes and shipping calculated at checkout
                            </div>

                            <div class="tf-mini-cart-view-checkout">
                                <a href="checkout.html"
                                    class="tf-btn animate-btn d-inline-flex bg-dark-2 w-100 justify-content-center"><span>Check
                                        out</span></a>
                                
                            </div>
                        </div>
                    </div>
                @else
                    <div class="tf-mini-cart-bottom">
                        <div class="tf-mini-cart-bottom-wrap">
                            <div class="tf-cart-totals-discounts">
                                <div class="tf-cart-total text-xl fw-medium">Your cart is empty</div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="tf-mini-cart-tool-openable add-gift">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <form action="#" class="tf-mini-cart-tool-content">
                        <div class="tf-mini-cart-tool-text text-sm fw-medium">Add gift wrap</div>
                        <div class="tf-mini-cart-tool-text1">The product will be wrapped carefully.
                            Fee is only <span class="text fw-medium text-dark">₹10.00</span>. Do you want a
                            gift wrap?</div>
                        <div class="tf-cart-tool-btns">
                            <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                type="submit">Add a Gift Wrap</button>
                            <div class="tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">Cancel</div>
                        </div>
                    </form>
                </div>
                <div class="tf-mini-cart-tool-openable add-note">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <form action="#" class="tf-mini-cart-tool-content">
                        <label for="Cart-note" class="tf-mini-cart-tool-text text-sm fw-medium">Order
                            note</label>
                        <textarea name="note" id="Cart-note" placeholder="Instruction for seller..."></textarea>
                        <div class="tf-cart-tool-btns">
                            <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                type="submit">Save</button>
                            <div class="tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">Close</div>
                        </div>
                    </form>
                </div>
                <div class="tf-mini-cart-tool-openable coupon">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <form action="#" class="tf-mini-cart-tool-content">
                        <div class="tf-mini-cart-tool-text text-sm fw-medium">Add coupon</div>
                        <div class="tf-mini-cart-tool-text1">* Discount will be calculated and
                            applied at checkout</div>
                        <input type="text" name="text" placeholder="">
                        <div class="tf-cart-tool-btns">
                            <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                type="submit">Save</button>
                            <div class="tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">Close</div>
                        </div>
                    </form>
                </div>
                <div class="tf-mini-cart-tool-openable estimate-shipping">
                    <div class="overplay tf-mini-cart-tool-close"></div>
                    <form id="shipping-form" class="tf-mini-cart-tool-content">
                        <div class="tf-mini-cart-tool-text text-sm fw-medium">Shipping estimates</div>
                        <div class="field">
                            <p class="text-sm">Country</p>
                            <div class="tf-select">
                                <select class="w-100" id="shipping-country-form" name="address[country]"
                                    data-default="">
                                    <option value="Indore"
                                        data-provinces='[["Indoren Capital Territory","Indoren Capital Territory"],["New South Wales","New South Wales"],["Northern Territory","Northern Territory"],["Queensland","Queensland"],["South Indore","South Indore"],["Tasmania","Tasmania"],["Victoria","Victoria"],["Western Indore","Western Indore"]]'>
                                        Indore</option>
                                    <option value="Austria" data-provinces='[]'>Austria</option>
                                    <option value="Belgium" data-provinces='[]'>Belgium</option>
                                    <option value="Canada"
                                        data-provinces='[["Ontario","Ontario"],["Quebec","Quebec"]]'>Canada
                                    </option>
                                    <option value="Czech Republic" data-provinces='[]'>Czechia</option>
                                    <option value="Denmark" data-provinces='[]'>Denmark</option>
                                    <option value="Finland" data-provinces='[]'>Finland</option>
                                    <option value="France" data-provinces='[]'>France</option>
                                    <option value="Germany" data-provinces='[]'>Germany</option>
                                    <option selected value="United States"
                                        data-provinces='[["Alabama","Alabama"],["California","California"],["Florida","Florida"]]'>
                                        United States</option>
                                    <option value="United Kingdom"
                                        data-provinces='[["England","England"],["Scotland","Scotland"],["Wales","Wales"],["Northern Ireland","Northern Ireland"]]'>
                                        United Kingdom</option>
                                    <option value="India" data-provinces='[]'>India</option>
                                    <option value="Japan" data-provinces='[]'>Japan</option>
                                    <option value="Mexico" data-provinces='[]'>Mexico</option>
                                    <option value="South Korea" data-provinces='[]'>South Korea</option>
                                    <option value="Spain" data-provinces='[]'>Spain</option>
                                    <option value="Italy" data-provinces='[]'>Italy</option>
                                    <option value="Vietnam"
                                        data-provinces='[["Ha Noi","Ha Noi"],["Da Nang","Da Nang"],["Ho Chi Minh","Ho Chi Minh"]]'>
                                        Vietnam</option>
                                </select>
                            </div>
                        </div>
                        <div class="field">
                            <p class="text-sm">State/Province</p>
                            <div class="tf-select">
                                <select id="shipping-province-form" name="address[province]"
                                    data-default=""></select>
                            </div>
                        </div>
                        <div class="field">
                            <p class="text-sm">Zipcode</p>
                            <input type="text" data-opend-focus id="zipcode" name="address[zip]"
                                value="">
                        </div>
                        <div id="zipcode-message" class="error" style="display: none;">
                            We found one shipping rate available for undefined.
                        </div>
                        <div id="zipcode-success" class="success" style="display: none;">
                            <p>We found one shipping rate available for your address:</p>
                            <p class="standard">Standard at <span>₹0.00</span> </p>
                        </div>
                        <div class="tf-cart-tool-btns">
                            <button class="subscribe-button tf-btn animate-btn d-inline-flex bg-dark-2 w-100"
                                type="submit">Estimate</button>
                            <div
                                class="tf-mini-cart-tool-primary tf-btn btn-out-line-dark2 w-100 tf-mini-cart-tool-close">
                                Close</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // sum values of .selling_price
    let total = 0;
    document.querySelectorAll('.selling_price').forEach(function(element) {
        total += parseFloat(element.textContent.replace('₹', '').replace(',', ''));
    });
    //append to total_price
    document.querySelector('.total_price').textContent = '₹' + total.toFixed(2);


    removeCart = (id) => {
        $.ajax({
            url: '{{ route('removeCart') }}',
            type: 'post',
             data:{
                _token:`{{ csrf_token() }}`,
                product_id:id,
            },
            success: function(response) {
                if (!response.success) {
                    alert(response.message || 'Something went wrong');
                    return;
                }
            }
        });
    }
</script>
