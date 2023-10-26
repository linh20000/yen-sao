@include('frontend.components.register_new')


<footer class="footer">
    <div class="mid-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="widget_first_childs margin-top-50">
                        <div class="logo_footer" style="margin-bottom: 12px;">
                            <a href="{{route('home')}}" class="logo-wrapper">
                                <img src="{{$profile->logo}}"
                                    alt="logo Cool Organic">
                            </a>
                        </div>
                        <div class="widget-ft-top">
                            <h4 class="title-menu-top hidden">
                                <span>
                                    Hỗ trợ mua hàng
                                </span>
                            </h4>
                            <div class="hotline_footer">
                                <ul class="contact padding-0">
                                    <li class="li_footer_h">
                                        <span class="txt_content_child">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span class="add">

                                                {{$profile->address}}

                                            </span>
                                        </span>
                                    </li>
                                    <li class="li_footer_h">
                                        <span class="txt_content_childs">


                                            <i class="fas fa-mobile-alt"></i> <a class="hai01"
                                                href="tel:{{$profile->hotline}}">{{$profile->hotline}}</a>

                                        </span>
                                    </li>
                                    <li class="li_footer_h">
                                        <span class="txt_content_childs">



                                            <i class="far fa-envelope"></i> <a
                                                href="mailto:{{$profile->email}}">{{$profile->email}}</a>


                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="widget-ft first">
                                <h4 class="title-menu">
                                    <a role="button" class="collapsed" data-toggle="collapse" aria-expanded="false"
                                        data-target="#collapseListMenu01" aria-controls="collapseListMenu01">
                                        Cẩm nang sử dụng <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </h4>
                                <div class="collapse" id="collapseListMenu01">
                                    <ul class="list-menu">

                                        <li class="li_menu"><a title="Trang chủ" href="{{ route('home') }}">Trang chủ</a></li>

                                        <li class="li_menu"><a title="Giới thiệu" href="{{route('about-us')}}">Giới
                                                thiệu</a></li>

                                        <li class="li_menu"><a title="Sản phẩm" href="{{route('ProductList')}}">Sản phẩm</a>
                                        </li>

                                        <li class="li_menu"><a title="Blog" href="{{route('blog')}}">Blog</a></li>

                                        <li class="li_menu"><a title="Liên hệ" href="{{route('Contact')}}">Liên hệ</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="widget-ft">
                                <h4 class="title-menu">
                                    <a role="button" class="collapsed" data-toggle="collapse" aria-expanded="false"
                                        data-target="#collapseListMenu02" aria-controls="collapseListMenu02">
                                        Chính sách <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </h4>
                                <div class="collapse time_work" id="collapseListMenu02">
                                    <ul class="list-menu">

                                        <li class="li_menu"><a title="Trang chủ" href="{{ route('home') }}">Trang chủ</a></li>

                                        <li class="li_menu"><a title="Giới thiệu" href="{{route('about-us')}}">Giới
                                                thiệu</a></li>

                                        <li class="li_menu"><a title="Sản phẩm" href="{{route('ProductList')}}">Sản phẩm</a>
                                        </li>

                                        <li class="li_menu"><a title="Blog" href="{{route('blog')}}">Blog</a></li>

                                        <li class="li_menu"><a title="Liên hệ" href="{{route('Contact')}}">Liên hệ</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                            <div class="widget-ft">
                                <h4 class="title-menu">
                                    <a role="button" class="collapsed" data-toggle="collapse" aria-expanded="false"
                                        data-target="#collapseListMenu03" aria-controls="collapseListMenu03">
                                        Dịch vụ <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </h4>
                                <div class="collapse time_work" id="collapseListMenu03">
                                    <ul class="list-menu">

                                        <li class="li_menu"><a title="Trang chủ" href="{{ route('home') }}">Trang chủ</a></li>

                                        <li class="li_menu"><a title="Giới thiệu" href="{{route('about-us')}}">Giới
                                                thiệu</a></li>

                                        <li class="li_menu"><a title="Sản phẩm" href="{{route('ProductList')}}">Sản
                                                phẩm</a></li>

                                        <li class="li_menu"><a title="Blog" href="{{route('blog')}}">Blog</a></li>

                                        <li class="li_menu"><a title="Liên hệ" href="{{route('Contact')}}">Liên hệ</a>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-footer-bottom copyright clearfix">
        <div class="container">
            <div class="inner clearfix">
                <div class="row tablet">
                    <div id="copyright" class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-center fot_copyright">

                        <span class="wsp">
                            <span class="mobile">@ Bản quyền thuộc về <b> My </b><span class="hidden-xs"> |
                                </span></span>
                            <a target='_blank'
                                href='https://ommani.vn'>Powered by Ommanisoft</a>

                    </div>
                </div>
            </div>

            <a href="#" id="back-to-top" class="backtop" title="Lên đầu trang">
                <div class="border_btt">
                    <i class="fas fa-arrow-up"></i>
                </div>
            </a>


        </div>
    </div>
</footer>
