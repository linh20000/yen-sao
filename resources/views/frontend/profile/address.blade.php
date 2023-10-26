@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Tài khoản - Địa chỉ'])

    <section class="address">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <h1 class="title-head">Địa chỉ của bạn <a class="f-right" href="{{route('profile')}}" alt=""
                            style="text-decoration:none; font-size: 14px;background: #1a1a26;padding: 5px 10px;color: #fff;border-radius: 5px;
                        ">Quay lại</a></h1>
                </div>
                

                <div class="col-xs-12 col-sm-12 col-lg-12">
                    <div class="row total_address">
                        <div id="view_address_1124575574" class="customer_address col-xs-12">
                            <div class="row" style="border-top: 1px #ebebeb solid; padding-top:20px;">
                                <div class="col-sm-6">
                                    <div class="address_info ">
                                        <div class="info clearfix">
                                            <span class="address-group">
                                                <div class="address form-signup">
                                                    <p><strong>Tên tài khoản: </strong>aaaa aaaa
                                                        <small>(Địa chỉ mặc định)</small>
                                                    </p>
                                                    <p>
                                                        <strong>Địa chỉ: </strong>
                                                        ccccc,
                                                        bbbbb,
                                                        Vietnam
                                                    </p>
                                                    <p><strong>Quốc tịch:</strong> Vietnam</p>
                                                    <p><strong>Số điện thoại:</strong> 0123456789</p>
                                                </div>
                                            </span>
                                        </div>
                                    </div>
                                    <div id="tool_address_1124575574" class="">
                                        <p class="btn-row">
                                            <!-- <button class="btn btn-lg btn-style article-readmore" type="button"  onclick="haravan.CustomerAddress.toggleEditForm(1124575574);return false" ><span>Sửa</span></button> -->
                                            <button class="btn-edit-addr btn btn-primary" type="button"
                                                data-target="#collapseExample-1124575574" aria-expanded="false"
                                                fdprocessedid="ag5b5">
                                                Chỉnh sửa địa chỉ
                                            </button>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="collapse" id="collapseExample-1124575574" style="display: none;">
                                        <div id="edit_address_1124575574" class="form-list">
                                            <form accept-charset="UTF-8" action="/account/addresses/1124575574"
                                                id="address_form_1124575574" method="post">
                                                @csrf
                                                <input name="form_type" type="hidden" value="customer_address">
                                                <input name="utf8" type="hidden" value="✓">
                                                <div class="clearfix">
                                                    <fieldset class="form-group">
                                                        <label>Tên<span>*</span></label>
                                                        <input type="text" class="form-control"
                                                            name="address[first_name]" value="aaaa" required=""
                                                            requiredmsg="Không được bỏ trống">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Địa chỉ<span>*</span></label>
                                                        <input type="text" class="form-control"
                                                            name="address[address1]" value="ccccc" required=""
                                                            requiredmsg="Không được bỏ trống">
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Quốc gia<span>*</span></label>
                                                        <select name="address[country]" class="form-control mySelect2"
                                                            id="mySelect2_1124575574" data-default="Vietnam">
                                                            <option value="Việt Nam">Việt Nam</option>Vietnam<option
                                                                value""="" data-provinces="[]">- Please Select --</option>
                                                            <option value="Vietnam"
                                                                data-provinces="[&quot;Hồ Chí Minh&quot;,&quot;Hà Nội&quot;,&quot;Đà Nẵng&quot;,&quot;An Giang&quot;,&quot;Bà Rịa - Vũng Tàu&quot;,&quot;Bình Dương&quot;,&quot;Bình Phước&quot;,&quot;Bình Thuận&quot;,&quot;Bình Định&quot;,&quot;Bạc Liêu&quot;,&quot;Bắc Giang&quot;,&quot;Bắc Kạn&quot;,&quot;Bắc Ninh&quot;,&quot;Bến Tre&quot;,&quot;Cao Bằng&quot;,&quot;Cà Mau&quot;,&quot;Cần Thơ&quot;,&quot;Gia Lai&quot;,&quot;Hà Giang&quot;,&quot;Hà Nam&quot;,&quot;Hà Tĩnh&quot;,&quot;Hòa Bình&quot;,&quot;Hưng Yên&quot;,&quot;Hải Dương&quot;,&quot;Hải Phòng&quot;,&quot;Hậu Giang&quot;,&quot;Khánh Hòa&quot;,&quot;Kiên Giang&quot;,&quot;Kon Tum&quot;,&quot;Lai Châu&quot;,&quot;Long An&quot;,&quot;Lào Cai&quot;,&quot;Lâm Đồng&quot;,&quot;Lạng Sơn&quot;,&quot;Nam Định&quot;,&quot;Nghệ An&quot;,&quot;Ninh Bình&quot;,&quot;Ninh Thuận&quot;,&quot;Phú Thọ&quot;,&quot;Phú Yên&quot;,&quot;Quảng Bình&quot;,&quot;Quảng Nam&quot;,&quot;Quảng Ngãi&quot;,&quot;Quảng Ninh&quot;,&quot;Quảng Trị&quot;,&quot;Sóc Trăng&quot;,&quot;Sơn La&quot;,&quot;Thanh Hóa&quot;,&quot;Thái Bình&quot;,&quot;Thái Nguyên&quot;,&quot;Thừa Thiên Huế&quot;,&quot;Tiền Giang&quot;,&quot;Trà Vinh&quot;,&quot;Tuyên Quang&quot;,&quot;Tây Ninh&quot;,&quot;Vĩnh Long&quot;,&quot;Vĩnh Phúc&quot;,&quot;Yên Bái&quot;,&quot;Điện Biên&quot;,&quot;Đắk Lắk&quot;,&quot;Đắk Nông&quot;,&quot;Đồng Nai&quot;,&quot;Đồng Tháp&quot;]">
                                                                Vietnam</option>
                                                            <option value="United States"
                                                                data-provinces="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;American Samoa&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;Armed Forces Americas&quot;,&quot;Armed Forces Europe&quot;,&quot;Armed Forces Pacific&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;District of Columbia&quot;,&quot;Federated States of Micronesia&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Guam&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Marshall Islands&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Carolina&quot;,&quot;North Dakota&quot;,&quot;Northern Mariana Islands&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Palau&quot;,&quot;Pennsylvania&quot;,&quot;Puerto Rico&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virgin Islands&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
                                                                United States</option>
                                                            <option value="Thailand"
                                                                data-provinces="[&quot;Amnat Charoen&quot;,&quot;Ang Thong&quot;,&quot;Bangkok&quot;,&quot;Bueng Kan&quot;,&quot;Buriram&quot;,&quot;Chachoengsao&quot;,&quot;Chai Nat&quot;,&quot;Chaiyaphum&quot;,&quot;Chanthaburi&quot;,&quot;Chiang Mai&quot;,&quot;Chiang Rai&quot;,&quot;Chon Buri&quot;,&quot;Chumphon&quot;,&quot;Kalasin&quot;,&quot;Kamphaeng Phet&quot;,&quot;Kanchanaburi&quot;,&quot;Khon Kaen&quot;,&quot;Krabi&quot;,&quot;Lampang&quot;,&quot;Lamphun&quot;,&quot;Loei&quot;,&quot;Lopburi&quot;,&quot;Mae Hong Son&quot;,&quot;Maha Sarakham&quot;,&quot;Mukdahan&quot;,&quot;Nakhon Nayok&quot;,&quot;Nakhon Pathom&quot;,&quot;Nakhon Phanom&quot;,&quot;Nakhon Ratchasima&quot;,&quot;Nakhon Sawan&quot;,&quot;Nakhon Si Thammarat&quot;,&quot;Nan&quot;,&quot;Narathiwat&quot;,&quot;Nong Bua Lam Phu&quot;,&quot;Nong Khai&quot;,&quot;Nonthaburi&quot;,&quot;Pathum Thani&quot;,&quot;Pattani&quot;,&quot;Pattaya&quot;,&quot;Phangnga&quot;,&quot;Phatthalung&quot;,&quot;Phayao&quot;,&quot;Phetchabun&quot;,&quot;Phetchaburi&quot;,&quot;Phichit&quot;,&quot;Phitsanulok&quot;,&quot;Phra Nakhon Si Ayutthaya&quot;,&quot;Phrae&quot;,&quot;Phuket&quot;,&quot;Prachin Buri&quot;,&quot;Prachuap Khiri Khan&quot;,&quot;Ranong&quot;,&quot;Ratchaburi&quot;,&quot;Rayong&quot;,&quot;Roi Et&quot;,&quot;Sa Kaeo&quot;,&quot;Sakon Nakhon&quot;,&quot;Samut Prakan&quot;,&quot;Samut Sakhon&quot;,&quot;Samut Songkhram&quot;,&quot;Saraburi&quot;,&quot;Satun&quot;,&quot;Sing Buri&quot;,&quot;Sisaket&quot;,&quot;Songkhla&quot;,&quot;Sukhothai&quot;,&quot;Suphan Buri&quot;,&quot;Surat Thani&quot;,&quot;Surin&quot;,&quot;Tak&quot;,&quot;Trang&quot;,&quot;Trat&quot;,&quot;Ubon Ratchathani&quot;,&quot;Udon Thani&quot;,&quot;Uthai Thani&quot;,&quot;Uttaradit&quot;,&quot;Yala&quot;,&quot;Yasothon&quot;]">
                                                                Thailand</option>
                                                        </select>
                                                    </fieldset>
                                                    <fieldset class="form-group">
                                                        <label>Số điện thoại<span>*</span></label>
                                                        <input type="text" class="form-control" name="address[phone]"
                                                            value="0123456789" required=""
                                                            requiredmsg="Không được bỏ trống">
                                                    </fieldset>
                                                </div>
                                                <div class="form-group clearfix">
                                                    <div class="col-sm-9">
                                                        <div class="row">
                                                            <button class="btn btn-primary" type="submit"><span>Cập nhật
                                                                    địa chỉ</span></button>
                                                            <button class="btn-edit-addr btn btn-primary" type="button">
                                                                Hủy
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panigate col-xs-12 col-sm-12 col-lg-12">


                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript" charset="utf-8">
        $(document).ready(function() {

            var elements = $("input, select, textarea");
            for (var i = 0; i < elements.length; i++) {
                elements[i].oninvalid = function(e) {
                    e.target.setCustomValidity("");
                    if (!e.target.validity.valid) {
                        e.target.setCustomValidity(e.target.getAttribute("requiredmsg"));
                    }
                };
                elements[i].oninput = function(e) {
                    e.target.setCustomValidity("");
                };
            }
            $('.btn-edit-addr').click(function() {
                var ctr = $(this).attr('aria-controls');
                $('#' + ctr).slideToggle("fast");
            });
            $('.mySelect2').each(function() {
                var old = $(this).attr('data-default');
                $(this).val(old);
                $(this).change();
            })

        })
        $('button.btn-edit-addr').click(function(e) {
            $(this).parents('.customer_address').find('.collapse').toggle();
        })

        $('.article-readmore').click(function(e) {
            $('#add_address').addClass('hidden');
        })
    </script>
@endsection
