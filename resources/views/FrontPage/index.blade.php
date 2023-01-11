<!DOCTYPE html>
<html lang="zh">
<head>
    @relativeInclude('include.meta')
    @relativeInclude('include.script')
    <style>
   
    .food-swiper .swiper-slide  > img {
        width:100%;
    }

    @media screen and (min-width: 768px) {
    
        .food-swiper .swiper-slide > img {
            transform: scale(0.6);
            margin-top: 3rem;
        }
        .food-swiper .swiper-slide-next > img{
            transform: scale(1);
            margin-top: 0rem;
        }
    }
.smoke{
    opacity:0;
}
.smoke-1 {
    bottom: 0vw;
    right: -12.86vw;
    width: 40vw;
    animation: smoke-1 8s linear infinite;
    animation-delay: 0s;
}

.smoke-1-2 {
    bottom: -17vw;
    right: -11.14vw;
    width: 66vw;
    animation: smoke-1 8s linear infinite;
    animation-delay: 0.5s;
}

.smoke-1-2-2 {
    bottom: -17vw;
    right: -11.14vw;
    width: 66vw;
    animation: smoke-1 8s linear infinite;
    animation-delay: 3.5s;
}

.smoke-1-3 {
    z-index: 10;
    bottom: -2.64vw;
    right: 30.86vw;
    width: 67vw;
    animation: smoke-1 8s linear infinite;
    animation-delay: 4s;
}

.smoke-2 {
  animation: smoke-2 8s linear infinite;
  animation-delay: 1.5s;
}

.smoke-3 {
  z-index: 10;
  top: -8.6vw;
  left: 20.6vw;
  width: 45vw;
  animation: smoke-3 5s linear infinite;
  animation-delay: 0s;
}
.smoke-3-2 {
  z-index: 10;
  top: -6.6vw;
  left: 22.6vw;
  width: 45vw;
  animation: smoke-3 5s linear infinite;
  animation-delay: 2.5s;
}

.smoke-3-3 {
  z-index: 10;
  top: -11.6vw;
  left: 24.6vw;
  width: 45vw;
  animation: smoke-3 5s linear infinite;
  animation-delay: 4s;
}

.smoke-4 {
  animation: smoke-1 8s linear infinite;
  animation-delay: 1.5s;
}
.smoke-5 {
    top: -9vw;
    left: -4vw;
    width: 38vw;
  animation: smoke-2 8s linear infinite;
  animation-delay: 1.5s;
}
.smoke-5-2 {
    top: -9vw;
    left: -4vw;
    width: 40vw;
  animation: smoke-2 8s linear infinite;
  animation-delay: 3.5s;
}
.smoke-5-3 {
    top: -9vw;
    left: -4vw;
    width: 43vw;
  animation: smoke-2 8s linear infinite;
  animation-delay: 5.5s;
}
.smoke-6 {
  animation: smoke-3 8s linear infinite;
  animation-delay: 1.5s;
}
.smoke-7 {
    top: -12vw;
    left: 54vw;
    width: 52vw;
  animation: smoke-7 8s linear infinite;
  animation-delay: 2.5s;
}

.smoke-7-2 {
    top: -12vw;
    left: 54vw;
    width: 52vw;
  animation: smoke-7 8s linear infinite;
  animation-delay: 2.5s;
}
.smoke-7-3 {
    top: -12vw;
    left: 54vw;
    width: 52vw;
  animation: smoke-7 8s linear infinite;
  animation-delay: 6.5s;
}

@keyframes smoke-1 {
  0% {
    filter: blur(0px);
    transform: translateY(0px) scale(-1, 1);
    opacity: 0;
  }

  25% {
    filter: blur(3px);
    transform: translateY(-10px) scale(-1, 1.15);
    opacity: 0.75;
  }

  50% {
    filter: blur(5px);
    transform: translateY(-40px) scale(-1, 1.3);
    opacity: 1;
  }

  75% {
    filter: blur(5px);
    transform: translateY(-80px) scale(-1, 1.2);
    opacity: 0.75;
  }

  100% {
    filter: blur(7px);
    transform: translateY(-100px) scale(-1, 1.3);
    opacity: 0;
  }
}

@keyframes smoke-2 {
  0% {
    filter: blur(0px);
    transform: translateY(0px) scale(1);
    opacity: 0;
  }

  25% {
    filter: blur(3px);
    transform: translateY(-10px) scale(1.05);
    opacity: 0.6;
  }

  50% {
    filter: blur(5px);
    transform: translateY(-20px) scale(1.1);
    opacity: 1;
  }

  75% {
    filter: blur(5px);
    transform: translateY(-30px) scale(1.15);
    opacity: 0.6;
  }

  100% {
    filter: blur(7px);
    transform: translateY(-40px) scale(1.2);
    opacity: 0;
  }
}

@keyframes smoke-3 {
  0% {
    filter: blur(0px);
    transform: translateY(0px) scale(1);
    opacity: 0;
  }

  25% {
    filter: blur(3px);
    transform: translateY(-20px) scale(1.05);
    opacity: 0.6;
  }

  50% {
    filter: blur(5px);
    transform: translateY(-40px) scale(1.1);
    opacity: 1;
  }

  75% {
    filter: blur(5px);
    transform: translateY(-60px) scale(1.15);
    opacity: 0.6;
  }

  100% {
    filter: blur(7px);
    transform: translateY(-80px) scale(1.2);
    opacity: 0;
  }
}
@keyframes smoke-5 {
  0% {
    filter: blur(0px);
    transform: translateY(0px) scale(-1, 1);
    opacity: 0;
  }

  25% {
    filter: blur(3px);
    transform: translateY(-10px) scale(-1, 1.15);
    opacity: 0.6;
  }

  50% {
    filter: blur(5px);
    transform: translateY(-40px) scale(-1, 1.3);
    opacity: 1;
  }

  75% {
    filter: blur(5px);
    transform: translateY(-60px) scale(-1, 1.3);
    opacity: 0.6;
  }

  100% {
    filter: blur(7px);
    transform: translateY(-70px) scale(-1, 1.2);
    opacity: 0;
  }
}
@keyframes smoke-7 {
  0% {
    filter: blur(0px);
    transform: translateY(0px) scale(1);
    opacity: 0;
  }

  25% {
    filter: blur(3px);
    transform: translateY(-20px) scale(1.05);
    opacity: 0.6;
  }

  50% {
    filter: blur(5px);
    transform: translateY(-40px) scale(1.1);
    opacity: 1;
  }

  75% {
    filter: blur(5px);
    transform: translateY(-60px) scale(1.15);
    opacity: 0.6;
  }

  100% {
    filter: blur(7px);
    transform: translateY(-80px) scale(1.2);
    opacity: 0;
  }
}

</style>
</head>
<body>
    @relativeInclude('include.header')
    
    <main>
        <div class="banner">
            <div class="swiper-container banner_slider">
                <div class="swiper-wrapper">
                @foreach ($banners as $banner)
                    <div class="swiper-slide">
                        <a href="{{ $banner->url }}" target="_blank" class="banner_link">
                          <img class="desktop" src="{{ asset( 'storage/'.$banner->file_path ) }}" alt="">
                          <img class="mobile"  src="{{ asset( 'storage/'.$banner->mobile_file_path ) }}" alt="">
                        </a>
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

        <div class="recc" style="background-color: #cecece;padding: 20px 0;">
            <img src="{{ asset('FrontPage/public/img/smoke-6.png') }}" alt="" class="smoke smoke-1">
            <img src="{{ asset('FrontPage/public/img/smoke-3.png') }}" alt="" class="smoke smoke-1-2">
            <img src="{{ asset('FrontPage/public/img/smoke-2.png') }}" alt="" class="smoke smoke-1-2-2">
            <img src="{{ asset('FrontPage/public/img/smoke-6.png') }}" alt="" class="smoke smoke-1-3">
            <img src="{{ asset('FrontPage/public/img/smoke-3.png') }}" alt="" class="smoke smoke-1-3">
            <img src="{{ asset('FrontPage/public/img/smoke-5.png') }}" alt="" class="smoke smoke-5">
            <img src="{{ asset('FrontPage/public/img/smoke-5.png') }}" alt="" class="smoke smoke-5-2">
            <img src="{{ asset('FrontPage/public/img/smoke-5.png') }}" alt="" class="smoke smoke-5-3">
            <img src="{{ asset('FrontPage/public/img/smoke-6.png') }}" alt="" class="smoke smoke-6">
            <img src="{{ asset('FrontPage/public/img/smoke-2.png') }}" alt="" class="smoke smoke-2">
            <div class="title" style="z-index: 11;position: relative;">
                <img src="{{ asset('FrontPage/public/img/title-reccomend.svg') }}" alt="人氣推薦">
                <h2>Top Recommendations</h2>
            </div>
            <div class="swiper-container menu-swiper" id="food-swiper">
                <div class="swiper-wrapper">
                @foreach ($hotfoods as $key => $food)
                    <div class="swiper-slide">
                        <div class="menu-swiper_pic"><img src="{{ asset( 'storage/'.$food->file_path ) }}" alt=""></div>
                        <div class="menu-swiper_text">
                            <div class="recc_intro_title">
                                <h3 style="font-size: 22px;color: #122C52; margin: 0;border: 2px solid #0E2C50;background-color: #fff;padding: 8px 50px 10px;font-family: 'Noto Sans TC', sans-serif;font-weight: normal;">{{$food->title}}</h3>
                            </div>
                            <p>{!! $food->short_description !!}</p>
                        </div>
                    </div>
                @endforeach
                </div>    
                <div class="menu-swiper_arrow next" id="food-next"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-next.svg') }}" alt=""></div>
                <div class="menu-swiper_arrow prev" id="food-prev"><img src="{{ asset('FrontPage/public/img/menu-slider-arrow-prev.svg') }}" alt=""></div>   
            </div>

            <img src="{{ asset('FrontPage/public/img/smoke-4.png') }}" alt="" class="smoke smoke-4" >
            <img src="{{ asset('FrontPage/public/img/smoke-3.png') }}" alt="" class="smoke smoke-3" >
            <img src="{{ asset('FrontPage/public/img/smoke-3.png') }}" alt="" class="smoke smoke-3-2" >
            <img src="{{ asset('FrontPage/public/img/smoke-3.png') }}" alt="" class="smoke smoke-3-3" >
            <img src="{{ asset('FrontPage/public/img/smoke-7.png') }}"alt="" class="smoke smoke-7">
            <img src="{{ asset('FrontPage/public/img/smoke-6.png') }}"alt="" class="smoke smoke-7-2">
            <img src="{{ asset('FrontPage/public/img/smoke-7.png') }}"alt="" class="smoke smoke-7-3">

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
                            <a href="/news/{{ $_news->id }}" class="news_page_item">
                                <div class="news_page_pic"><img src="{{ asset( 'storage/'.$_news->file_path ) }}" alt=""></div>
                                <div class="news_page_text">
                                    <h3>{{ $_news->title }}</h3>
                                    <p class="content">{!! $_news->short_description !!}</p>
                                @if (empty($_news->ended_ymd)) 
                                    <p class="date">{{ $_news->started_ymd }}</p>
                                @else
                                    <p class="date">{{ $_news->started_ymd }} - {{ $_news->ended_ymd }}</p>
                                @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <a href="/news" style="width: 130px;text-align: center;"  class="more">全部活動</a>
            </div>
        </div>

        <div class="seminarStory" style="background-color: #efefef; padding: 70px 0;">
            <div class="container">
                <div class="title">
                    <img style="width: 270px; padding-left: 40px;" src="{{ asset('FrontPage/public/img/index-seminar-title.png') }}" alt="加盟專區">
                </div>
                <div class="title">
                    <img src="{{ asset('FrontPage/public/img/index-seminar-story.png') }}" alt="創業故事">
                    <h2>Story</h2>
                </div>
                <div class="swiper-container news_slider">
                    <div class="swiper-wrapper">
                        
                    @foreach ($seminarStory as $_seminarStory)
                        <div class="swiper-slide">
                            <a href="/seminar/story/{{ $_seminarStory->id }}" class="news_page_item">
                                <div class="news_page_pic"><img src="{{ asset( 'storage/'.$_seminarStory->file_path ) }}" alt=""></div>
                                <div class="news_page_text" style="background-color:#efefef; border:none; color:#132C53; text-align:center;">
                                    <h4>{{ $_seminarStory->title }}</h4>
                                    <p>{!! $_seminarStory->short_description !!}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <a href="/seminar/story" style="width: 110px;text-align: center;" class="more">看更多</a>
            </div>
        </div>
        
        <div class="seminarPost" style="background-color: #efefef; padding: 70px 0;">
            <div class="container">
                <div class="title">
                    <img style="width:305px;" src="{{ asset('FrontPage/public/img/index-seminar-post.png') }}" alt="創業知識部落格">
                    <h2>You must know !</h2>
                </div>
                <div class="swiper-container news_slider">
                    <div class="swiper-wrapper">
                        
                    @foreach ($seminarPost as $_seminarPost)
                        <div class="swiper-slide">
                            <a href="/seminar/post/{{ $_seminarPost->id }}" class="news_page_item">
                                <div class="news_page_pic"><img src="{{ asset( 'storage/'.$_seminarPost->file_path ) }}" alt=""></div>
                                <div class="news_page_text" style="background-color:#efefef; border:none; color:#132C53; text-align:center;">
                                    <h4>{{ $_seminarPost->title }}</h4>
                                    <p>{!! $_seminarPost->short_description !!}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <a href="/seminar/post" style="width: 110px;text-align: center;"  class="more">看更多</a>
            </div>

            <div class="join_video_link mt-5">
                <a class="mt-5 mx-2" style="background-color: #132C53; max-width: 420px;" href="/seminar">前往加盟專區</a>
                <a class="mt-5 mx-2" style="max-width: 420px;" href="/seminar#seminarForm">馬上報名課程</a>
            </div>
        </div>

    </main>
    @relativeInclude('include.footer')
    <!-- <script src="{{ asset('FrontPage/public/js/round-slider.js') }}"></script> -->
    <script>
        var swiperBanner = new Swiper(".banner_slider", {
            slidesPerView: 1,
            autoHeight: true,
            shortSwipes:false,
            simulateTouch:false,//電腦上禁用拖曳
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            autoplay: {
                delay: 3500,
                disableOnInteraction:false,
            },
            loop: true,
            speed: 800,
        });
        var swiperNews = new Swiper(".news_slider", {
            slidesPerView: 1.3,
            slidesPerGroup: 1,    
            spaceBetween: 30,
            loop: true,
            speed: 800,
            centeredSlides:true,
            preventLinks:true,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                768: {
                    slidesPerView: 1.3,
                    slidesPerGroup: 1,
                },
                1200: {
                    slidesPerView: 3,
                    slidesPerGroup: 3,  
                    spaceBetween: 60,
                    centeredSlides:false,
                    loop: false,
                }
            }
        });

        var swiperFood = new Swiper("#food-swiper", {
            slidesPerView: 1,
            slidesPerGroup: 1,    
            spaceBetween: 30,
            shortSwipes:false,
            longSwipesMs:100,
            loop: true,
            centeredSlides: true,
            speed: 800,
            slideToClickedSlide: true,
            navigation: {
                nextEl: "#food-next",
                prevEl: "#food-prev",
            },
            breakpoints: {
                700: {
                    slidesPerView: 3,
                    slidesPerGroup: 1,    
                }
            }
        });
        
        // $(window).on("resize scroll",function(){
        //     let headerHeight;
        //     if($(window).width() <= 991){
        //         headerHeight = 100;
        //     }else {
        //         headerHeight = 300;
        //     }
        //     let reccTop = $(".recc").offset().top - headerHeight;
        //     if($(window).scrollTop() >= reccTop){
        //         $(".smoke").addClass("active");
        //     }else {
        //         $(".smoke").removeClass("active");
        //     }
        // });

    </script>