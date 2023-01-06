<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
    <style>
        .select-common_active span{
            overflow: initial;
        }
        .join_class_form_item input, .join_class_form_select_active {
            height: 45px;
        }
        .join_class_form_select_active span {
            font-size: 14px;
        }
        .join_class_form_check_input {
            margin: 5px;
        }
        .select-common_list li{
            font-size: 14px;
        }
        .seminar_option{
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        .join_class_form_check{
            display:contents;
        }
    </style>
</head>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="page_banner">
            <img src="{{ asset( 'storage/'.$pageContent->banner_file_path ) }}" alt="">
        </div>

        {!! $pageContent->content !!}

        <div class="form" style="margin-bottom:120px;">
            <div class="container">
                <form  id="seminarForm" class="join_class_form">
                    <div class="join_class_form_title">
                        <h3>創業加盟講座</h3>
                        <div class="join_class_form_intro">這裡無法開放編輯器，等妳文字</div>
                    </div>
                    <div class="join_class_form_content">
                        <div class="d-flex flex-wrap">
                            <div class="join_class_form_left">
                                <div class="join_class_form_item name">
                                    <label for="">姓名</label>
                                    <input name="name" type="text" >
                                </div>
                            </div>
                            <div class="join_class_form_right">
                                <div class="join_class_form_item gender">
                                    <label for="">性別</label>
                                    <div class="join_class_form_check">
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>女性</span>
                                        </div>
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>男性</span>
                                        </div>
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>其他</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="join_class_form_full">
                                <div class="join_class_form_item age_range">
                                    <label for="">年齡</label>
                                    <div class="join_class_form_check">
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>20-29歲</span>
                                        </div>
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>30-39歲</span>
                                        </div>
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>40-49歲</span>
                                        </div>
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>50-59歲</span>
                                        </div>
                                        <div class="join_class_form_check_item">
                                            <div class="join_class_form_check_input"></div>
                                            <span>60歲以上</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="join_class_form_left">
                                <div class="join_class_form_item cellphone">
                                    <label for="">手機號碼</label>
                                    <input name="phone_number" type="number">
                                </div>
                            </div>
                            <div class="join_class_form_right">
                                <div class="join_class_form_item phone">
                                    <label for="">聯絡電話</label>
                                    <input name="contact_number" type="number">
                                </div>
                            </div>
                            <div class="join_class_form_left">
                                <div class="join_class_form_item way">
                                    <label for="">收件方式</label>
                                    <div class="join_class_form_select select-common receive_type">
                                        <div class="join_class_form_select_active select-common_active">
                                            <span>請選擇</span>
                                            <img src="{{ asset('FrontPage/public/img/select-arrow.svg') }}" alt="">
                                        </div>
                                        <ul class="join_class_form_select_list select-common_list">
                                            <li>LINE 請於右方填寫ID</li>
                                            <li>Email 請於右方填寫</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="join_class_form_right">
                                <div class="join_class_form_item le" style="align-items: flex-start;">
                                    <label for="">LINE ID/Email</label>
                                    <input name="receive_detail" type="text" >
                                    <p class="remark">(建議填寫，方便確認報名資訊)</p>
                                </div>
                            </div>
                            <div class="join_class_form_left">
                                <div class="join_class_form_item number">
                                    <label for="">出席人數</label>
                                    <div class="join_class_form_select select-common amount">
                                        <div class="join_class_form_select_active select-common_active">
                                            <span>請選擇</span>
                                            <img src="{{ asset('FrontPage/public/img/select-arrow.svg') }}" alt="">
                                        </div>
                                        <ul class="join_class_form_select_list select-common_list">
                                            <li>1</li>
                                            <li>2</li>
                                        </ul>
                                    </div>
                                    <p class="remark">(最多2位)</p>
                                </div>
                            </div>
                            <div class="join_class_form_right">
                                <div class="join_class_form_item time">
                                    <label for="">方便連絡時間</label>
                                    <div class="join_class_form_select select-common contact_time">
                                        <div class="join_class_form_select_active select-common_active">
                                            <span>請選擇</span>
                                            <img src="{{ asset('FrontPage/public/img/select-arrow.svg') }}" alt="">
                                        </div>
                                        <ul class="join_class_form_select_list select-common_list">
                                            <li>早上</li>
                                            <li>中午</li>
                                            <li>晚上</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="join_class_form_full">
                                <div class="join_class_form_item session seminar">
                                    <label for="">申請場次</label>
                                    <div class="join_class_form_select select-common seminar_id">
                                        <div class="join_class_form_select_active select-common_active">
                                            <span>請選擇</span>
                                            <img src="{{ asset('FrontPage/public/img/select-arrow.svg') }}" alt="">
                                        </div>
                                        <ul class="join_class_form_select_list select-common_list">
                                            <li>目前尚無場次可申請</li>
                                        </ul>
                                    </div>
                                    <div class="remark">
                                        *場次名額有限，申請後將有專人與您確認該場次是否報名成功<br>*報名剩餘名額將於專人確認成功報名後更新
                                    </div>
                                </div>
                            </div>
                            <div class="join_class_form_full">
                                <div class="join_class_form_item other">
                                    <label for="memo">其他意見</label>
                                    <textarea name="memo" id="memo" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <button id="sendSeminarForm">搶先報名</button>
                    </div>
                </form>
            </div>
        </div>
        
        {!! $pageContent->bottom_content !!}

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')
    <script>


        $(function(){
            // 取消form按鈕預設功能
            $("form").on('submit',function(e){
                e.preventDefault();
            });
            var selected_seminar_id = null;
            

            $.ajax({
                url :'api/seminar',
                type:'get',
                dataType:'json',
                data:{
                    
                },
                success: function(seminars) {
                    console.log(seminars);
                    $('.seminar .join_class_form_select_list').empty();
                    if(seminars.length<=0){
                        selected_seminar_id = 'noHaveSeminar';
                    }
                    
  
  

                    seminars.forEach(function(seminar) {
                        var optionStr = '<span class="seminar_option" style="display: block;overflow: hidden;">'+seminar['title']+'</span><span class="seminar_option" style="display: block;overflow: hidden;">'+moment(seminar['started_at']).format('YYYY-MM-DD HH:mm')+'-'+moment(seminar['ended_at']).format('HH:mm')+'</span><span class="seminar_option" style="display: block;overflow: hidden;">'+seminar['address']+'</span><span class="seminar_option" style="display: block;overflow: hidden;">剩餘名額：'+seminar['qop']+'</span>';
                        _dom = $('<li></li>');
                        
                        _dom.html(optionStr);
                        _dom.on('click',function(){
                            selected_seminar_id = seminar['id'];
                            _dom.parents(".select-common").find(".select-common_active").css('height','80px');
                            // _dom.parents(".select-common").find(".select-common_active span").css('marginTop','-55px');
                            _dom.parents(".select-common").find(".select-common_active span").html(optionStr);
                            _dom.parents(".select-common").find(".select-common_list").slideUp(300);
                        });
                        $('.seminar .join_class_form_select_list').append(_dom);
                    });
                }
            });


            $(".join_class_form_check_item").click(function(){
                if($(this).hasClass("active")) {
                    $(this).removeClass("active");
                }else {
                    $(this).addClass("active").siblings(".join_class_form_check_item").removeClass("active");
                }
            })
            var swiper = new Swiper(".join_advantage_slider", {
                slidesPerView: 2,
                spaceBetween: 25,
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                breakpoints: {
                    768: {
                        slidesPerView: 4,
                        spaceBetween: 36,
                    },
                },
            })

            $('#sendSeminarForm').on('click',function(){
                
                var form = $('#seminarForm');

                var data = {
                    name            : form.find('[name=name]').val(),
                    gender	        : form.find('.gender .active').text().trim() || null,
                    age_range	    : form.find('.age_range .active').text().trim() || null,
                    phone_number    : form.find('[name=phone_number]').val(),
                    contact_number  : form.find('[name=contact_number]').val(),
                    receive_type	: form.find('.receive_type .select-common_active span').text() || null,
                    receive_detail  : form.find('[name=receive_detail]').val(),
                    amount	        : form.find('.amount .select-common_active span').text() || null,
                    contact_time	: form.find('.contact_time .select-common_active span').text() || null,
                    seminar_id      : selected_seminar_id,
                    memo            : form.find('[name=memo]').val(),
                };

                for(var i in data){
                    if(data[i]=='請選擇' || data[i]===""){
                        data[i]=null;
                    }
                }

                if(!data['name']){
                    Swal.fire('請輸入姓名');
                    return;
                }
                if(!data['receive_type']){
                    Swal.fire('請選擇收件方式');
                    return;
                }
                if(!data['receive_detail']){
                    Swal.fire('請輸入收件資訊');
                    return;
                }
                if(!data['amount']){
                    Swal.fire('請選擇出席人數');
                    return;
                }
                if(!data['contact_time']){
                    Swal.fire('請選擇方便聯絡時間');
                    return;
                }

                if(!data['phone_number'] && !data['contact_number']){

                    Swal.fire('請輸入手機號碼或聯絡電話');
                    return;
                }

                if(data['seminar_id'] == 'noHaveSeminar'){
                    Swal.fire('目前尚無場次，敬請期待');
                    return;
                }else if(!data['seminar_id']){
                    Swal.fire('請選擇場次');
                    return;
                }

                console.log(data)            

                $.ajax({
                    url :'api/seminar/participant',
                    type:'post',
                    dataType:'json',
                    data:data,
                    success: function(seminars) {
                        console.log(seminars);
                        Swal.fire('已成功報名，將會有專人與您聯繫');
                    }
                });
                
            });

        });


    </script>