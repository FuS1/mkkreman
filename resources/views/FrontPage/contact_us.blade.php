<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
</head>
<style>
    .join_class_form_check_input{
        margin-left: 20px;
    }
    .join_class_form_item input{
        height: 33px;
    }
    @media screen and (max-width: 767px) {
        .join_class_form_check{
            display: block;
        }
    }
    .lds-ring {
  display: inline-block;
  position: relative;
  width: 56px;
  height: 56px;
}
.lds-ring div {
  box-sizing: border-box;
  display: block;
  position: absolute;
  width: 35px;
  height: 35px;
  margin: 10px;
  border: 8px solid #fff;
  border-radius: 50%;
  animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
  border-color: #fff transparent transparent transparent;
}
.lds-ring div:nth-child(1) {
  animation-delay: -0.45s;
}
.lds-ring div:nth-child(2) {
  animation-delay: -0.3s;
}
.lds-ring div:nth-child(3) {
  animation-delay: -0.15s;
}
@keyframes lds-ring {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

</style>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="page_banner">
            <img src="{{ asset( 'storage/'.$pageContent->banner_file_path ) }}" alt="">
        </div>
        
        <div class="container">
            {!! $pageContent->content !!}
        </div>
        
        <div class="container">
            <div class="title" style="z-index: 11;position: relative;">
                <img src="{{ asset('FrontPage/public/img/contact_us_title.png') }}" alt="人氣推薦">
                <h2>Contact us</h2>
            </div>
            <div class="text-center w-50 mx-auto mb-5" >
                <iframe src="https://www.google.com/maps/embed/v1/place?q=新北市三重區重新路五段609巷10號6樓之1&amp;key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" style="border: 0; width: 100%; height: 340px;"></iframe>
            </div>
            <div class="text-center mb-5">
                <p>總部服務專線 / 加盟專線：(02)2999-0133</p>
                <p>總部服務時間：週一至週五 10:00AM~19:00PM</p>
                <p>客服信箱：請填寫下方表格，我們將會盡快與您聯繫</p>
            </div>
            <div class="form mb-5" style="background:#eaeff3;border-radius:20px;">
                <div class="container">
                    <form>
                        <div class="join_class_form_content" style="border: none;">
                            <div class="d-flex flex-wrap">
                                <div class="join_class_form_full">
                                    <div class="join_class_form_item age_range">
                                        <label for="">意見類型</label>
                                        <div class="join_class_form_check">
                                            <div class="join_class_form_check_item">
                                                <div class="join_class_form_check_input"></div>
                                                <span type="franchise">加盟諮詢</span>
                                            </div>
                                            <div class="join_class_form_check_item">
                                                <div class="join_class_form_check_input"></div>
                                                <span type="opinion">意見反映</span>
                                            </div>
                                            <div class="join_class_form_check_item">
                                                <div class="join_class_form_check_input"></div>
                                                <span type="cooperation">其他(廠商合作/詢問)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="join_class_form_left">
                                    <div class="join_class_form_item cellphone">
                                        <label for="">姓名：</label>
                                        <input name="name" type="input">
                                    </div>
                                </div>
                                <div class="join_class_form_right">
                                    <div class="join_class_form_item phone">
                                        <label for="">聯絡電話：</label>
                                        <input name="phone" type="phone">
                                    </div>
                                </div>
                                <div class="join_class_form_full">
                                    <div class="join_class_form_item email">
                                            <label for="" style="width: 83px;">Email：</label>
                                            <input name="email" type="email" style="width: calc(100% - 83px);">
                                        </div>
                                    </div>
                                <div class="join_class_form_full">
                                    <div class="join_class_form_item other" style="margin-top:0;">
                                        <label for="content">內容</label>
                                        <textarea name="content" id="content" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button id="sendFormBtn" style="background-color:#132c53;">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container">
            {!! $pageContent->bottom_content !!}
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')
    <script>
        // 取消form按鈕預設功能
        $("form").on('submit',function(e){
            e.preventDefault();
        });
        $(".join_class_form_check_item").click(function(){
            if($(this).hasClass("active")) {
                $(this).removeClass("active");
            }else {
                $(this).addClass("active").siblings(".join_class_form_check_item").removeClass("active");
            }
        })

        
        $('#sendFormBtn').on('click',function(){
            
            var form = $('form');

            var data = {
                type            : form.find('.age_range .active > span').attr('type'),
                name            : form.find('[name=name]').val(),
                phone           : form.find('[name=phone]').val(),
                email           : form.find('[name=email]').val(),
                content         : form.find('[name=content]').val().replace(/\r?\n/g, '<br />'),
            };

            for(var i in data){
                if(data[i]=='請選擇' || data[i]===""){
                    data[i]=null;
                }
            }


            if(!data['type']){
                Swal.fire('請選擇意見類型');
                return;
            }
            if(!data['name']){
                Swal.fire('請輸入姓名');
                return;
            }
            if(!data['phone']){
                Swal.fire('請輸入連絡電話');
                return;
            }
            if(!data['email']){
                Swal.fire('請輸入Email');
                return;
            }
            if(!data['content']){
                Swal.fire('請填寫內容');
                return;
            }

            console.log(data)   

            $(this).html('<div class="lds-ring"><div></div><div></div><div></div><div></div></div>')

            $.ajax({
                url :'api/contactUs/mail',
                type:'post',
                dataType:'json',
                data:data,
                success: function(res) {
                    console.log(res);
                    Swal.fire({
                        title: '已收到您的意見，我們將盡快回覆您',
                        icon: 'success',
                    }).then(function(result) {
                        location.reload();
                    })
                }
            });
    
        });
    </script>