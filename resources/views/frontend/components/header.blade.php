<div class="opacity_menu"></div>
<!-- Main content -->
<!-- Menu mobile -->
<div id="mySidenav" class="sidenav menu_mobile hidden-md hidden-lg">
    <div class="top_menu_mobile">
        <span class="close_menu">
        </span>
    </div>
    <div class="content_memu_mb">
        <div class="link_list_mobile">

            <ul class="ct-mobile hidden">


            </ul>
            <ul class="ct-mobile">

                <li class="level0 level-top parent level_ico">
                    <a href="{{ route('home') }}">Trang chủ</a>

                </li>

                <li class="level0 level-top parent level_ico">
                    <a href="{{route('about-us')}}">Giới thiệu</a>

                </li>

                <li class="level0 level-top parent level_ico">
                    <a href="{{route('ProductList')}}">Sản phẩm</a>

                    <i class="ti-plus hide_close fa fas fa-plus"></i>
                    <ul class="level0 sub-menu" style="display:none;">

                        @foreach ($category as $item2)
                        <li class="level1">
                            <a href="{{route('showAllProductWith', ($item2->name))}}"><span>{{ $item2->name }}</span></a>
                        </li>
                        @endforeach

                    </ul>

                </li>

                <li class="level0 level-top parent level_ico">
                    <a href="{{route('blog')}}">Blog</a>

                </li>

                <li class="level0 level-top parent level_ico">
                    <a href="{{route('Contact')}}">Liên hệ</a>

                </li>

            </ul>
        </div>
    </div>
</div>

<header class="header header_s">
    <div class="mid-header wid_100">
        <div class="container">
            <div class="row">
                <div class="content_header">
                    <div class="header-main">
                        <div class="menu-bar-h nav-mobile-button hidden-md hidden-lg">
                            <i class="fas fa-bars"></i>
                        </div>
                        <div class="col-lg-3 col-md-3">
                            <div class="logo logo_centers">

                                <a href="{{route('home')}}" class="logo-wrapper ">
                                    <img src="{{asset('upload/images/logo.png')}}"
                                        alt="logo Cool Organic">
                                </a>

                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="wrap_main hidden-xs hidden-sm">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="bg-header-nav hidden-xs hidden-sm">
                                            <div>
                                                <div class="row row-noGutter-2">
                                                    <nav class="header-nav">
                                                        <ul class="item_big">
                                                            <li class="nav-item active ">
                                                                <a class="a-img" href="{{ route('home') }}">
                                                                    <span>Trang chủ</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item ">
                                                                <a class="a-img" href="{{route('about-us')}}">
                                                                    <span>Giới thiệu</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item ">
                                                                <a class="a-img" href="{{route('ProductList')}}">
                                                                    <span>Sản phẩm</span><i
                                                                        class="fa fa-caret-down"></i>
                                                                </a>
                                                                <ul class="item_small hidden-sm hidden-xs">
                                                                    @foreach ($category as $item)
                                                                        <li>
                                                                            <a href="{{route('showAllProductWith', ($item->name))}}"
                                                                                title="">{{ $item->name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                            <li class="nav-item ">
                                                                <a class="a-img" href="{{route('blog')}}">
                                                                    <span>Blog</span>
                                                                </a>
                                                            </li>
                                                            <li class="nav-item ">
                                                                <a class="a-img" href="{{route('Contact')}}">
                                                                    <span>Liên hệ</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </nav>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 padding-0">
                            <div class="cartgroup ">
                                <div class="searchion inline-b">
                                    <span class="visible_index nn"><i class="fas fa-search"></i></span>
                                    <div class="searchmini">
                                        <form action="{{ route('search') }}" method="get"
                                            class="input-group search-bar" role="search">
                                            <input type="text" name="search" value="{{ app('request')->input('search') }}"
                                                placeholder="Tìm kiếm..."
                                                class="button_gradient input-group-field auto-search visible_index">
                                            <button type="submit" class="visible_index btn icon-fallback-text">
                                                <span class="fa fa-search"></span>
                                            </button>
                                        </form>
                                    </div>
                                </div>

                                @if (Auth::check() == false)
                                    <div class="inline-b group_accout visible_index">
                                        <i class="fas fa-user-plus"></i>
                                        <div class="groupc">
                                            <a class="btn button_gradient" href="{{ route('user.showlogin') }}">
                                                Đăng nhập</a>
                                            <a href="{{ route('userRegister') }}">Đăng ký</a>
                                        </div>
                                    </div>
                                @else
                                    <div class="inline-b group_accout ">
                                        <i class="fas fa-user-plus"></i>
                                        <div class="groupc">
                                            <a class="btn button_gradient" href="{{ route('profile') }}">Tài khoản</a>
                                            <a href="{{ route('logout') }}">Đăng xuất</a>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="header-right inline-block">
                                    <div class="top-cart-contain f-right">
                                        <div class="mini-cart text-xs-center">
                                            <div class="heading-cart cart_header">
                                                <a class="img_hover_cart" href="{{route('showCartList')}}" title="Giỏ hàng">
                                                    <div class="icon_hotline ">
                                                        <i class="fas fa-shopping-basket"></i>
                                                        <span class="count_item count_item_pr button_gradient">{{ Cart::count() }}</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="top-cart-content hidden-xs hidden-sm hidden-md">
                                                <ul id="cart-sidebar" class="mini-products-list count_li">
                                                    <ul class="list-item-cart">
                                                        
                                                        @foreach ($productCart as $item)    
                                                        <li class="item productid-1066932093">
                                                            <div class="border_list"><a class="product-image"
                                                                    href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                                    title=""><img
                                                                        alt=""
                                                                        src="{{asset(JSON_decode($item->options->images)[0])}}"
                                                                        width="100"></a>
                                                                <div class="detail-item">
                                                                    <div class="product-details">
                                                                        <p class="product-name"> <a
                                                                                href="{{route('productDetail', [$item->id, Str::slug($item->name)])}}"
                                                                                title="">{{$item->name}}</a></p>
                                                                    </div>
                                                                    <div class="product-details-bottom"><span
                                                                            class="price pricechange">{{ number_format( $item->price , 0, '.', ',') }}₫</span><span>
                                                                            x {{ $item->qty }}</span>
                                                                            <a href="{{ route('deleteCart', $item->rowId) }}"
                                                                            class="remove-item-cart fa fas fa-times">&nbsp;</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                        @endforeach

                                                    </ul>
                                                    <div class="pd">
                                                        <div class="top-subtotal">Tổng cộng: <span
                                                                class="price">{{ Cart::subtotal() }}₫</span></div>
                                                    </div>
                                                    <div class="pd right_ct"><a href="{{route('showCartList')}}"
                                                            class="btn btn-primary hidden"><span>Giỏ hàng</span></a><a
                                                            href=""
                                                            class="btn btn-primary button_gradient"><span>Tiến hành
                                                                thanh toán</span></a></div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="top-cart-contain f-right hidden">
                                        <div class="mini-cart text-xs-center">
                                            <div class="heading-cart">
                                                <a class="bg_cart" href="{{route('showCartList')}}" title="Giỏ hàng">
                                                    <i class="ion-android-cart"></i>
                                                    <span class="count_item count_item_pr">{{ Cart::count() }}</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
