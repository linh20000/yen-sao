<div class="container">
    <div class="row">
        <div class="bg_collection collection_2">

            <div class="main_container col-lg-12 padding-col-left-0">
                <aside class="dqdt-sidebar sidebar left-content col-lg-12 no-padding-col2">

                    <div class="aside-filter">
                        <div class="filter-container">
                            <div class="filter-container__selected-filter" style="display: none;">
                                <div class="filter-container__selected-filter-header clearfix">
                                    <span class="filter-container__selected-filter-header-title"><i
                                            class="fa fa-arrow-left hidden-sm-up"></i> Bạn chọn</span>
                                    <a href="javascript:void(0)" onclick="clearAllFiltered()"
                                        class="filter-container__clear-all">Bỏ hết <i class="fa fa-angle-right"></i></a>
                                </div>
                                <div class="filter-container__selected-filter-list">
                                    <ul></ul>
                                </div>
                            </div>
                        </div>
                        <!-- Lọc Thương hiệu -->

                        <aside class="aside-item filter-price">
                            <div class="aside-title">
                                <h2 class="title-head margin-top-0"><span>Giá</span></h2>
                            </div>
                            <div class="aside-content filter-group content_price margin-top-10">
                                <ul>

                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label data-filter="100-000d" for="filter-duoi-100-000d">
                                                <input type="checkbox" name="prices" id="filter-duoi-100-000d" 
                                                    value="0-100000">
                                                <i class="fa"></i>
                                                Giá dưới 100.000đ
                                            </label>
                                        </span>
                                    </li>

                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label data-filter="200-000d" for="filter-100-000d-200-000d">
                                                <input type="checkbox" name="prices" id="filter-100-000d-200-000d"
                                                    value="100000-200000"
                                                >
                                                <i class="fa"></i>
                                                100.000đ - 200.000đ
                                            </label>
                                        </span>
                                    </li>

                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label data-filter="300-000d" for="filter-200-000d-300-000d">
                                                <input type="checkbox" name="prices" id="filter-200-000d-300-000d"
                                                    value="200000-300000"
                                                >
                                                <i class="fa"></i>
                                                200.000đ - 300.000đ
                                            </label>
                                        </span>
                                    </li>

                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label data-filter="500-000d" for="filter-300-000d-500-000d">
                                                <input type="checkbox" name="prices" id="filter-300-000d-500-000d"
                                                    value="300000-500000"
                                                >
                                                <i class="fa"></i>
                                                300.000đ - 500.000đ
                                            </label>
                                        </span>
                                    </li>

                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label data-filter="1-000-000d" for="filter-500-000d-1-000-000d">
                                                <input type="checkbox" name="prices" id="filter-500-000d-1-000-000d"
                                                    value="500000-1000000"
                                                >
                                                <i class="fa"></i>
                                                500.000đ - 1.000.000đ
                                            </label>
                                        </span>
                                    </li>
                                    <li class="filter-item filter-item--check-box filter-item--green">
                                        <span>
                                            <label data-filter="1-000-000d" for="filter-tren1-000-000d">
                                                <input type="checkbox" name="prices" id="filter-tren1-000-000d" 
                                                    value="1000000-10000000000">
                                                <i class="fa"></i>
                                                Giá trên 1.000.000đ
                                            </label>
                                        </span>
                                    </li>

                                </ul>
                            </div>
                        </aside>

                        <!-- End Lọc giá -->
                    </div>

                </aside>

                @include('frontend.product.product_list')

            </div>

            <div id="open-filters" class="button_gradient open-filters">
                <i class="fa fa-align-right"></i>
                <span>Bộ lọc</span>
            </div>
        </div>
    </div>
</div>



