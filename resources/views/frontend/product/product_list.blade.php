<div class="category-products products f-left w_100" id="product">

    @include('frontend.product.filter')

    <section class="products-view products-view-grid" >
        <div class="row" >

            @foreach ($product as $item)
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
                    <div class="product-box-h product-base">
                        <div class="product-thumbnail">
                            <a class="image_link display_flex"
                                href="{{ route('productDetail', [$item->id, Str::slug($item->name)]) }}"
                                title="">
                                <img class="lazyload loaded"
                                    src="{{ asset(JSON_decode($item->images)[0]) }}"
                                    data-src="{{ asset(JSON_decode($item->images)[0]) }}" alt=""
                                    data-was-processed="true">
                            </a>
                            <div class="product-action clearfix hidden-xs">

                                <div class="group_action">
                                    @if ($item->status == '1')
                                        {{-- <input type="hidden" name="Id" value="1066932093" /> --}}
                                        <button type="button"
                                            onclick="addCartajax({{ $item->id }})"
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
                            <h3 class="product-name"><a
                                    href="{{ route('productDetail', [$item->id, Str::slug($item->name)]) }}"
                                    title="{{ $item->name }}">{{ $item->name }}</a></h3>
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

        <div class="d-flex justify-content-center text-right">
            <nav class="clearfix nav_pagi f-left w_100">
                {{ $product->links('pagination::bootstrap-4') }}
            </nav>
        </div>
    </section>

</div>