<div class="col-lg-12 related-product margin-bottom-30">
    <div class="section_prd_feature">
        <div class="module-header">
            <div class="heading title_product_base heading_hotdeal">
                <h2>
                    <a class="text_gradient" href="{{route('showAllProductWith', ($product_detail->category_id))}}" title="Sản phẩm liên quan">Sản phẩm liên quan</a>
                </h2>
            </div>
        </div>
        <div class="module-content products product_related products-view-grid-bb owl-carousel owl-theme products-view-grid not-dot2"
            data-dot="false" data-nav="false" data-lg-items="4" data-md-items="4" data-sm-items="3" data-xs-items="2"
            data-margin="30">

            @foreach ($product as $item)
                <div class="item saler_item">
                    <div class="owl_item_product product-col-1">
                        <div class="product-box-h product-base">
                            <div class="product-thumbnail">
                                <a class="image_link display_flex"
                                    href="{{ route('productDetail', [$item->id, Str::slug($item->name)]) }}"
                                    title="Chanh tươi">
                                    <img class="lazyload" src="{{ asset(JSON_decode($item->images)[0]) }}"
                                        data-src="{{ asset(JSON_decode($item->images)[0]) }}">
                                </a>
                                <div class="product-action clearfix hidden-xs">
                                    <div class="group_action">

                                        @if ($item->status == '1')
                                            {{-- <input type="hidden" name="Id" value="1066932093" /> --}}
                                            <button type="button" onclick="addCartajax({{ $item->id }})"
                                                class="btn-buy btn-cart btn btn-circle left-to add_to_cart"
                                                title="Mua ngay"></button>
                                            {{-- <span class="text btn btn-main" onclick="addcart({{ $item->id }})">Thêm vào
                                                            giỏ hàng</span> --}}
                                        @else
                                            <div class="btn btn_base d-block disabled" disabled>
                                                <span class="text btn btn-main">Tạm hết hàng</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="product-info a-left">
                                <h3 class="product-name"><a href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}" 
                                    title="{{ $item->name }}">{{ $item->name }}</a>
                                </h3>
                                <div class="product-hideoff">
                                    <div class="product-hide">
                                        <div class="price-box clearfix">
                                            <div class="special-price">
                                                <span
                                                    class="price product-price">{{ number_format($item->salePrice, 0, '.', ',') }}₫</span>
                                            </div>
                                            @if ($item->percent_discount > 0)
                                                <div class="old-price">
                                                    <span class="price product-price-old">
                                                        {{ number_format($item->oldPrice, 0, '.', ',') }}₫
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
