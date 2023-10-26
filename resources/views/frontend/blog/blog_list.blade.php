<div class="container">
    <meta itemprop="name" content="Tin tức">
    <meta itemprop="description" content="">
    <div class="row">
        <div class="content_all f-left w_100">
            <div class="right-content margin-bottom-fix margin-bottom-50-article col-md-12 col-sm-12 col-xs-12">
                <div class="box-heading relative">
                    <h1 class="title-head page_title">
                        Tin tức
                    </h1>
                </div>
                <div class="list-blogs blog-main row">

                    @foreach ($blog_list as $blog_list) 
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="blog_index">
                            <div class="myblog"
                                onclick="window.location.href='{{route('blog_details', [$blog_list->id, Str::slug($blog_list->subname)])}}';">
                                <div class="image-blog-left a-center">

                                    <a class="image-blog"
                                        href="{{route('blog_details', [$blog_list->id, Str::slug($blog_list->subname)])}}"
                                        title="{{$blog_list->subname}}">
                                        <img class="lazyload loaded"
                                            src="{{asset($blog_list->image)}}"
                                            data-src="{{asset($blog_list->image)}}"
                                            data-was-processed="true">
                                    </a>

                                    <div class="date_blog">
                                        <i class="far fa-calendar"></i><b class="color_main">{{$blog_list->created_at}}</b>
                                        &nbsp; Đăng bởi: <b class="color_main">{{$blog_list->name}}</b>
                                    </div>
                                </div>
                                <div class="content_blog">
                                    <div class="content_right">
                                        <h3>
                                            <a href="{{route('blog_details', [$blog_list->id, Str::slug($blog_list->subname)])}}"
                                                title="{{$blog_list->subname}}">
                                                {{$blog_list->subname}}</a>
                                        </h3>
                                    </div>
                                    <div class="summary_item_blog">
                                        <p>{{$blog_list->seo_description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <div class="row">
                    <div class="col-xs-12 text-right">

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

