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
        

        <div class="innerPage">
            <div class="recruit_intro">
                <div class="row">
                    <div class="col-sm-4">
                        <p>
                            安心有保障的餐點品質<br>
                            滿滿成就感的工作環境
                        </p>
                        <img src="{{ asset('FrontPage/public/img/recruit-intro-1.png') }}" alt="">
                    </div>
                    <div class="col-sm-4">
                        <p>
                            扎實訓練課程<br>
                            完整升遷制度<br>
                            加薪沒煩惱
                        </p>
                        <img src="{{ asset('FrontPage/public/img/recruit-intro-2.png') }}" alt="">
                    </div>
                    <div class="col-sm-4">
                        <p>
                            完善保障  員工福利<br>
                            獎金制度  合理薪資<br>
                            打造團隊合作舒適環境
                        </p>
                        <img src="{{ asset('FrontPage/public/img/recruit-intro-3.png') }}" alt="">
                    </div>
                </div>
            </div>

            <div class="recruit_slogan">
                <div class="recruit_slogan_item">
                    <div class="recruit_slogan_pic"><img src="{{ asset('FrontPage/public/img/recruit-role-1.svg') }}" alt=""></div>
                    <div class="recruit_slogan_text">
                        <h3>我們不強迫推銷</h3>
                        <p>
                            適才適任 ， 每個人都會有自己的專職<br>
                            在這裡你可能可以找到自己的理想<br>
                            【升遷調薪制度】 【教育訓練】 【娛樂福利】
                        </p>
                    </div>
                </div>
                <div class="recruit_slogan_item">
                    <div class="recruit_slogan_pic"><img src="{{ asset('FrontPage/public/img/recruit-role-2.svg') }}" alt=""></div>
                    <div class="recruit_slogan_text">
                        <h3>夥伴就像是一個大家庭</h3>
                        <p>
                            在這裡 ， 你可以讓自己更好的成長<br>
                            與同事們良好互動與學習<br>
                            超讚的工作環境與各種機會都在等著你
                        </p>
                    </div>
                </div>
            </div>

            <div class="recruit_wube">
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/title-joinWube.svg') }}" alt="總部職缺">
                    <h2>join wube</h2>
                </div>
                <div class="recruit_wube_content">
                    <div class="recruit_wube_pic"><img src="{{ asset('FrontPage/public/img/wube-pic.svg') }}" alt=""></div>
                    <div class="recruit_wube_inform">
                        <div class="recruit_wube_brand"><img src="{{ asset('FrontPage/public/img/wube-vertical.png') }}" alt=""></div>
                        <div class="recruit_wube_text">
                            <h3>集團總部</h3>
                            <p>新北市三重區重新路五段609巷10號6樓之1</p>
                            <a href="https://www.104.com.tw/company/de3tgfk" target="_blank">104線上應徵</a>
                            <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="recruit_joinus">
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/title-joinUs.svg') }}" alt="門市職缺">
                    <h2>join us</h2>
                </div>
                <div class="recruit_select-box">
                    <label for="">選擇區域</label>
                    <div class="recruit_select select-common">
                        <div class="recruit_select_active select-common_active">
                            <span>北部</span>
                            <img src="{{ asset('FrontPage/public/img/select-triangle.svg') }}" alt="">
                        </div>
                        <ul class="recruit_select_list select-common_list">
                            <li class="active">北部</li>
                            <li>中部</li>
                            <li>南部</li>
                            <li>東部</li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    <div class="row recruit_joinus_content">
                        <div class="col-lg-4 col-6">
                            <div class="recruit_joinus_item">
                                <div class="recruit_joinus_pic">
                                    <img src="{{ asset('FrontPage/public/img/shop-1.png') }}" alt="">
                                </div>
                                <div class="recruit_joinus_inform">
                                    <div class="recruit_joinus_name">
                                        <h3>捷運景美店</h3>
                                        <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>地址：台北市文山區景文街21號</li>
                                        <li>電話：02-89313001</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-4"><a class="recruit_joinus_job" href="">主管</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job invalid" href="">正職</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">計時</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="recruit_joinus_item">
                                <div class="recruit_joinus_pic">
                                    <img src="{{ asset('FrontPage/public/img/shop-2.png') }}" alt="">
                                </div>
                                <div class="recruit_joinus_inform">
                                    <div class="recruit_joinus_name">
                                        <h3>內湖金湖店</h3>
                                        <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>地址：台北市內湖區金湖路396號</li>
                                        <li>電話：02-26330005</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-4"><a class="recruit_joinus_job invalid" href="">主管</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">正職</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">計時</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6">
                            <div class="recruit_joinus_item">
                                <div class="recruit_joinus_pic">
                                    <img src="{{ asset('FrontPage/public/img/shop-3.png') }}" alt="">
                                </div>
                                <div class="recruit_joinus_inform">
                                    <div class="recruit_joinus_name">
                                        <h3>台北莊敬店</h3>
                                        <img src="{{ asset('FrontPage/public/img/icon-pin.png') }}" alt="">
                                    </div>
                                    <ul>
                                        <li>地址：台北市信義區莊敬路410號</li>
                                        <li>電話：02-27852585</li>
                                    </ul>
                                </div>
                                <div class="row">
                                    <div class="col-4"><a class="recruit_joinus_job invalid" href="">主管</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">正職</a></div>
                                    <div class="col-4"><a class="recruit_joinus_job" href="">計時</a></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="container">
            {!! $pageContent->bottom_content !!}
        </div>

    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')