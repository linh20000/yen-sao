@extends('frontend.components.index')

@section('content')
    @include('frontend.components.breadcrumb', ['name' => 'Tài khoản'])

    <div class="container">
        <h1 class="title-head"><span>Tài khoản</span></h1>
        <div class="" style="display: flex; justify-content: center;">
            <div class="" style="width: 50%;">
                <div class="page-login margin-bottom-30">
                    <div id="login">
                        <span>
                            Nếu bạn đã có tài khoản, đăng nhập tại đây.
                        </span>
                        <form accept-charset="UTF-8" action="" id="customer_login" method="post">
                            @csrf
                            <input name="form_type" type="hidden" value="customer_login">
                            <input name="utf8" type="hidden" value="✓">
                            <div class="form-signup">
                            </div>
                            <div class="form-signup clearfix">
                                <fieldset class="form-group">
                                    <label for="email">Email: </label>
                                    <input type="email" id="email_login" class="form__field form__field--text"
                                    name="email" placeholder="Email">
                                </fieldset>
                                <fieldset class="form-group">
                                    <label for="password">Mật khẩu: </label>
                                    <input type="password" id="password_login" class="form__field form__field--text"
                                    name="password" placeholder="Mật khẩu"
                                    >
                                </fieldset>

                                @if(session()->has('message'))
                                    <p class="text-red-400 text-[12px]" style="color: red;">{{session()->get('message')}}</p>
                                @endif

                                <div class="pull-xs-left" style="margin-top: 25px;">
                                    <button class="btn btn-primary w-100" >Đăng nhập</button>

                                    <a href="{{route('userRegister')}}" class="btn-link-style btn-register"
                                        style="margin-left: 20px;text-decoration: underline; ">Đăng ký</a>
                                </div>
                            </div>

                            <input id="81376a33f2594b28901a79021673b6a1" name="g-recaptcha-response" type="hidden"
                                value="03AFY_a8XB4lNoXmw6ViBTa9kszeN-8HmAA60QADhm7zsIH_2O8FYidBjmDbfFkms_zULkpuDxNffkfl39Oh3pfahVoigx4vZkztLN1vx-rXSO75iUlTH0xRGPbsRtJtp_2Cj_jl4__bM1AXr3Kxpw4gGnBM2hfGISxWx3XOx5nGfK4f-sh1eQ2AJRuaBpO2E_uyuP2w4tuQEmXVV30p-GUL8dsFN8vOAQv1u4VrbenSPLmfEyz019ieGhml5sQGpl6HwBTkmcFdkE6Dab2k87BAVTYldRF96WTTiRyvDklpLyes2zPkPR3eFSf0vslPAGe5jbyHs6gQnjqQLTsVo7AJZ3YYaLDKwa6JB9MJS2k_aGgjj9AiO5OzGTv5uveglGtMDob2u4VleJ3rtZ1SQD5ofpRO3wdOtJpATaQjm_pN6lJZMgyw2fc-FRvE79oGqHQHSbIJcEaGwTH1R_cAQPUflGEVMKgO_4x7fEM-Hqj1gnyXemJvq3hUqyxK2L2Qmg9ZC6i9Z5FbhuQxNHaS429W5SdMSSnO_Rgw">
                            <script src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></script>
                            <script>
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                        action: 'submit'
                                    }).then(function(token) {
                                        document.getElementById('81376a33f2594b28901a79021673b6a1').value = token;
                                    });
                                });
                            </script>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div id="recover-password" class="form-signup">
                    <span>
                        Bạn quên mật khẩu? Nhập địa chỉ email để lấy lại mật khẩu qua email.
                    </span>
                    <form accept-charset="UTF-8" action="/account/recover" method="post">
                        <input name="form_type" type="hidden" value="recover_customer_password">
                        <input name="utf8" type="hidden" value="✓">

                        <div class="form-signup aaaaaaaa">

                        </div>




                        <div class="form-signup clearfix">
                            <fieldset class="form-group">
                                <label>Email: </label>
                                <input type="email" class="form-control form-control-lg" value="" name="Email"
                                    id="recover-email" placeholder="Email">
                            </fieldset>
                        </div>
                        <div class="action_bottom">
                            <input class="btn btn-primary" style="margin-top: 25px;" type="submit"
                                value="Lấy lại mật khẩu">

                        </div>

                        <input id="2c491b8202e64350889af7a800b4e382" name="g-recaptcha-response" type="hidden"
                            value="03AFY_a8W0jemCdy2g6zwJCyoTtHX9YLWJltTHMFtNNsIrm8hyvFGevZT9z7_sEEsczVrhayCzxRHNTmyo5GR-hHWGjrX_WF93DwSbAibPu9Gd-jFcFTl9HNkaO7YmHMEdqriNJFmnB6u5VadYlDh0Ht32BMv5LjZ8bvNkOjiTRnfJOFqtVJMMozdNJtChuVWOsDFDcZ5hwd2JybHedt_E7K7BhQggZ02v1vbFBzn2CUVJ_qFzVMyxfGDfby6coeMYIQfKeBTO_mBxwGvtGwVsRSjSYDiT0BhfwLdD1XFZQYHcXuaWgrX7KxEyZmC2wlEapnF44q6VqgvLPzJ50DR0ZyVOqrakbBldcpAlNkN87g9WWfNwvzQK-TAU3RHNwi4VGiXNYGxy0GpRY8Mw4v6Mq5ycCXATm6pckyY6C8YeDG5BmiJwZMFwx-LI1Ii7aVUbUaYkVi62Uuz2vUUS9RJz59NNHI75RBHNajjFC5MLC5GadYfqrjUk4NOJMzCiXhYNHJ_m6R1deVfXBG4278-4k8sNF2VlyC9NUA">
                        <script src="https://www.google.com/recaptcha/api.js?render=6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-"></script>
                        <script>
                            grecaptcha.ready(function() {
                                grecaptcha.execute('6LdD18MUAAAAAHqKl3Avv8W-tREL6LangePxQLM-', {
                                    action: 'submit'
                                }).then(function(token) {
                                    document.getElementById('2c491b8202e64350889af7a800b4e382').value = token;
                                });
                            });
                        </script>
                    </form>
                </div>
            </div> --}}
        </div>
    </div>
@endsection
