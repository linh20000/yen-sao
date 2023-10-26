<div class="sortPagiBar">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">
            <div class="box-heading relative">
                <h1 class="title-head margin-top-0">Tất cả sản phẩm</h1>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-9">
            <div class="bg-white sort-cate clearfix">

                <div class="sort-cate-left hidden-xs">

                    <h3>Sắp xếp theo:</h3>
                    <ul>
                        <li class="btn-quick-sort ">
                            <a href="{{ request()->fullUrlWithQuery(['name' => 'asc']) }}"
                                onclick="sortby('alpha-asc')"><i></i>A → Z</a>
                        </li>
                        <li class="btn-quick-sort ">
                            <a href="{{ request()->fullUrlWithQuery(['name' => 'desc']) }}"
                                onclick="sortby('alpha-desc')"><i></i>Z → A</a>
                        </li>
                        <li class="btn-quick-sort ">
                            <a href="{{ request()->fullUrlWithQuery(['salePrice' => 'asc']) }}"
                                onclick="sortby('price-asc')"><i></i>Giá tăng
                                dần</a>
                        </li>
                        <li class="btn-quick-sort ">
                            <a href="{{ request()->fullUrlWithQuery(['salePrice' => 'desc']) }}"
                                onclick="sortby('price-desc')"><i></i>Giá giảm
                                dần</a>
                        </li>
                        <li class="btn-quick-sort ">
                            <a href="{{ route('ProductList') }}"> Xóa bộ lọc</a>
                        </li>
                    </ul>
                </div>
                <div class="sort-cate-right-mobile hidden-lg hidden-md hidden-sm">
                    <div id="sort-by">
                        <label class="left">Sắp xếp: </label>
                        <ul>
                            <li><span>Thứ tự</span>
                                <ul>
                                    <li><a href="{{ request()->fullUrlWithQuery(['name' => 'asc']) }}"
                                            onclick="sortby('alpha-asc')">A →
                                            Z</a></li>
                                    <li><a href="{{ request()->fullUrlWithQuery(['name' => 'desc']) }}"
                                            onclick="sortby('alpha-desc')">Z →
                                            A</a></li>
                                    <li><a href="{{ request()->fullUrlWithQuery(['salePrice' => 'asc']) }}"
                                            onclick="sortby('price-asc')">Giá
                                            tăng dần</a></li>
                                    <li><a href="{{ request()->fullUrlWithQuery(['salePrice' => 'desc']) }}"
                                            onclick="sortby('price-desc')">Giá
                                            giảm dần</a></li>
                                    <li>
                                        <a href="{{ route('ProductList') }}"> Xóa bộ lọc</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
