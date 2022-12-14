<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
</head>
<body>
    @relativeInclude('include.header')
    <main>
        <div class="banner">
            <div class="swiper-container banner_slider">
                <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <a href="{{ $banner->url }}" target="_blank" class="banner_link"><img src="{{ asset( 'storage/'.$banner->file_path ) }}" alt=""></a>
                    </div>
                @endforeach
                </div>     
                <div class="swiper-button-next slider-arrow"><img src="{{ asset('FrontPage/public/img/slider-arrow-next.svg') }}" alt=""></div>
                <div class="swiper-button-prev slider-arrow"><img src="{{ asset('FrontPage/public/img/slider-arrow-prev.svg') }}" alt=""></div>
            </div>
        </div>

        <div class="home-about">
            <div class="container">
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/title-about.svg') }}" alt="關於麵匡匡">
                    <h2>about MKK ramen</h2>
                </div>
                <p class="text-center">
                    麵匡匡是吾蜂美味集團的特色餐飲品牌， 主打鹹淡適中的跨界台式拉麵。<br>
                    拉麵，由麵、 湯和簡單配料組合而成的美食， 以其操作便利及美味，廣為世人熟知<br>
                    <br>
                    我們在精緻、 平價、 美味的基礎上， 堅持用好湯、 好麵，<br>
                    提供給消費者最有誠意的選擇
                </p>
                <img class="home-about_noodle" src="{{ asset('FrontPage/public/img/noodle.svg') }}" alt="">
            </div>
        </div>

        <div class="recc">
            <img src="{{ asset('FrontPage/public/img/smoke-1.png') }}" alt="" class="smoke smoke-1">
            <img src="{{ asset('FrontPage/public/img/smoke-1.png') }}" alt="" class="smoke smoke-2">
            <img src="{{ asset('FrontPage/public/img/smoke-1.png') }}" alt="" class="smoke smoke-3">
            <img src="{{ asset('FrontPage/public/img/smoke-2.png') }}" alt="" class="smoke smoke-4">
            <img src="{{ asset('FrontPage/public/img/smoke-2.png') }}" alt="" class="smoke smoke-5">
            <img src="{{ asset('FrontPage/public/img/smoke-2.png') }}" alt="" class="smoke smoke-6">
            <div class="title">
                <img src="{{ asset('FrontPage/public/img/title-reccomend.svg') }}" alt="人氣推薦">
                <h2>Top Recommendations</h2>
            </div>
            <div class="recc_inner">
                <div class="recc_slider-box">
                    <div class="recc_slider d-flex justify-content-center">
                        <ul>
                            <li style="--li-no:1;" class="recc_slider_item"><a href=""><img style="--img-no:-1;" src="{{ asset('storage/food/product-1.png') }}" alt=""></a></li>
                            <li style="--li-no:2;" class="recc_slider_item"><a href=""><img style="--img-no:-2;" src="{{ asset('storage/food/product-2.png') }}" alt=""></a></li>
                            <li style="--li-no:3;" class="recc_slider_item active"><a href=""><img style="--img-no:-3;" src="{{ asset('storage/food/product-3.png') }}" alt=""></a></li>
                            <li style="--li-no:4;" class="recc_slider_item"><a href=""><img style="--img-no:-4;" src="{{ asset('storage/food/product-4.png') }}" alt=""></a></li>
                            <li style="--li-no:5;" class="recc_slider_item"><a href=""><img style="--img-no:-5;" src="{{ asset('storage/food/product-5.png') }}" alt=""></a></li>
                            <li style="--li-no:6;" class="recc_slider_item"><a href=""><img style="--img-no:-6;" src="{{ asset('storage/food/product-6.png') }}" alt=""></a></li>
                            <li style="--li-no:7;" class="recc_slider_item"><a href=""><img style="--img-no:-7;" src="{{ asset('storage/food/product-1.png') }}" alt=""></a></li>
                            <li style="--li-no:8;" class="recc_slider_item"><a href=""><img style="--img-no:-8;" src="{{ asset('storage/food/product-2.png') }}" alt=""></a></li>
                            <li style="--li-no:9;" class="recc_slider_item"><a href=""><img style="--img-no:-9;" src="{{ asset('storage/food/product-3.png') }}" alt=""></a></li>
                            <li style="--li-no:10;" class="recc_slider_item"><a href=""><img style="--img-no:-10;" src="{{ asset('storage/food/product-4.png') }}" alt=""></a></li>
                            <li style="--li-no:11;" class="recc_slider_item"><a href=""><img style="--img-no:-11;" src="{{ asset('storage/food/product-5.png') }}" alt=""></a></li>
                            <li style="--li-no:12;" class="recc_slider_item"><a href=""><img style="--img-no:-12;" src="{{ asset('storage/food/product-6.png') }}" alt=""></a></li>
                        </ul>
                    </div>
                    <ul class="recc_intro">
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵2</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item active">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵3</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵4</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵5</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵6</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵1</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵2</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵3</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵4</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵5</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                        <li class="recc_intro_item">
                            <div class="recc_intro_title">
                                <h3>招牌豚骨拉麵6</h3>
                            </div>
                            <p>
                                豬大骨湯底，透著淡淡的牡蠣白，營養不油膩；<br>
                                搭配武火炙燒的叉燒肉，<br>
                                香氣撲鼻，美味無雙，初訪必點。
                            </p>
                        </li>
                    </ul>
                    <img class="flavor" src="{{ asset('FrontPage/public/img/flavor.png') }}" alt="">
                </div>
                <div class="slider-arrow-next slider-arrow"><img src="{{ asset('FrontPage/public/img/slider-arrow-next.svg') }}" alt=""></div>
                <div class="slider-arrow-prev slider-arrow"><img src="{{ asset('FrontPage/public/img/slider-arrow-prev.svg') }}" alt=""></div>
            </div>
        </div>

        <div class="news">
            <div class="container">
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/title-news.svg') }}" alt="最新消息">
                    <h2>Latest News</h2>
                </div>
                <div class="swiper-container news_slider">
                    <div class="swiper-wrapper">
                        
                    @foreach ($news as $_news)
                        <div class="swiper-slide">
                            <a href="/news/?news_id={{ $_news->id }}" class="news_item">
                                <div class="news_item_pic">
                                    <img src="{{ asset( 'storage/'.$_news->file_path ) }}" alt="">
                                    <div class="news_item_title"><h3>{{ $_news->title }}</h3></div>
                                </div>
                                <p class="date">{{ $_news->date_ymd }}</p>
                            </a>
                        </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <a href="#" class="more">全部展開</a>
            </div>
        </div>
    </main>
    @relativeInclude('include.footer')
    @relativeInclude('include.script')
    <script>
        let indexUnit = 0;
        $(".slider-arrow").click(function(){
            let num = $(".recc_slider_item").length;
            let rotate = 360 / 12;
            let index;
            let activeIndex;
            if($(this).hasClass("slider-arrow-next")){
                $(".recc_slider_item").each(function(){
                    index = indexUnit + $(this).index() + 1;
                    let deg = 360 / 12 * index - rotate;
                    $(this).css("transform","rotateZ(" + deg + "deg)");
                    $(this).find("img").css("transform","rotateZ(" + (deg * (-1)) + "deg)");
                    if($(this).hasClass("active")) {
                        activeIndex = $(this).index() + 1;
                        if( activeIndex >= num) {
                            activeIndex = 0;
                        }else {
                            activeIndex = activeIndex;
                        }
                    }
                })
                indexUnit = indexUnit - 1;
                $(".recc_slider_item").eq(activeIndex).addClass("active").siblings(".recc_slider_item").removeClass("active");
                $(".recc_intro_item").eq(activeIndex).addClass("active").siblings(".recc_intro_item").removeClass("active");
            }
            if($(this).hasClass("slider-arrow-prev")){
                $(".recc_slider_item").each(function(){
                    index = indexUnit + $(this).index() + 1;
                    let deg = 360 / 12 * index + rotate;
                    $(this).css("transform","rotateZ(" + deg + "deg)");
                    $(this).find("img").css("transform","rotateZ(" + (deg * (-1)) + "deg)");
                    if($(this).hasClass("active")) {
                        activeIndex = $(this).index() + 1;
                        if( activeIndex <= 1) {
                            activeIndex = num;
                        }else {
                            activeIndex = activeIndex - 1;
                        }
                    }
                })
                indexUnit = indexUnit + 1;
                $(".recc_slider_item").eq(activeIndex-1).addClass("active").siblings(".recc_slider_item").removeClass("active");
                $(".recc_intro_item").eq(activeIndex-1).addClass("active").siblings(".recc_intro_item").removeClass("active");
            }
        });
        var swiperBanner = new Swiper(".banner_slider", {
            slidesPerView: 1,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            loop: true,
            speed: 800,
        });
        var swiperNews = new Swiper(".news_slider", {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            speed: 800,     
            slidesPerGroup: 2,   
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                    slidesPerGroup: 2,
                },
                1200: {
                    slidesPerView: 3,
                    slidesPerGroup: 3,  
                    spaceBetween: 60,
                }
            }
        });
    </script>
