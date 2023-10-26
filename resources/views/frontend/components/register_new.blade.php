<div class="site-footer">
    <div class="new-letter">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="letter-left heading">
                        <h3>Đăng kí nhận tin khuyến mãi</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <form class="contact-form">
                        <div class="input-group">
                                <input class="form-control input-group-field" aria-label="Địa chỉ Email"
                                type="email" placeholder="Nhập địa chỉ email" id="email" name="email"/>
                            <div class="input-group-btn">
                                <button class="btn button_gradient emailAjax"
                                    >Đăng ký</button>
                            </div>
                        </div>
                        
                    </form>
                    <span class="error_email mt-1 d-block" style="padding: 0 0 0 0.9rem; color: red;"></span>

                </div>
            </div>
            <div class="message pb-2 pt-2 ps-2 alert h5 d-none" style="margin: auto; width: 50%;; font-weight: 700; color: #21b300; background-color: #abffa0;"> </div>
        </div>
    </div>
</div>


<style>
    .d-none{
        display: none;
    }
</style>

<script>
    $('.input-group').on('click','.emailAjax', function(e){
      e.preventDefault();
      let _token = $('meta[name="csrf-token"]').attr('content');
      let email = $("#email").val();
    //   console.log(email);
      $.ajax({
        type:"POST",
        url:`{{route('sendEmail')}}`,
        data:{
          _token : _token,
          email : email,
        },
        success: function (res) {
          $('.message').text(res.success);
          $('.error_email').text('');
          $('#email').val('');
  
          $('.message').removeClass('d-none');
          setTimeout(()=> {
              $('.message').addClass('d-none')
          },2500)
        },
        error:function(e){
          if(e.responseJSON.errors.email){
            $('.error_email').text(e.responseJSON.errors.email);
          } else {
            $('.error_email').text('');
          }   
        }
      })
    });
  
</script>