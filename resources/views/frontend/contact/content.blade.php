<div class="page_contact">
    <div class="container">
        <div class="row">
            <div class="select_maps col-md-4 col-sm-12 col-xs-12">
                <div class="aa mid_fot_h contact_r">
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
                            <i class="fas fa-mobile-alt"></i>
                            <a href="tel:{{$profile->hotline}}">{{$profile->hotline}}</a>
                        </li>
                        <li class="li_footer_h">
                            <i class="far fa-envelope"></i>
                            <a href="mailto:{{$profile->email}}"> {{$profile->email}}</a>
                        </li>
                    </ul>
                </div>
                <div class="page-login page_cotact">
                    <h1 class="title-head-contact a-left"><span>Liên hệ với chúng tôi</span></h1>
                    <div id="pagelogin" class="margin-top-0">


                            <div class="form-signup clearfix">
                                <div class="row group_contact">
                                    
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Họ tên*" type="text" id="name" class="form-control form-control-lg"
                                            value="" name="name" style="margin: 15px 0 0 0;">
                                        <span class="error error-name text-danger mt-1 d-block"></span>
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Email*" type="email" id="email" class="form-control form-control-lg"
                                            value="" name="email" style="margin: 15px 0 0 0;">
                                        <span class="error error-email text-danger mt-1 d-block"></span>
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <input placeholder="Số điện thoại*" type="text" id="phone"
                                            class="form-control form-control-lg" name="phone" value="" style="margin: 15px 0 0 0;">
                                        <span class="error error-phone text-danger mt-1 d-block"></span>
                                    </fieldset>
                                    <fieldset class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea placeholder="Nhập nội dung*" name="comment" id="comment" class="form-control content-area form-control-lg" 
                                        rows="5" style="margin-bottom: 10px !important; margin-top: 15px; " ></textarea>
                                        <span class="error error-comment text-danger mt-1 d-block"
                                        style="margin-bottom: 20px !important"></span>
                                    </fieldset>

                                <div class="mess d-none"> </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 1rem" >
                                        <button class="btn btn-primary btn-comment button_gradient contactAjax">Gửi
                                            liên hệ</button>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="select_maps col-md-8 col-sm-12 col-xs-12">
                <div class="section_mapss margin-bottom-50">
                    <div class="box-maps">
                        <div class="iFrameMap">
                            <div class="google-map">
                                <div id="contact_map" class="map">
                                    <iframe
                                        src="{{$profile->google_map}}"
                                        allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@pushonce('component-css')
<style>
  .mess{
    width: 100%;
    padding: 0.4rem 1rem;
    margin: 0 11px 15px; 
    font-weight: 700; 
    color: #21b300; 
    background-color: #abffa0;
  }
  .d-none{
    display: none;
  }
  .contactAjax{
    background-color: #FFC107;
    width: 100%;
    border: 1px solid #FFC107;
    border-radius: 6px;
    padding: 0.375rem 0.75rem;
  }
  .error{
    color: #DD0000;

  }

</style>
@endpushonce

<script>
    $('.group_contact').on('click', '.contactAjax', function(e) {
        e.preventDefault();
        let _token = $('meta[name="csrf-token"]').attr('content');
        let name = $("#name").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        let comment = $("#comment").val();
        $.ajax({
            type: "POST",
            url: `{{ route('addContact') }}`,
            data: {
                _token: _token,
                name: name,
                comment: comment,
                email: email,
                phone: phone,
            },
            success: function(res) {
                $('.mess').text(res.success);
                $('.error-name').text('');
                $('.error-comment').text('');
                $('.error-email').text('');
                $('.error-phone').text('');
                $('#name').val('');
                $("#comment").val('');
                $("#email").val('');
                $("#phone").val('');

                $('.mess').removeClass('d-none');
                setTimeout(()=> {
                    $('.mess').addClass('d-none')
                },2000)
            },
            error: function(e) {
                if (e.responseJSON.errors.name) {
                    $('.error-name').text(e.responseJSON.errors.name);
                } else {
                    $('.error-name').text('');
                }
                if (e.responseJSON.errors.email) {
                    $('.error-email').text(e.responseJSON.errors.email);
                } else {
                    $('.error-email').text('');
                }
                if (e.responseJSON.errors.phone) {
                    $('.error-phone').text(e.responseJSON.errors.phone);
                } else {
                    $('.error-phone').text('');
                }
                if (e.responseJSON.errors.comment) {
                    $('.error-comment').text(e.responseJSON.errors.comment);
                } else {
                    $('.error-comment').text('');
                }
            }
        })
    });
</script>