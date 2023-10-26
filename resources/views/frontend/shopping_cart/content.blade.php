@if (Cart::count() != 0)
    <section class="main-cart-page main-container col1-layout">
        <div class="main container hidden-xs">
            <div class="header-cart">
                <h1 class="title_cart margin-bottom-20" title="Giỏ hàng của bạn">
                    <a href="#">Giỏ hàng của bạn <span>(<span class="cart-popup-count">{{ Cart::count() }}</span>
                            sản phẩm)</span></a>
                </h1>
                <div class="header-cart title_cart_pc hidden-sm hidden-xs">

                </div>
            </div>
            <div class="col-main cart_desktop_page cart-page">
                <div class="cart page_cart hidden-xs">
                    <form action="/cart" method="post" novalidate="" class="margin-bottom-0">
                        <div class="bg-scroll">
                            <div class="cart-thead hidden">
                                <div style="width: 19%;    text-align: left;">Sản phẩm</div>
                                <div style="width: 28%;text-align: left;padding-left: 5px;"></div>
                                <div style="width: 17%" class="a-center"><span class="nobr">Giá</span></div>
                                <div style="width: 18%" class="a-center">Số lượng</div>
                                <div style="width: 5%" class="a-center">Xóa</div>
                                <div style="width: 13%;text-align: right!important;" class="a-center">Thành tiền</div>
                            </div>
                            <div class="cart-tbody">
                                @foreach ($productCarts as $productCart)
                                    <div class="item-cart">
                                        <div style="width: 10%" class="image cart1"><a class="product-image"
                                                title="{{ $productCart->name }}"
                                                href="{{ route('productDetail', [$productCart->id, Str::slug($productCart->name)]) }}"><img
                                                    width="120" height="auto" alt="{{ $productCart->name }}"
                                                    src="{{ asset(JSON_decode($productCart->options->images)[0]) }}"></a>
                                        </div>
                                        <div style="width: 50%;align-items: flex-start;" class="a-center cart2">
                                            <h2 class="product-name"> <a title="{{ $productCart->name }}"
                                                    href="{{ route('productDetail', [$productCart->id, Str::slug($productCart->name)]) }}">{{ $productCart->name }}</a><span
                                                    class="variant-title" style="display: none;"></span> </h2><span
                                                class="item-price">

                                                <span
                                                    class="price pricechange">{{ number_format($productCart->price, 0, '.', ',') }}
                                                    đ</span>
                                            </span>
                                            <div style="height: 30px;position: relative;width: 78px;padding: 10px 0;">
                                            </div>
                                        </div>
                                        <div style="width: 18%" class="a-center">
                                            <div class="input_qty_pr relative ">
                                                {{-- <input class="variantID" type="hidden"
                                                    name="variantId" value="1066932101"> --}}

                                                <input type="text" maxlength="2" min="0"
                                                    class="input-text number-sidebar input_pop input_pop {{ $productCart->id }}"
                                                    id="{{ $productCart->id }}" name="qty" size="4"
                                                    value="Số lượng: {{ $productCart->qty }}" readonly>


                                            </div>
                                        </div>
                                        <div style="width: 18%;align-items: flex-end;padding-right: 0;"
                                            class="a-center cart6">
                                            <span class="tongtien">Tổng tiền:</span><span class="cart-price">
                                                <span
                                                    class="price">{{ number_format($productCart->qty * $productCart->price, 0, '.', ',') }}
                                                    đ</span>
                                            </span>
                                            <a class="remove-item remove-item-cart"
                                                href="{{ route('deleteCart', $productCart->rowId) }}">
                                                <span><i class="fas fa-trash"></i></span>Xóa</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </form>
                    <div class="cart-collaterals cart_submit row">
                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <div class="totals">
                                <div class="inner">
                                    <table class="table shopping-cart-table-total margin-bottom-0"
                                        id="shopping-cart-totals-table">
                                        <colgroup>
                                            <col>
                                            <col>
                                        </colgroup>
                                        <tfoot>
                                            <tr>
                                                <td colspan="20" class="a-right"></td>
                                                <td class="a-right"><span class="tt">Thành tiền:</span>
                                                    <strong><span class="totals_price price">{{ Cart::subtotal() }}
                                                            ₫</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                    <ul class="checkout">
                                        <li class="clearfix"><button
                                                class="btn btn-primary button btn-proceed-checkout f-right button_gradient"
                                                title="Tiến hành đặt hàng" type="button"
                                                onclick="window.location.href='{{route('pay')}}'"><span
                                                    style=" text-transform: initial; ">Đặt hàng
                                                    ngay</span></button><button
                                                class="btn btn-gray margin-right-15 f-right" title="Tiếp tục mua hàng"
                                                type="button" onclick="window.location.href='{{route('ProductList')}}'"><span
                                                    style=" text-transform: initial; ">Tiếp tục mua
                                                    hàng</span></button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="cart-mobile hidden-md hidden-lg hidden-sm">
            <form action="/cart" method="post" novalidate="" class="margin-bottom-0">
                <div class="header-cart">
                    <div class="title-cart title_cart_mobile">
                        <h3>Giỏ hàng của bạn</h3>
                    </div>
                </div>
                <div class="header-cart-content" style="background:#fff;">
                    <div class="cart_page_mobile content-product-list">

                        @foreach ($productCarts as $item)
                        {{-- @php
                            dd($productCart->id)
                        @endphp --}}
                            <div class="item-product item productid-1066932101 ">
                                <div class="item-product-cart-mobile"><a class="product-images1"
                                        href="{{ route('productDetail', [$item->id, Str::slug($item->name)]) }}"
                                        title=""><img width="80" height="150"
                                            src="{{ asset(JSON_decode($item->options->images)[0]) }}"
                                            alt=""></a></div>
                                <div class="title-product-cart-mobile">
                                    <h3><a href="{{ route('productDetail', [$item->id, Str::slug($item->name)]) }}"
                                            title="">{{ $item->name }}</a>
                                    </h3>
                                    <p>Giá: <span class="pricechange">{{ number_format($item->price, 0, '.', ',') }}
                                            đ</span></p>
                                </div>
                                <div class="select-item-qty-mobile">
                                    <div class="txt_center">
                                        <input type="text" maxlength="3" min="1"
                                            class="input-text number-sidebar input_pop input_pop {{ $item->id }}"
                                            id="{{ $item->id }}" name="qty" size="4"
                                            value="Số lượng: {{ $item->qty }}" readonly>
                                    </div><a class="button remove-item remove-item-cart"
                                        href="{{ route('deleteCart', $item->rowId) }}">
                                        Xoá</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="header-cart-price" style="">
                        <div class="title-cart ">
                            <h3 class="text-xs-left">Tổng tiền</h3><a
                                class="text-xs-right pull-right totals_price_mobile">{{ Cart::subtotal() }} ₫</a>
                        </div>
                        <div class="checkout"><button class="btn-proceed-checkout-mobile button_gradient"
                                title="Tiến hành thanh toán" type="button"
                                onclick="window.location.href='{{ route('pay') }}'"><span>Đặt hàng
                                    ngay</span></button><button class="btn-white f-left" title="Tiếp tục mua hàng"
                                type="button" onclick="window.location.href='{{ route('ProductList') }}'"><span>Tiếp
                                    tục mua
                                    hàng</span></button>
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </section>
@else
    <section class="main-cart-page main-container col1-layout">
        <div class="main container hidden-xs">
            <div class="header-cart">
                <h1 class="title_cart margin-bottom-20" title="Giỏ hàng của bạn">
                    <a>Giỏ hàng của bạn <span>(<span class="cart-popup-count">0</span> sản
                            phẩm)</span></a>
                </h1>
                <div class="header-cart title_cart_pc hidden-sm hidden-xs">
                </div>
            </div>
            <div class="col-main cart_desktop_page cart-page" style="min-height: auto;">
                <p class="hidden-xs-down margin-top-50">Không có sản phẩm nào trong giỏ hàng. Quay lại <a
                        href="{{ route('ProductList') }}" style="font-weight: bold">cửa hàng</a> để tiếp tục mua sắm.
                </p>
            </div>
        </div>
    </section>
@endif
