@if (session()->has('success'))
    <div style="width: 90%; display: flex; justify-content: right;">
        <div class="txt pb-2 pt-2 ps-2 alert h4" style="color: #21b300; background-color: #abffa0;">
            {{ session()->get('success') }}
        </div>
    </div>
@endif
<script>
    setTimeout(() => {
        $('.txt').addClass('d-none')
    }, 3000)
</script>

<section class="product margin-top-5 f-left w_100" itemscope itemtype="https://schema.org/Product">

    <div class="container">
        <div class="row">
            <div class="details-product">
                <div class="product-detail-left product-images col-xs-12 col-sm-6 col-md-6 col-lg-6">
                    <div class="col_large_default large-image">

                        <a href="{{ asset(JSON_decode($product_detail->images)[0]) }}"
                            data-rel="prettyPhoto[product-gallery]">

                            <img class="checkurl img-responsive" id="img_01"
                                src="{{ asset(JSON_decode($product_detail->images)[0]) }}"
                                alt="">
                        </a>

                        <div class="hidden">

                            @foreach (array_keys(JSON_decode($product_detail->images)) as $key)
                            <div class="item">
                                <a href="{{ asset(JSON_decode($product_detail->images)[$key]) }}"
                                    data-image="{{ asset(JSON_decode($product_detail->images)[$key]) }}"
                                    data-zoom-image="{{ asset(JSON_decode($product_detail->images)[$key]) }}"
                                    data-rel="prettyPhoto[product-gallery]">
                                </a>
                            </div>
                            @endforeach


                        </div>
                    </div>

                    <div id="gallery_02"
                        class="owl-carousel owl-theme thumbnail-product thumb_product_details not-dqowl"
                        data-loop="false" data-lg-items="3" data-md-items="3" data-sm-items="3" data-xs-items="3"
                        data-xxs-items="3">

                        @foreach (array_keys(JSON_decode($product_detail->images)) as $key)
                        <div class="item">
                            <a href="javascript:void(0)"
                                data-image="{{ asset(JSON_decode($product_detail->images)[$key]) }}"
                                data-zoom-image="{{ asset(JSON_decode($product_detail->images)[$key]) }}">
                                <img class="img-responsive center-base lazyload"
                                    src="{{ asset(JSON_decode($product_detail->images)[$key]) }}"
                                    data-src="{{ asset(JSON_decode($product_detail->images)[$key]) }}"
                                    alt="">
                            </a>
                        </div>
                        @endforeach

                    </div>

                </div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 details-pro">
                    <h1 class="title-product">{{ $product_detail->name }}</h1>
                    <div class="fw w_100" itemprop="offers" itemscope itemtype="https://schema.org/Offer">
                        <div class="group-status">
                            <span class="first_status">Thương hiệu: <span class="status_name">Khác</span></span>
                            <span class="first_status status_2"><span class="line_tt hidden-sm">|</span> Tình trạng:


                            <span class="status_name available">
                                @if ($product_detail->status == 1)
                                    Còn hàng
                                @else
                                    Hết hàng
                                @endif
                            </span>


                            </span>
                        </div>
                        <div class="reviews_details_product">

                        </div>

                        <div class="price-box">

                            <span class="special-price"><span
                                class="price product-price">{{ number_format($product_detail->salePrice, 0, '.', ',') }}₫</span>
                            </span>
                            <!-- Giá Khuyến mại -->
                            @if ($product_detail->percent_discount > 0)    
                            <span class="old-price">
                                <del
                                    class="price product-price-old sale">{{ number_format($product_detail->oldPrice, 0, '.', ',') }}₫</del>
                            </span> <!-- Giá -->
                            @endif

                        </div>
                    </div>

                    <div class="product-summary product_description margin-bottom-0">
                        <div class="rte description ">

                            Thông tin sản phẩm đang được cập nhật.

                        </div>
                    </div>

                    <div class="form-product col-sm-12">
                        {{-- <form enctype="multipart/form-data" id="add-to-cart-form" action="{{ route('addProduct', $product_detail->id) }}">
                            @csrf --}}
                            <div class="box-variant clearfix">
                                <input type="hidden" name="id" value="{{ $product_detail->id }}" />
                            </div>
                            <div class="form-group form_button_details ">
                                <div class="form_product_content f-left w_100 ">
                                    <div class="soluong show">
                                        <div class="label_sl margin-bottom-5">Số lượng:</div>
                                        <div class="custom input_number_product soluong1 show">
                                            <button class="btn_num num_1 button button_qty"
                                                onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro ) &amp;&amp; qtypro &gt; 1 ) result.value--;return false;"
                                                type="button">-</button>
                                            <input type="text" id="qtym" name="qty" value="1"
                                                maxlength="3" class="form-control prd_quantity"
                                                onkeypress="if ( isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;"
                                                onchange="if(this.value == 0)this.value=1;">
                                            <button class="btn_num num_2 button button_qty"
                                                onClick="var result = document.getElementById('qtym'); var qtypro = result.value; if( !isNaN( qtypro )) result.value++;return false;"
                                                type="button">+</button>
                                        </div>
                                    </div>
                                    <div class="count_btn_style">
                                        <div class="button_actions clearfix">
                                            @if ($product_detail->status == '1')
                                                <button type="button" id="addCart"
                                                    class="btn btn_base button_gradient btn_add_cart btn-cart add-to-cart d-block">
                                                    <span class="text_1">Thêm vào giỏ hàng</span>
                                                </button>
                                            @else
                                                <div class="btn button_gradient btn_base d-block disabled" disabled>Tạm hết hàng</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        {{-- </form> --}}
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- TOP THƯƠNG HIỆU -->
            <div class="top_brand_product margin-top-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-xs-12">
                            <a href="" title="Banner sản phẩm">
                                <img src="{{asset('upload/images/bg_pro.jpg')}}"
                                    alt="Banner sản phẩm">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END TOP THƯƠNG HIỆU -->
            <div class="tab_h">
                <div class="col-xs-12 col-lg-12 col-sm-12 col-md-12">
                    <!-- Nav tabs -->
                    <div class="product-tab e-tabs">
                        <ul class="tabs tabs-title clearfix">

                            <li class="tab-link" data-tab="tab-1">
                                <h3><span>Mô tả sản phẩm</span></h3>
                            </li>

                            <li class="tab-link" data-tab="tab-2">
                                <h3><span>Hỏi đáp về sản phẩm</span></h3>
                            </li>

                        </ul>

                        <div id="tab-1" class="tab-content">
                            <div class="rte">

                                {!! $product_detail->description !!}
                                
                            </div>
                        </div>
                        <div id="tab-2" class="tab-content">
                            <div class="rte">
                                Các nội dung Hướng dẫn mua hàng viết ở đây
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @include('frontend.product_details.product_relate')

        </div>
    </div>
</section>

@pushonce('component-css')
    <style>
        .txt {
            position: absolute;
            z-index: 1;
        }
    </style>
@endpushonce


<script>
    var ww = $(window).width();
    var getLimit = 8;

    function validate(evt) {
        var theEvent = evt || window.event;
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        var regex = /[0-9]|\./;
        if (!regex.test(key)) {
            theEvent.returnValue = false;
            if (theEvent.preventDefault) theEvent.preventDefault();
        }
    }


    jQuery(function($) {


        // Add label if only one product option and it isn't 'Title'. Could be 'Size'.

        $('.selector-wrapper:eq(0)').prepend('<label>Tiêu đề</label>');


        // Hide selectors if we only have 1 variant and its title contains 'Default'.

        $('.selector-wrapper').hide();

        $('.selector-wrapper').css({
            'text-align': 'left',
            'margin-bottom': '15px'
        });
    });

    jQuery('.swatch :radio').change(function() {
        var optionIndex = jQuery(this).closest('.swatch').attr('data-option-index');
        var optionValue = jQuery(this).val();
        jQuery(this)
            .closest('form')
            .find('.single-option-selector')
            .eq(optionIndex)
            .val(optionValue)
            .trigger('change');
    });
    if (ww >= 1200) {

        $(document).ready(function() {
            if ($(window).width() > 1200) {
                $('#img_01').elevateZoom({
                    gallery: 'gallery_02',
                    zoomWindowWidth: 420,
                    zoomWindowHeight: 500,
                    zoomWindowOffetx: 10,
                    easing: true,
                    scrollZoom: true,
                    cursor: 'pointer',
                    galleryActiveClass: 'active',
                    imageCrossfade: true
                });
            }
        });

    }
    $("#img_02").click(function(e) {
        e.preventDefault();
        var hr = $(this).attr('src');
        $('#img_01').attr('src', hr);
        $('.large_image_url').attr('href', hr);
        $('#img_01').attr('data-zoom-image', hr);
    });

    function scrollToxxPrd() {
        $('html, body').animate({
            scrollTop: $('.product-tab.e-tabs').offset().top
        }, 'slow');
        $('.product-tab .tab-link').removeClass('current');
        $('.product-tab .tab-link[data-tab=tab-1]').addClass('current');
        $('.product-tab .tab-content').removeClass('current');
        $('.product-tab .tab-content#tab-1').addClass('current');

        return false;
    }

    /*For recent product*/
    var alias = 'ca-chua-huu-co';
    /*end*/
    if (ww >= 1200) {

        $(document).ready(function() {
            $('#img_01').elevateZoom({
                gallery: 'gallery_02',
                zoomWindowWidth: 420,
                zoomWindowHeight: 500,
                zoomWindowOffetx: 10,
                easing: true,
                scrollZoom: true,
                cursor: 'pointer',
                galleryActiveClass: 'active',
                imageCrossfade: true

            });
        });

    }
    $('#gallery_00 img, .swatch-element label').click(function(e) {

        $('.checkurl').attr('href', $(this).attr('src'));
        if (ww >= 1200) {

            setTimeout(function() {
                $('.zoomContainer').remove();
                $('#zoom_01').elevateZoom({
                    gallery: 'gallery_02',
                    zoomWindowWidth: 420,
                    zoomWindowHeight: 500,
                    zoomWindowOffetx: 10,
                    easing: true,
                    scrollZoom: true,
                    cursor: 'pointer',
                    galleryActiveClass: 'active',
                    imageCrossfade: true
                });
            }, 300);

        }
    });
</script>
<script>
    $(document).ready(function(e) {

        var sale_count = $('.details-product .product-detail-left .sale_count .bf_');
        if (sale_count == '-0%') {
            sale_count.text('-1%');
        } else if (sale_count == '-100%') {
            sale_count.text('-99%');
        }

        $("#gallery_02").owlCarousel({
            navigation: true,
            nav: true,
            navigationPage: false,
            navigationText: false,
            slideSpeed: 1000,
            pagination: true,
            dots: false,
            margin: 20,
            autoHeight: true,
            autoplay: false,
            autoplayTimeout: false,
            autoplayHoverPause: true,
            loop: false,
            responsive: {
                0: {
                    items: 3
                },
                543: {
                    items: 3
                },
                768: {
                    items: 3
                },
                991: {
                    items: 3
                },
                992: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        });

        $('#gallery_02 img, .swatch-element label').click(function(e) {
            e.preventDefault();
            var ths = $(this).attr('data-img');
            $('.large-image .checkurl').attr('src', ths);

            $('.large-image .checkurl img').attr('src', ths);

            /*** xử lý active thumb -- ko variant ***/
            var thumbLargeimg = $('.details-product .large-image a').attr('href');
            var thumMedium = $('#gallery_02 .owl-item .item a').find('img').attr('src');
            var url = [];

            $('#gallery_02 .owl-item .item').each(function() {
                var srcImg = '';
                $(this).find('a img').each(function() {
                    var current = $(this);
                    if (current.children().size() > 0) {
                        return true;
                    }
                    srcImg += $(this).attr('src');
                });
                url.push(srcImg);
                var srcimage = $(this).find('a img').attr('src');
                if (srcimage == thumbLargeimg) {
                    $(this).find('a').addClass('active');
                } else {
                    $(this).find('a').removeClass('active');
                }
            });
        })

    });
</script>

<link rel="preload" as="script" href="//theme.hstatic.net/200000281397/1000675334/14/quickview.js?v=77" />
<link href='//theme.hstatic.net/200000281397/1000675334/14/lightbox.css?v=77' rel='stylesheet' type='text/css'
    media='all' />
<script src='//theme.hstatic.net/200000281397/1000675334/14/jquery.elevatezoom308.min.js?v=77' type='text/javascript'>
</script>
<script src='//theme.hstatic.net/200000281397/1000675334/14/jquery.prettyPhoto.min005e.js?v=77' type='text/javascript'>
</script>
<script src='//theme.hstatic.net/200000281397/1000675334/14/jquery.prettyPhoto.init.min367a.js?v=77'
    type='text/javascript'></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script src='//theme.hstatic.net/200000281397/1000675334/14/recentview.js?v=77' type='text/javascript'></script>
