<section class="awe-section-8">
    <div class="section_top_brand">
        <div class="container">
            <div class="row">
                <div class="title_brand heading">
                    <h2 title="Top thương hiệu">
                        <span class="text_gradient">Top thương hiệu</span>
                    </h2>
                </div>
                <div class="col-lg-12 col-xs-12 item_fix_brand">
                    <div class="owl-carousel owl-theme brand_content not-aweowl">

                        @foreach ($trademark as $item)    
                        <div class="item">
                            <a class="img_" href="{{ $item->link }}">
                                <img class="lazyload" style="width: auto;"
                                    src="{{ asset($item->images) }}"
                                    data-src="{{ asset($item->images) }}"
                                    alt="Cool Organic" />
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
