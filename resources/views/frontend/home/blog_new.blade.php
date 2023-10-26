<section class="awe-section-7">
    <div class="section_new_blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading">
                        <h2 class="title-head" title="Tin tức mới nhất">
                            <a href="/" class="text_gradient">Tin tức mới nhất
                            </a>
                        </h2>
                    </div>
                    <div class="content_blog_new">
                        <div class="wrap_owl_blog owl-carousel" data-lg-items="3" data-md-items="3" data-sm-items="2"
                            data-xs-items="1" data-loop="false" data-height="false" data-dot="false" data-nav="false">

                            @foreach ($blog as $item)
                                <div class="blog_index">
                                    <div class="myblog"
                                        onclick="window.location.href='/blogs/news/rau-xanh-tang-gia-manh-vi-troi-mua-nguoi-dan-noi-thanh-lao-dao';">
                                        <div class="image-blog-left a-center">
                                            <a class="image-blog"
                                                href="/blogs/news/rau-xanh-tang-gia-manh-vi-troi-mua-nguoi-dan-noi-thanh-lao-dao"
                                                title="{{ $item->subname }}">
                                                <img class="lazyload" src="{{ asset($item->image) }}"
                                                    data-src="{{ asset($item->image) }}" alt="{{ $item->subname }}" />
                                            </a>

                                            <div class="date_blog">
                                                <i class="far fa-calendar"></i><b
                                                    class="color_main">{{ $item->created_at }}</b>
                                                &nbsp; Đăng bởi:
                                                <b class="color_main">{{ $item->name }}</b>
                                            </div>
                                        </div>
                                        <div class="content_blog">
                                            <div class="content_right">
                                                <h3>
                                                    <a href="/blogs/news/rau-xanh-tang-gia-manh-vi-troi-mua-nguoi-dan-noi-thanh-lao-dao"
                                                        title="{{ $item->subname }}"> {{ $item->subname }} </a>
                                                </h3>
                                            </div>
                                            <div class="summary_item_blog">
                                                <p> {{ $item->seo_description }} </p>
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
