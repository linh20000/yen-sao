@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Tin tức'])

    <div class="container article-wraper" itemscope="" itemtype="https://schema.org/Article">
        <meta itemprop="mainEntityOfPage"
            content="/blogs/news/rau-xanh-tang-gia-manh-vi-troi-mua-nguoi-dan-noi-thanh-lao-dao">
        <meta itemprop="description" content="">
        <div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
            <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                <img class="hidden" src="//theme.hstatic.net/200000281397/1000675334/14/logo.png?v=77" alt="Cool Organic">
                <meta itemprop="url" content="https://theme.hstatic.net/200000281397/1000675334/14/logo.png?v=77">
                <meta itemprop="width" content="400">
                <meta itemprop="height" content="60">
            </div>
            <meta itemprop="name" content="Cool Organic">
        </div>
        <div class="row">
            <section class="right-content col-md-12 col-sm-12 col-xs-12">
                <article class="article-main content_all">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="article-details">

                                <div class="date"><i class="far fa-clock margin-right-5"></i>
                                    <div class="news_home_content_short_time">
                                        {{ $blog_detail->created_at }}
                                    </div>
                                    <span class="cmt_count_blog">
                                        <span class="color_text">Đăng bởi:</span> {{ $blog_detail->name }}
                                    </span>
                                </div>
                                <div class="article-content">
                                    <div class="rte">
                                        {!! $blog_detail->description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="row row-noGutter tag-share">
                                <div class="col-xs-12 col-sm-6 tag_article">
                                    <span class="icon_tag"></span>
                                </div>
                            </div>
                        </div>
                        <!-- TIN TỨC KHÁC -->

                        <div class="col-xs-12">
                            <div class="block-recent">
                                <h2 class="title-form-coment title_blog">
                                    <a href="news" title="Tin tức khác:">Tin tức khác:</a>
                                </h2>
                                <ul class="padding-0">

                                    @foreach ($blog_to as $item)
                                        <li>
                                            <a href="{{ route('blog_details', [$item->id, Str::slug($item->subname)]) }}"
                                                title="{{ $item->subname }}">
                                                {{ $item->subname }}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </article>
            </section>
        </div>
    </div>
@endsection
