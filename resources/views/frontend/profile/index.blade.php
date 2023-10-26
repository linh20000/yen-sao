@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Tài khoản'])

    <section class="signup page_customer_account margin-top-30">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-main-acount">
                    <div id="parent" class="row">
                        <div id="a" class="col-xs-12 col-sm-12 col-lg-9 col-left-account">
                            <div class="page-title m992">
                                <h1 class="title-head margin-top-0"><a href="#">Thông tin tài khoản</a></h1>
                            </div>
                            <div class="form-signup name-account m992">
                                <p><strong>Xin chào, <a href="/account/addresses" style="color:#f02b2b;">aaaa
                                            aaaa</a>&nbsp;!</strong></p>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-lg-12 no-padding">
                                <div class="my-account">
                                    <div class="dashboard">

                                        <div class="recent-orders">
                                            <div class="table-responsive tab-all" style="overflow-x:auto;">
                                                <table class="table table-cart" id="my-orders-table">
                                                    <thead class="thead-default a-center">
                                                        <tr>
                                                            <th>Đơn hàng</th>
                                                            <th>Ngày</th>


                                                            <th>Giá trị đơn hàng</th>
                                                            <th>Trạng thái thanh toán</th>
                                                            <th>Trạng thái giao hàng</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>


                                                        <tr class="first odd">
                                                            <td><a href="/account/orders/511251f52b144305ad1451a56866a5c5"
                                                                    title="">#100018</a></td>
                                                            <td>15/03/2023</td>




                                                            <td><span class="price">30,000₫</span></td>
                                                            <td>
                                                                <!-- <em>
        
        Thanh toán một phần
        
        </em> -->



                                                                <em>

                                                                    Thanh toán một phần

                                                                </em>




                                                            </td>
                                                            <td>

                                                                <em>


                                                                    Chưa giao hàng


                                                                </em>


                                                            </td>
                                                        </tr>


                                                    </tbody>


                                                </table>

                                            </div>

                                            <div class="text-xs-right">

                                            </div>
                                        </div>
                                        <div class="paginate-pages pull-right page-account">
                                            <nav class="clearfix relative nav_pagi f-left w_100">
                                                <ul class="pagination clearfix">

                                                    <li class="page-item disabled"><a class="page-link" href="#"><i
                                                                class="fas fa-angle-left"></i></a></li>

                                                    <li class="page-item disabled"><a class="page-link" href="#"><i
                                                                class="fas fa-angle-right"></i></a></li>

                                                </ul>
                                            </nav>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="b" class="col-xs-12 col-sm-12 col-lg-3 col-right-account margin-top-20">
                            <div class="page-title mx991">
                                <h1 class="title-head"><a href="#">Thông tin tài khoản</a></h1>
                            </div>
                            <div class="form-signup body_right mx991">
                                <p><strong>Xin chào, <a href="/account/addresses" style="color:#f02b2b;">aaaa
                                            aaaa</a>&nbsp;!</strong></p>
                            </div>
                            <div class="block-account">
                                <div class="block-title-account">
                                    <h5>Tài khoản của tôi</h5>
                                </div>
                                <div class="block-content form-signup">
                                    <p>Tên tài khoản: <strong style="line-height: 20px;"> aaaa aaaa!</strong></p>
                                    <p><i class="fa fa-mobile font-some" aria-hidden="true"></i> <span>Điện thoại: </span>
                                    </p>
                                    <p><i class="fa fa-map-marker font-some" aria-hidden="true"></i> <span> Địa chỉ: </span>
                                    </p>
                                    <p><i class="fa fa-plane font-some" aria-hidden="true"></i> <span> Quốc gia
                                            :Vietnam</span></p>
                                    <p style="margin-top:20px;"><a href="{{route('profileAddress')}}"
                                            class="btn btn-full btn-primary">Sửa địa chỉ</a></p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
