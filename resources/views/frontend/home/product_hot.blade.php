<section class="awe-section-6">
    <section class="section_best_sale">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title_brand heading">
                        <h2 title="Sản phẩm bán chạy">
                            <a href="/collections/hot-products" class="text_gradient">Sản phẩm bán chạy</a>
                        </h2>
                    </div>
                    <div class="owl-carousel" data-lg-items="4" data-md-items="4" data-sm-items="3" data-xs-items="2"
                        data-loop="false" data-height="false" data-dot="false" data-nav="false">
                        @foreach ($product_hot as $item)
                            <div class="item wrp_item_small product-col">
                                <div class="product-box-h product-base">
                                    <div class="product-thumbnail">
                                        <a class="image_link display_flex" href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                            title="{{ $item->name }}">
                                            <img class="lazyload" src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                data-src="{{ asset(JSON_decode($item->images)[0]) }}" />
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
                                        <h3 class="product-name">
                                            <a href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
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
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
