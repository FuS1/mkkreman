<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
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
            <form class="join_class_form">
                    <div class="join_class_form_title">
                        <h3>創業加盟講座</h3>
                        <div class="join_class_form_intro">介紹文字</div>
                    </div>
                    <div class="join_class_form_content">
                        <div class="d-flex flex-wrap">
                            <div class="join_class_form_left">
                                <div class="join_class_form_item name">
                                    <label for="">姓名</label>
                                    <input type="text">
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
                                <div class="join_class_form_item age">
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
                                    <input type="number">
                                </div>
                            </div>
                            <div class="join_class_form_right">
                                <div class="join_class_form_item phone">
                                    <label for="">聯絡電話</label>
                                    <input type="number">
                                </div>
                            </div>
                            <div class="join_class_form_left">
                                <div class="join_class_form_item way">
                                    <label for="">收件方式</label>
                                    <div class="join_class_form_select select-common">
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
                                <div class="join_class_form_item le">
                                    <label for="">LINE ID/Email</label>
                                    <input type="text">
                                    <p class="remark">(建議填寫，方便確認報名資訊)</p>
                                </div>
                            </div>
                            <div class="join_class_form_left">
                                <div class="join_class_form_item number">
                                    <label for="">出席人數</label>
                                    <div class="join_class_form_select select-common">
                                        <div class="join_class_form_select_active  select-common_active">
                                            <span>請選擇</span>
                                            <img src="{{ asset('FrontPage/public/img/select-arrow.svg') }}" alt="">
                                        </div>
                                        <ul class="join_class_form_select_list select-common_list">
                                            <li>1 位</li>
                                            <li>2 位</li>
                                        </ul>
                                    </div>
                                    <p class="remark">(最多2位)</p>
                                </div>
                            </div>
                            <div class="join_class_form_right">
                                <div class="join_class_form_item time">
                                    <label for="">方便連絡時間</label>
                                    <div class="join_class_form_select select-common">
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
                                <div class="join_class_form_item session">
                                    <label for="">申請場次</label>
                                    <div class="join_class_form_select select-common">
                                        <div class="join_class_form_select_active select-common_active">
                                            <span>下拉選擇場次</span>
                                            <img src="{{ asset('FrontPage/public/img/select-arrow.svg') }}" alt="">
                                        </div>
                                        <ul class="join_class_form_select_list select-common_list">
                                            <li>第一場</li>
                                            <li>第二場</li>
                                            <li>第三場</li>
                                        </ul>
                                    </div>
                                    <div class="remark">
                                        *場次名額有限，申請後將有專人與您確認該場次是否報名成功<br>*報名剩餘名額將於專人確認成功報名後更新
                                    </div>
                                </div>
                            </div>
                            <div class="join_class_form_full">
                                <div class="join_class_form_item other">
                                    <label for="">其他意見</label>
                                    <textarea name="" id="" cols="30" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <button>搶先報名</button>
                    </div>
                </form>
            </div>
        </div>
        
        {!! $pageContent->bottom_content !!}

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')
    <script>
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
    </script>