<section class="awe-section-4">


    <section class="section_tab_base section_product_feature section_base">
        <div class="container">
            <div class="row row-noGutter-2 content_tab_h heading">
                <h2 class="title-head" title="Danh mục sản phẩm">
                    <a href="/collections/all" class="text_gradient">Danh mục sản phẩm</a>
                </h2>
                <div class="tab_link_module">

                    <div class="tabs-container tab_border">
                        <div class="button_click_1">
                            <span id="button_show_tab" class="hidden-sm hidden-md hidden-lg">
                                <i class="fas fa-caret-down fa"></i>
                            </span>
                            <span class="hidden-sm hidden-md hidden-lg title_check_tabs">Rau củ</span>
                        </div>
                        <div class="clearfix">
                            <ul class="ul_link link_tab_check_click">


                                <li class="li_tabs li_h">
                                    <a href="#content-tabb1" class="head-tabs head-tab1 active"
                                        data-src=".head-tab1">Rau củ</a>
                                </li>

                                <li class="li_tabs li_h">
                                    <a href="#content-tabb2" class="head-tabs head-tab2" data-src=".head-tab2">Hoa
                                        quả</a>
                                </li>

                                <li class="li_tabs li_h">
                                    <a href="#content-tabb3" class="head-tabs head-tab3" data-src=".head-tab3">Hải
                                        sản</a>
                                </li>

                                <li class="li_tabs li_h">
                                    <a href="#content-tabb4" class="head-tabs head-tab4" data-src=".head-tab4">Các loại
                                        hạt</a>
                                </li>

                                <li class="li_tabs li_h">
                                    <a href="#content-tabb5" class="head-tabs head-tab5" data-src=".head-tab5">Thực phẩm
                                        tươi sống</a>
                                </li>

                                {{-- @foreach ($category as $item)
                                    <li class="li_tabs li_h">
                                        <a href="#content-{{$item->id}}" class="head-tabs head-tab{{$item->id}}" data-src=".head-tab{{$item->id}}">
                                            {{$item->name}}
                                        </a>
                                    </li>
                                @endforeach --}}

                            </ul>
                        </div>
                    </div>
                </div>

                <div class="tab_link_module">
                    <div class="tabs-content">

                        <div id="content-tabb1" class="content-tab content-tab-proindex" style="display: block;">
                            <div class="clearfix wrap_item_list row products-view-grid-bb products-view-grid">

                                @foreach ($product_rau as $item)
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 fix_clear">
                                        <div class="item wrp_item_small product-col">
                                            <div class="product-box-h product-base">
                                                <div class="product-thumbnail">
                                                    <a class="image_link display_flex" href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                        title="{{ $item->name }}">
                                                        <img class="lazyload loaded"
                                                            src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            data-src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            alt="{{ $item->name }}" data-was-processed="true">
                                                    </a>
                                                    <div class="product-action clearfix hidden-xs">
                                                        <div class="group_action">
                                                            @if ($item->status == '1')
                                                                {{-- <input type="hidden" name="Id" value="1066932093" /> --}}
                                                                <button type="button"
                                                                    onclick="addCartajax({{ $item->id }})"
                                                                    class="btn-buy btn-cart btn btn-circle left-to add_to_cart"
                                                                    title="Mua ngay">
                                                                </button>
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
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div id="content-tabb2" class="content-tab content-tab-proindex" style="display: none;">
                            <div class="clearfix wrap_item_list row products-view-grid-bb products-view-grid">

                                @foreach ($product_hoaqua as $item)
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 fix_clear">
                                        <div class="item wrp_item_small product-col">
                                            <div class="product-box-h product-base">
                                                <div class="product-thumbnail">
                                                    <a class="image_link display_flex" href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                        title="{{ $item->name }}">
                                                        <img class="lazyload loaded"
                                                            src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            data-src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            alt="{{ $item->name }}" data-was-processed="true">
                                                    </a>
                                                    <div class="product-action clearfix hidden-xs">
                                                        <div class="group_action">
                                                            @if ($item->status == '1')
                                                                <button type="button"
                                                                    onclick="addCartajax({{ $item->id }})"
                                                                    class="btn-buy btn-cart btn btn-circle left-to add_to_cart"
                                                                    title="Mua ngay"></button>
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
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div id="content-tabb3" class="content-tab content-tab-proindex" style="display: none;">
                            <div class="clearfix wrap_item_list row products-view-grid-bb products-view-grid">

                                @foreach ($product_haisan as $item)
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 fix_clear">
                                        <div class="item wrp_item_small product-col">
                                            <div class="product-box-h product-base">
                                                <div class="product-thumbnail">
                                                    <a class="image_link display_flex"
                                                        href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                        title="{{ $item->name }}">
                                                        <img class="lazyload loaded"
                                                            src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            data-src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            alt="{{ $item->name }}" data-was-processed="true">
                                                    </a>
                                                    <div class="product-action clearfix hidden-xs">
                                                        <div class="group_action">
                                                            @if ($item->status == '1')
                                                                <button type="button"
                                                                    onclick="addCartajax({{ $item->id }})"
                                                                    class="btn-buy btn-cart btn btn-circle left-to add_to_cart"
                                                                    title="Mua ngay"></button>
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
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div id="content-tabb4" class="content-tab content-tab-proindex" style="display: none;">
                            <div class="clearfix wrap_item_list row products-view-grid-bb products-view-grid">

                                @foreach ($product_cacloaihat as $item)
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 fix_clear">
                                        <div class="item wrp_item_small product-col">
                                            <div class="product-box-h product-base">
                                                <div class="product-thumbnail">
                                                    <a class="image_link display_flex" href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                        title="{{ $item->name }}">
                                                        <img class="lazyload loaded"
                                                            src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            data-src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            alt="{{ $item->name }}" data-was-processed="true">
                                                    </a>
                                                    <div class="product-action clearfix hidden-xs">
                                                        <div class="group_action">
                                                            @if ($item->status == '1')
                                                                <button type="button"
                                                                    onclick="addCartajax({{ $item->id }})"
                                                                    class="btn-buy btn-cart btn btn-circle left-to add_to_cart"
                                                                    title="Mua ngay"></button>
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
                                    </div>
                                @endforeach

                            </div>
                        </div>

                        <div id="content-tabb5" class="content-tab content-tab-proindex" style="display: none;">
                            <div class="clearfix wrap_item_list row products-view-grid-bb products-view-grid">

                                @foreach ($product_tuoisong as $item)
                                    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3 fix_clear">
                                        <div class="item wrp_item_small product-col">
                                            <div class="product-box-h product-base">
                                                <div class="product-thumbnail">
                                                    <a class="image_link display_flex" href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                        title="{{ $item->name }}">
                                                        <img class="lazyload loaded"
                                                            src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            data-src="{{ asset(JSON_decode($item->images)[0]) }}"
                                                            alt="{{ $item->name }}" data-was-processed="true">
                                                    </a>
                                                    <div class="product-action clearfix hidden-xs">
                                                        <div class="group_action">
                                                            @if ($item->status == '1')
                                                                <button type="button"
                                                                    onclick="addCartajax({{ $item->id }})"
                                                                    class="btn-buy btn-cart btn btn-circle left-to add_to_cart"
                                                                    title="Mua ngay"></button>
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
                                    </div>
                                @endforeach

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
