@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Tạo tài khoản'])

    <div class="container">
        <h1 class="title-head"><a >Tạo tài khoản</a></h1>
        <div class="row">
            <div class="col-lg-12 ">
                <div class="page-login">
                    <div id="login">
                        <span>Nếu chưa có tài khoản vui lòng đăng ký tại đây</span>

                        <form accept-charset="UTF-8" action="" id="create_customer" method="post">
                        @csrf
                            <div class="form-signup clearfix">
                                <div class="" style="display: flex; justify-content: center;">
                                    <div class=""  style="width: 50%;">
                                        <div class="form-group">
                                            <label>Họ Tên: </label>
                                            <input type="text" class="form-control form-control-lg" value="{{old('name')}}"
                                                name="name" id="name" placeholder="Nhập tên" >
                                            <p class="error error_name" style="color:red;font-size:15px;"></p>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label>Email: </label>
                                            <input type="email" class="form-control form-control-lg" value="{{old('email')}}"
                                                name="email" id="email" placeholder="Nhập email" >
                                            <p class="error error_email" style="color:red;font-size:15px;"></p> 
                                        </div>

                                        <div class="form-group">
                                            <label>Mật khẩu: </label>
                                            <input type="password" class="form-control form-control-lg" value=""
                                                name="password" id="password" placeholder="Nhập mật khẩu" >
                                            <p class="error error_password" style="color:red;font-size:15px;"></p>
                                        </div>
                                        <div class="col-xs-12 text-xs-left margin-bottom-30" style="margin-top:6px; padding: 0">
                                            <div class="btn btn-primary register">Đăng ký</div>
                                            {{-- <div class="clearfix custommer_account_action">
                                                <div class="action_bottom button dark">
                                                    <div class="btn register">Đăng kí</div>
                                                </div>
                                            </div> --}}
                                            <a href="{{route('user.showlogin')}}" class="btn-link-style btn-register"
                                                style="margin-left: 20px;text-decoration: underline; ">Đăng nhập</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <input id="07da38a8a9914f898ad6601502a35bd1" name="g-recaptcha-response" type="hidden"
                                value="03AFY_a8Vz7EG-s6I4fxh2GgFoiwj_2wKm9cwFTTQdFBoCXik9V6Wo1DgeUQxvMgQDy0fPY4ARenDEBZS1X7lFaEDGV43xf-T64_caw6ajUlIBDkYfbUSP6DW6loXyRrpCreW0FBiHipyQhdKtN75GN7esyh0dUUqwq3sQYhbg8Xc9R7IiwPHmatQLjREKXJVAk_Tq8z1tnRm23GtiXNyW1g1nD5vnIcm8Nq21LM6kh7XMPAnL-e-FofvjRobipTL1oh-cqm6EEYpQmGfmQC9RNw_7bSpZgM0vIJD2gtREbzi51PE1wyTMOPTsgsYReW9W5WLvwxeQViW27nhCGcGPAL2AsFuNuXVxswCfd8b2m8Y-T5AY6FPh20OphwTgtmnIzJ62rkGB2e7nzhBeuztvQAyaTW0RIHrg11NNRnXCgXxCMI9TQJv2oMdFcS1CrX_VV7eZZbmij1eBXe4BVPJM_ryRz5JfeJfV3agVsoGtFTBKVmTOoOCjw83Ev64-iVt9szEIXGKiOXB4dV9BvLoBlopvaGP9ATf5-w"> --}}
                            <script src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></script>
                            {{-- <script>
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                        action: 'submit'
                                    }).then(function(token) {
                                        document.getElementById('07da38a8a9914f898ad6601502a35bd1').value = token;
                                    });
                                });
                            </script> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('.register').click((e)=> {
           e.preventDefault()
           let name = $('input[name=name]').val();
           let email = $('input[name=email]').val();
           let password = $('input[name=password]').val();
           $.ajax({
               type: 'POST',
               url: `{{route('register')}}`,
               data: {
                   _token: $('meta[name="csrf-token"]').attr('content'),
                   name: name,
                   email: email,
                   password: password,
               },
               success: function(response) {
                   iziToast.success({
                       timeout: 5000,
                       title: 'Thành công',
                       message: 'Tạo tài khoản thành công',
                       position: 'topRight',
                       backgroundColor:'#fff',
                       messageColor:'#32CD32',
                       titleColor:'#32CD32',
                   });
                   $('input[name=name]').val('');
                   $('input[name=email]').val('');
                   $('input[name=password]').val('');
                   $('.error').text('')
                //    window.localhref.reload();
                //    window.history.pushState({}, '','/');
                //    $.ajax({
                //        url: '/dang-ki',
                //        type: 'GET',
                //        success: function(data) {
                //         //    $('body').html(data);
                //            iziToast.success({
                //                 timeout: 5000,
                //                 title: 'Thành công',
                //                 message: 'Tạo tài khoản thành công',
                //                 position: 'topRight',
                //                 backgroundColor:'#fff',
                //                 messageColor:'#32CD32',
                //                 titleColor:'#32CD32',
                //            });
                //        },
                //    });
               },
               error:function(err) {
                   iziToast.error({
                       title: 'Thất bại',
                       message: 'Kiểm tra lại thông tin tài khoản',
                       position: 'topRight',
                   });
                   err.responseJSON.errors.name ?  $('.error_name').text(err.responseJSON.errors.name) : $('.error_name').text('')
                   err.responseJSON.errors.email ?  $('.error_email').text(err.responseJSON.errors.email) : $('.error_email').text('')
                   err.responseJSON.errors.password ?  $('.error_password').text(err.responseJSON.errors.password) : $('.error_password').text('')
               }
           })
       })
   </script>

@endsection
